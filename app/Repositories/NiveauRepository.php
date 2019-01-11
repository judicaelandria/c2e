<?php 
namespace App\Repositories;

use App\Niveau;

/**
* 
*/
class NiveauRepository extends ResourceRepository	
{
	
	function __construct(Niveau $niveau)
	{
		$this->model = $niveau;
	}
}