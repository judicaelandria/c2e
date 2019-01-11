<?php 
namespace App\Repositories;

use App\Corrige;

/**
* 
*/
class CorrigeRepository extends ResourceRepository	
{
	
	function __construct(Corrige $corrige)
	{
		$this->model = $corrige;
	}
}