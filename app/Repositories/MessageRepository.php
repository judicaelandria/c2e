<?php 
namespace App\Repositories;

use App\Message;

/**
* 
*/
class MessageRepository extends ResourceRepository	
{
	
	function __construct(Message $message)
	{
		$this->model = $message;
	}
}