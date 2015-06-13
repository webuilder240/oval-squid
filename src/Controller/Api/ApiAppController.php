<?php
namespace App\Controller\API;

use App\Controller\AppController;

class ApiAppController extends AppController
{
	

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
}
