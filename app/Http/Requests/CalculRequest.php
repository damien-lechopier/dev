<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CalculRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	return [
			'id_civilite' => 'required|integer',
    		'nom' => 'required|string',
    		'prenom' => 'required|string',
    		'fonction' => 'max:20|string',
    		'email' => 'required|email',
    		'telephone' => 'required|string',
    		'fax' => 'string',
    		'entreprise' => 'required|max:40|string',
    		'adresse' => 'required|string',
    		'cp' => 'required|numeric|digits:5',
    		'ville' => 'required|string',
    		'id_pays' => 'required|string',
    		'message' => 'required|max:500|string',
    			
        ];
    }
}
