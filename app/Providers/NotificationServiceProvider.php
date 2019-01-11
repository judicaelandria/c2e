<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Notification\Notification;

class NotificationServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton('Notification',function($app){
			return new Notification();
		});
		
	}
}