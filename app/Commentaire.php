<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['user_id','forum_id','phrase','reponse'];
    protected $table    = 'commentaires';
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function forum()
    {
    	return $this->belongsTo('App\Forum');	
    }
}
