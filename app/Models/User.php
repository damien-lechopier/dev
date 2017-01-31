<?php

namespace App\Models;

use idealcoms\eadmin\Domain\EadminAuthenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  EadminAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_civilite',
    	'civilite',
    	'name',
    	'nom',
    	'prenom',
    	'fonction',
    	'telephone',
    	'fax',
    	'entreprise',
    	'adresse',
    	'cp',
    	'ville',
    	'id_pays',
    	'pays',
        'job',
    	'level',
        'email',
        'password',
        'admin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'admin'
    ];
}
