<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable= ['niveau']; 
    protected $table   = 'niveaus'; 
    public function tutoriels()
    {
    	return $this->hasMany('App\Tutoriel');
    }
}
