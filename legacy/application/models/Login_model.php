<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Login_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();

    }
 
    public function login($username, $password) {
        //create query to connect user login database
        $salt = $this->config->item('encryption_key');
        $this->db->select('id, username, password, email');
        $this->db->from('admin_users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password.$salt));
        $this->db->limit(1);
         
        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) { 
            return $query; //if data is true
        } else {
            return false; //if data is wrong
        }
    }
}