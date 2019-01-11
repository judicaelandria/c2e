<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corrige extends Model
{
    protected $fillable = ['phrase','valide','question_id'];
    protected $table    = 'corriges';
    public function question()
    {
    	return $this->belongsTo('App\Question');
    } 
}
