<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
	protected $fillable = ['nom','description'];
    protected $table ='universites';
    
    public function users()
    {
    	return $this->belongsToMany('App\User','user_universite');
    }
}
