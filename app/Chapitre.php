<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $fillable = ['nom','tutoriel_id','description'];
    protected $table    = 'chapitres';
    public function tutoriel()
    {
    	return $this->belongsTo('App\Tutoriel');
    }
    public function sections()
    {
    	return $this->hasMany('App\Section');
    }
}
