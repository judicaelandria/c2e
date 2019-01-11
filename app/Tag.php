<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];
    public  $timestamps = false;

    public function tutoriels(){
        return $this->belongsToMany('App\Tutoriel', 'tutoriel_tag');
    }
}
