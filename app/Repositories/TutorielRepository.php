<?php

namespace App\Repositories;

use App\Tutoriel;

class TutorielRepository extends ResourceRepository
{

    public function __construct(Tutoriel $tutoriel)
	{
		$this->model = $tutoriel;
	}
	public function save_image($image)
	{
		if($image->isValid())
		{
			$chemin = config('images_tutoriels.path');
			$extension = $image->getClientOriginalExtension();

			do {
				$nom = str_random(10) . '.' . $extension;
			} while(file_exists($chemin . '/' . $nom));
			$nom_fichier = $chemin.'/'.$nom; 
			$image->move($chemin, $nom);
			return $nom_fichier;
		}

		return false;
	}
}