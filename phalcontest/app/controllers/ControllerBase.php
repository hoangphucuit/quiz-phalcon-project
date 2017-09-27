<?php

use Phalcon\Mvc\Controller;


class ControllerBase extends Controller
{
	public function initialize()
	{
		if ($this->session->has("user")) { 
		
			
   		 // Logged in
		} else {
				$this->response->redirect("session");
		} 
	}

}
