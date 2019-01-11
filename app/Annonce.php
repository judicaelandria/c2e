<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table ='annonces';
    protected $fillable =['text','titre', 'user_id'];
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
