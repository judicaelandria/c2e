<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $fillable = ['nom','description'];
    protected $table ='fichiers';
    public function ()
    {
    	return ;
    }
    
}
