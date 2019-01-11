<?php
/**
 * Created by PhpStorm.
 * User: aro
 * Date: 6/30/17
 * Time: 12:25 PM
 */

namespace App\Repositories;

use App\Annonce;

class AnnonceRepository extends ResourceRepository
{

    public function __construct(Annonce $annonce)
    {
        $this->model = $annonce;
    }

}