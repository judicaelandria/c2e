<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['phrase','exercice_id'];
    protected $table    = 'questions';
    public function exercice()
    {
    	return $this->belongsTo('App\Exercice');
    }
    public function corriges()
    {
    	return $this->hasMany('App\Corrige');
    }
}
