<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutoriel extends Model
{
    protected $fillable = ['nom','description','introduction','validation_id', 'badget_id', 'user_id', 'niveau_id'];
    public $timestamps = true;
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    public function badget(){
        return $this->belongsTo('App\Badget');
    }
    public function validation(){
        return $this->belongsTo('App\User');
    }
    /*public function types()
    {
    	return $this->belongsToMany('App\Type','tutoriel_type');
    }*/
    public function chapitres()
    {
        return $this->hasMany('App\Chapitre');
    }
    public function commentaire_tutoriels()
    {
        return $this->hasMany('App\Commentaire_tutoriel');
    }
    public function niveau()
    {
        return $this->belongsTo('App\Niveau');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag', 'tutoriel_tag');
    }
}
