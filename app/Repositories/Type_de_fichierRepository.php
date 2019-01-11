Type_de_fichierRepository.php
<?php 
namespace App\Repositories;

use App\Type_de_fichier;

/**
* 
*/
class Type_de_fichierRepository extends ResourceRepository	
{
	
	function __construct(Type_de_fichier $type_de_fichier)
	{
		$this->model = $type_de_fichier;
	}
}