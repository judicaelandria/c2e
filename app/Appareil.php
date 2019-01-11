<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appareil extends Model
{
    protected $fillable = ['nom','taille','mode_connection','connecter','user_id'];
    protected $table    = 'appareils';
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
