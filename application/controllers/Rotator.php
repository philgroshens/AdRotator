<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rotator extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->model('rotator_model');
		
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function view($rotator, $subid = NULL)
	{

		$rotate = $this->rotator_model->get_rotator($rotator);
		$rotateid = $rotate['id'];
		$enabled = $rotate['enabled'];
			if ($enabled == 1) {
				$links = $this->rotator_model->get_links($rotateid);
	
					foreach ($links as $rotlinks) 
					{
						$rotlinking = $rotlinks['url'];
						$rotateme[$rotlinking] = (int)$rotlinks['weight'];

					}

				$data['rotator'] = $this->rotator_model->getRandomWeightedElement($rotateme);
				if ($subid != NULL) {	$data['subid'] = $subid;}
			
				$this->load->view('rotator', $data);
			}

		
	}

	



}

?>