<?php
namespace App\Services\Notification;

use Illuminate\Support\Facades\Facade;

class NotificationFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return Notification::class;
	}
}