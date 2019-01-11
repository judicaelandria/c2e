<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message','vue','date_vue','user_id_E','user_id_E'];
    protected $table ='messages';
}
