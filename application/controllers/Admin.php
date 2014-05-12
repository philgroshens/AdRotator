<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_Controller {



	public function __construct()

	{

		parent::__construct();



		$this->load->database();

		$this->load->helper('url');

		$this->load->driver('session');

		$this->load->library('grocery_CRUD');

		$this->load->model('rotator_model');

		$this->load->model('login_model','',TRUE);



		$this->load->library(array('form_validation','session'));

	}



	public function index()

	{

		

		if ($this->_checkSession() === TRUE)

		{

			redirect('admin/rotators');

		}

	}









	public function rotators()

	{

		if ($this->_checkSession() === TRUE) {

		try{

			$crud = new grocery_CRUD();

			 $crud->set_theme('twitter-bootstrap');

		$crud->set_table('ad_rotators');

		$crud->set_subject('Ad Rotators');

		$crud->columns('id','slug','enabled');

		$crud->display_as('id','Rotator ID');

		$crud->display_as('slug','URL Slug');

		$crud->display_as('enabled','Status');

		$crud->field_type('enabled','dropdown',

            array('0' => 'Disabled', '1' => 'Enabled'));

		$output = $crud->render();

		$state = $crud->getState();



		if($state == 'edit')

    {

    	$state_info = $crud->getStateInfo();

    	$this->load->view('admin',$output);

    	$this->_linksBy($state_info->primary_key);

    	

    } else {

		$this->load->view('admin',$output);

	}

	}catch(Exception $e){

			show_error($e->getMessage().' --- '.$e->getTraceAsString());

		}



	}

}





public function links()

	{

	if ($this->_checkSession() === TRUE) {

		$crud = new grocery_CRUD();

		 $crud->set_theme('twitter-bootstrap');

		$crud->set_table('links');

		$crud->set_subject('Links');



	

		$crud->columns('rotator_id','campid','name','url','weight','enabled');

		$crud->callback_column($this->unique_field_name('rotator_id'),array($this,'_callback_rotator_slug'));



		$crud->display_as('rotator_id','Rotator');

		$crud->display_as('id','Link ID');

                $crud->display_as('campid','Campaign ID');
                $crud->display_as('name','Campaign Name');

		$crud->display_as('url','URL');

		$crud->display_as('weight','Weight');

		$crud->display_as('enabled','Enabled');

		$crud->field_type('weight','dropdown',

            array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'));

		$crud->field_type('enabled','dropdown',

			array('1' => 'Enabled', '2' => 'Disabled'));

		$crud->edit_fields('rotator_id','campid','name','url','weight','enabled');

		$crud->add_fields('rotator_id','campid','name','url','weight','enabled');

$state = $crud->getState();

		if($state == 'edit' || $state == 'add')

    {

		$crud->set_relation('rotator_id','ad_rotators','{slug}');

	}

		$output = $crud->render();

		$this->load->view('admin',$output);

}



	}





	public function _callback_rotator_slug($value, $row)

{

	$query = $this->db->get_where('ad_rotators', array('id' => $value));

    $thisrow = $query->row_array();

    return $thisrow['slug'];



}





	public function _linksBy($rotator)

	{



		$output['links'] = $this->rotator_model->get_links($rotator);



		$this->load->view('admin/linksby',$output);

	



}



public function _checkSession() {

	if($this->session->userdata('logged_in'))

        {

            $session_data = $this->session->userdata('logged_in');

            $data['username'] = $session_data['username'];

            $data['id'] = $session_data['id'];

            return TRUE;

        } else {

        //If no session, redirect to login page

            redirect('login', 'refresh');

        }

}

public function unique_field_name($field_name) {
	    return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not with a number
    }


 public function logout() {

         //remove all session data

         $this->session->unset_userdata('logged_in');

         $this->session->sess_destroy();

         redirect('login', 'refresh');

     }



}