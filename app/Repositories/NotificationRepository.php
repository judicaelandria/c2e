<?php 
namespace App\Repositories;

use App\Notification;

/**
* 
*/
class NotificationRepository extends ResourceRepository	
{
	
	function __construct(Notification $notification)
	{
		$this->model = $notification;
	}
}