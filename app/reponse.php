<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['phrase','user_id'];
    protected $table ='reponses';
    public function ()
    {
    	return ;
    }
    
}
