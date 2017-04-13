<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['localeSessionRedirect', 'localizationRedirect'], 'prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', ["as" => "home", 'uses' => 'HomeController@index']);

    Route::get(LaravelLocalization::transRoute('routes.dev'), ["as" => "dev", 'uses' => 'DevController@index', function () {
    	return view('pages.dev');
    }]);
    
    Route::get('dev_test', function() {
    	Storage::disk('google')->put('test.txt', 'Hello World');
    });
    
    
    Route::get(LaravelLocalization::transRoute('routes.entreprise'), ["as" => "entreprise", function () {
        return view('pages.entreprise');
    }]);

    Route::get(LaravelLocalization::transRoute('routes.reseau'), ["as" => "reseau", function () {
        return view('pages.reseau');
    }]);

    Route::resource(LaravelLocalization::transRoute('routes.calcul'), "CalculController", ['names' => [
        'index' => 'calcul.index',
        'store' => 'calcul.store',
    ]]);

    Route::get(LaravelLocalization::transRoute('routes.technique'), ["as" => "technique", function () {
        return view('pages.technique');
    }]);

    Route::get(LaravelLocalization::transRoute('routes.type'), ['as' => 'type', 'id' => '[0-9]+', 'name' => '[a-z]+', 'uses' => 'TypeController@show']);

    Route::get(LaravelLocalization::transRoute('routes.gamme'), ['as' => 'gamme', 'id' => '[0-9]+', 'name' => '[a-z]+', 'uses' => 'RangeController@show']);

    Route::get(LaravelLocalization::transRoute('routes.families'), ['as' => 'families', 'id' => '[0-9]+', 'name' => '[a-z]+', 'uses' => 'FamilyController@show']);

    Route::get(LaravelLocalization::transRoute('routes.produit'), ['as' => 'produit', 'id' => '[0-9]+', 'name' => '[a-z]+', 'uses' => 'ProductController@show']);

    Route::get(LaravelLocalization::transRoute('routes.fiche'), ['as' => 'fiche', 'id' => '[0-9]+', 'name' => '[a-z]+', 'uses' => 'FicheController@show']);


    //Route::get(LaravelLocalization::transRoute('routes.actualites'), ['as' => 'news', 'uses' => 'NewsController@newsIndex']);
    //Route::get('ajax/actualites', ['id_page' => '[0-9]+', 'uses' => 'NewsController@newsAjax']);

    Route::get('contact_by_subject/{id_sujet}', ['as' => 'contact_by_subject', 'id_sujet' => '[0-9]+', 'uses' => 'ContactController@contactForSubject']);

    Route::resource(LaravelLocalization::transRoute('routes.contact'), "ContactController", ['names' => [
        'index' => 'contact.index',
        'store' => 'contact.store',
    ]]);
    
    Route::resource("client/register", "RegisterController", ['names' => [
    		'index' => 'register.index',
    		'store' => 'register.store',
    ]]);

    Route::get('/download/{file_id}/{fileable_id}', ["as" => "getfile", 'uses' => 'FileController@getFile']);
    Route::get('/download/{file_id}-{fileable_id}', ["as" => "download", 'uses' => 'FileController@download']);

    Route::post('auth/modal/login', ['as' => 'login', 'uses' => 'FileController@doLogin']);
    //Route::controllers(['password' => 'Auth\PasswordController']);
    
    Route::auth();
   
    
});
