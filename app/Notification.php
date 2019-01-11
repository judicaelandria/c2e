<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['phrase','visualiser','type_notification',"id_objet","ancre"];
    protected $table ='notifications';
}
