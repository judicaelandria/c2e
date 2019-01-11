<?php

namespace App\Repositories;

use App\Type_utilisateur;

class Type_utilisateurRepository extends ResourceRepository
{

    public function __construct(Type_utilisateur $type_utilisateur)
	{
		$this->model = $type_utilisateur;
	}

}