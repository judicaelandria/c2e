FichierRepository.php
<?php 
namespace App\Repositories;

use App\Fichier;

/**
* 
*/
class FichierRepository extends ResourceRepository	
{
	
	function __construct(Fichier $fichier)
	{
		$this->model = $fichier;
	}
}