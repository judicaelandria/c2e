<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Notification extends Model
{
    protected $table ='user__notifications';
    protected $fillable =['vue','user_id','notification_id'];
}
