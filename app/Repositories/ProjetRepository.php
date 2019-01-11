<?php 
namespace App\Repositories;

use App\Projet;

/**
* 
*/
class ProjetRepository extends ResourceRepository	
{
	
	function __construct(Projet $Projet)
	{
		$this->model = $Projet;
	}
}