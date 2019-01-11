<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badget extends Model
{
	protected $table = 'badgets';
    protected $fillable = [
        'nom', 'description', 'image'
    ];
    public function users()
    {
        return $this->belongsToMany('App\user','user_badget');
    }

}
