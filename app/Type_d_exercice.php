<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_d_exercice extends Model
{
    protected $fillable = ['nom'];
    protected $table ='type_d_exercices';
    public function exercices()
    {
    	return $this->hasMany('App\Exercice');
    }
    
}
