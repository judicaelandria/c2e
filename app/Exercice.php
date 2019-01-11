<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    protected $fillable = ['nom','description','valide','nbr_vue','type_d_exercice_id','user_id'];
    protected $table    = 'exercices';
    public function questions()
    {
    	return $this->hasMany('App\Question');
    }
    public function type_d_exercice()
    {
    	return $this->belongsTo('App\Type_d_exercice');
    }
}
