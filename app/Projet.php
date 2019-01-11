<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ['nom','description','nbr_vue','user_id'];
    protected $table ='projets';
    public function dossiers()
    {
    	return $this->hasMany('App\Dossier');
    }
    public function user ()
    {
    	return $this->belongsTo('App\User');
    }
}
