<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = "domains";
    protected $fillable = ['terme'];
    function users()
    {
    	return $this->hasMany('App\User');
    }
}
