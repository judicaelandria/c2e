<?php 
namespace App\Repositories;

use App\Exercice;

/**
* 
*/
class ExerciceRepository extends ResourceRepository	
{
	
	function __construct(Exercice $exercice)
	{
		$this->model = $exercice;
	}
}