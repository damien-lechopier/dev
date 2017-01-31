<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    
    protected $fillable = ['id_civilite', 'nom', 'prenom', 'fonction', 'email', 'password', 'telephone', 'entreprise', 'adresse', 'cp', 'ville', 'pays', 'id_sujet', 'message', 'id_provenance'];
    
}
