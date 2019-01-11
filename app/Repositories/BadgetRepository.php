<?php

namespace App\Repositories;

use App\Badget;
use App\Gestion\PhotoGestionInterface;
class BadgetRepository extends ResourceRepository
{
    public function __construct(Badget $badget)
	{
		$this->model = $badget;
	}
	public function save_image($image)
	{
		if($image->isValid())
		{
			$chemin = config('images_badgets.path');
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
	public function store(Array $inputs)
	{
		$inputs['image'] = $this->save_image($inputs['image_fch']);
		return $this->model->create($inputs);
	}

	public function update_img(Array $inputs)
	{
		//$inputs['image'] = $this->save_image($inputs['image_fch']);
		$chemin = config('images_badgets.path');
		
		$extension = $image->getClientOriginalExtension();
		do {
				$nom = str_random(10) . '.' . $extension;
		} while(file_exists($chemin . '/' . $nom));
		$nom_fichier = $chemin.'/'.$nom; 

		Image::make(Input::file('image_fch'))->resize(300, 200)->save($nom_fichier);
		return $inputs;
	}
}