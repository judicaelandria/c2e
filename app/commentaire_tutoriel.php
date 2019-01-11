<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire_tutoriel extends Model
{
    protected $table ='commentaire_tutoriels';
    protected $fillable =['phrase','user_id','tutoriel_id'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function tutoriel()
    {
    	return $this->belongsTo('App\Tutoriel');

    }
}
