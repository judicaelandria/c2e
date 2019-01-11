<?php

namespace App\Repositories;

use App\Commentaire;

class CommentaireRepository extends ResourceRepository
{

    public function __construct(Commentaire $commentaire)
	{
		$this->model = $commentaire;
	}

}