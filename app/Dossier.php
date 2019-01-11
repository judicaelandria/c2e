<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable  = ['nom','desciption','projet_id'];
    protected $table     = 'dossiers';
    public function projet()
    {
    	return $this->belongsTo('App\Projet');
    }
    public function fichiers()
    {
    	return $this->hasMany('App\Fichier');
    }
}
