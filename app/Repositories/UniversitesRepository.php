<?php

namespace App\Repositories;

use App\Universites;

class UniversitesRepository extends ResourceRepository
{

    public function __construct(Universites $universites)
	{
		$this->model = $universites;
	}

}