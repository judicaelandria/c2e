<?php 

namespace App\Gestion;

class ImageGestion 
{
	
    public function save($image)
	{
		if($image->isValid())
		{
			$chemin = config('images_badgets.path');
			$extension = $image->getClientOriginalExtension();

			do {
				$nom = str_random(10) . '.' . $extension;
			} while(file_exists($chemin . '/' . $nom));
			$nom_fichier = $chemin.'/'.$nom; 
			
			return $image->move($chemin, $nom);
		}

		return false;
	}


}