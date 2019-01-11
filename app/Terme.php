<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terme extends Model
{
    protected $fillable =['nom'];
    protected $table = 'termes';

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
