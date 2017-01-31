<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use idealcoms\eadmin\Repositories\Catalog\BaseFileRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\UserRepository;
use idealcoms\eadmin\Repositories\Catalog\BaseProductsRepository;
use Illuminate\Support\Facades\Mail;

class FileController extends Controller
{
    /**
     *
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    /**
     *
     * @var BaseFileRepository $baseFileRepository
     */
    protected $baseFileRepository;

    protected $productRepository;


    public function __construct(UserRepository $userRepository, BaseFileRepository $baseFileRepository, BaseProductsRepository $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->baseFileRepository = $baseFileRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Show modal authentication is user not logged or prepare file to download
     *
     * @param int $file_id The file id
     * @param string $fileable_id The file name
     */
    public function getFile($file_id, $fileable_id)
    {
        $modal = false;

        if (!is_null($file_id) && !is_null($fileable_id)) {
            if (Auth::check()) {
                $file = $this->baseFileRepository->findWhere([
                    'id' => $file_id
                ])->first();
                $this->downloadFile($file->id, $file->filename);
                logger("ici");
            } else {
                $modal = true;
                if (Session::has('file_id')) {
                    Session::forget('key');
                }
                if (Session::has('fileable_id')) {
                    Session::forget('fileable_id');
                }
                Session::put("file_id", $file_id);
                Session::put("fileable_id", $fileable_id);
            }
            logger($modal);
            return response()->json(['modal' => $modal, 'error' => false]);
        } else {
            return response()->json(['modal' => $modal, 'error' => true]);
        }
    }

    public function download($file_id, $fileable_id)
    {

        if (!is_null($file_id) && !is_null($fileable_id)) {
            $file = $this->baseFileRepository->findWhere([
                'id' => $file_id
            ])->first();
            if ($file != null) {
                return $this->downloadFile($file->id, $file->filename);
            } else {
                abort(404);
            }
        }
    }


    /**
     *
     */
    public function doLogin()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        // run the validation rules on the inputs from the form
        logger(Input::all());
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            logger('ok validator');
            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                logger('USER HAS VALIDE LOGIN');
                if (Auth::check()) {
                    logger('USER IS LOGGED');
                    $user = $this->userRepository->find(Auth::user()->id);
                    if ($user->status != config("constants.statuses.VALIDATED")) {
                        logger('USER HAS STATUS REJECTED');
                        Auth::logout();
                        return Redirect::back()
                            ->withErrors(['Votre compte est actuellement désactivé.<br>Merci de prendre contact avec nous.']);
                    } else {
                        logger('USER HAS STATUS VALIDATED');

                        // Send mail to client  and show success message
                        if (Input::has('file_id') && Input::has('file_name')) {
                            $file = $this->baseFileRepository->findWhere([
                                'id' => Input::get('file_id')
                            ])->first();
                            if ($file->status == config("constants.statuses.PUBLISHED") &&
                                $file->filename == Input::get('file_name')
                            ) {
                                $data = array();
                                $data['user'] = Auth::user();

                                if (Input::has('ref')) {
                                    $data['product'] = $this->productRepository->find(Input::get('ref'));
                                } else {
                                    $data['product'] = array();
                                }
                                $data['file'] = $file;

                                Mail::send('emails.file', ['data' => $data], function ($message) {
                                    logger('Demande de documentation :: envoi mail');
                                    $message->subject("GALVATEK - Demande de documentation");
                                    $message->from('suivi@idealcoms.net', 'Service client Idealcoms');
                                    $message->to('suivi_technique@idealcoms.net');
                                    //$message->bcc('suivi@idealcoms.net');
                                });
                            }
                            return Redirect::back()
                                ->with('message', 'Votre demande a bien été transmise à nos services. Elle sera traitée dans les plus brefs délais');
                        } else {
                            // Dans le futur changer la redirection vers l'espace client
                            return Redirect::back()
                                ->with('message', 'Votre êtes maintenant connecté à votre espace client');
                        }
                    }
                }
            } else {
                return Redirect::back()
                    ->withErrors(['Vos informations de connexions sont incorrectes. Veuillez ré-essayer.']);
            }

        }
    }

    /**
     * Return the file for download
     *
     * @param int $file_id The file id
     * @param string $filename The file name
     */
    private function downloadFile($file_id, $filename)
    {
        $storagename = '/files/' . $file_id . '/' . $filename;
        $disk = $this->getDisk();
        if (Storage::disk($disk)->exists($storagename)) {
            $file = Storage::disk($disk)->get($storagename);
        } else {
            abort(404);
        }
        $response = response($file, 200)->header('Content-type', Storage::mimeType($disk . $storagename));
        return $response;
    }

    /**
     * Get de storage disk by laravel version
     *
     * @return string
     */
    private function getDisk()
    {
        $laravel = app();

        if (floatval($laravel::VERSION) < 5.2) {
            $disk = 'local';
        } else {
            $disk = 'public';
        }

        return $disk;
    }
}
