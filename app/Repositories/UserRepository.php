<?php

namespace App\Repositories;

use App\User;

class UserRepository extends ResourceRepository
{

    public function __construct(User $user)
	{
		$this->model = $user;
	}
	public function save_image($image, $id)
	{
		if($image->isValid())
		{
			$chemin = config('images_users.path');
			$extension = $image->getClientOriginalExtension();
			/*do {
				$nom = str_random(10) . '.' . $extension;
			} while(file_exists($chemin . '/' . $nom));*/
            $nom = $id . '.' . $extension;
			$nom_fichier = $chemin.'/'.$nom;
			$image->move($chemin, $nom);
			return $nom_fichier;
		}
		return false;
	}
}