<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	public $fillable = ['nom','description'];
	public $table    = "types";   
	public function tutoriels()
    {
    	return $this->belongsToMany('App\Tutoriel','tutoriel_type');
    }
    public function forums()
    {
    	return $this->belongsToMany('App\Forum','forum_type');
    }
}
