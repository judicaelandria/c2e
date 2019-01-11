<?php 
namespace App\Repositories;

use App\Type_d_exercice;

/**
* 
*/
class Type_d_exerciceRepository extends ResourceRepository	
{
	
	function __construct(Type_d_exerciceRepository $type_d_exerciceRepository)
	{
		$this->model = $type_d_exerciceRepository;
	}
}