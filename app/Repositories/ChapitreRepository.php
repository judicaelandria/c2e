<?php
namespace App\Repositories;

use App\Chapitre;

class ChapitreRepository extends ResourceRepository
{

    public function __construct(Chapitre $chapitre)
	{
		$this->model = $chapitre;
	}

}