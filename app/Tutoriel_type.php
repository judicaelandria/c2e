<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutoriel_type extends Model
{
    protected $table  ='tutoriel_type'; 
    protected $fillable = ['terme'];
}
