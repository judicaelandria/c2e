<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable =['sujet','description','date','resolu','user_id'];
    protected $table = 'forums';
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function types()
    {
    	return $this->belongsToMany('App\Type','forum_type');
    }
    public function commentaires() 
    {
        return $this->hasMany('App\Commentaire');
    }
    
}
