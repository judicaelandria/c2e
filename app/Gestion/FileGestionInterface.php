<?php 
namespace App\Gestion;

interface FileGestionInterface
{
  public function save($file);
  public function getNomFichier();

}