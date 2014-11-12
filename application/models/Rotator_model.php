<?php

class Rotator_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_rotator($slug)
	{
		$query = $this->db->get_where('ad_rotators', array('slug' => $slug));
		return $query->row_array();
	}

	public function get_links($id)
	{
		$query = $this->db->get_where('links', array('rotator_id' => $id, 'enabled' => '1'));
		return $query->result_array();
		
	}

	public function getRandomWeightedElement(array $weightedValues) {
    $rand = mt_rand(1, (int) array_sum($weightedValues));

    foreach ($weightedValues as $key => $value) {
      $rand -= $value;
      if ($rand <= 0) {
        return $key;
      }
    }
  }


}