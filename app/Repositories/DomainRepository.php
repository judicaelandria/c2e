<?php

namespace App\Repositories;

use App\Domain;

class DomainRepository extends ResourceRepository
{

    public function __construct(Domain $domain)
	{
		$this->model = $domain;
	}
}