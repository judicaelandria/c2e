<?php

namespace App\Repositories;

use App\Forum;

class ForumRepository extends ResourceRepository
{

    public function __construct(Forum $forum)
	{
		$this->model = $forum;
	}

}