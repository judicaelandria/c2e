<?php 
namespace App\Repositories;

use App\Question;

/**
* 
*/
class QuestionRepository extends ResourceRepository	
{
	
	function __construct(Question $Question)
	{
		$this->model = $Question;
	}
}