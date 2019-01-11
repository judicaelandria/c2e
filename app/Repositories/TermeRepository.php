<?php

namespace App\Repositories;

use App\Terme;

class TermeRepository extends ResourceRepository
{

    public function __construct(Terme $terme)
	{
		$this->model = $terme;
	}

}