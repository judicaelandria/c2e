<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_utilisateur extends Model
{
    protected $table = 'type_utilisateurs';
    protected $fillable = ['terme'];
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
