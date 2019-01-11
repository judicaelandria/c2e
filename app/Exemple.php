<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemple extends Model
{
    protected $fillable  = ['titre','exemple','section_id'];
    protected $table     = 'exemples';
    public function section()
    {
    	return $this->belongsTo('App\Section');
    }
}
