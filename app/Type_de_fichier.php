<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_de_fichier extends Model
{
    protected $fillable = ['nom','description'];
    protected $table ='type_de_fichiers';
    public function fichiers()
    {
    	return $this->hasMany('App\Fichier');
    }
    
}
