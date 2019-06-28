<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_model extends CI_Model {
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * create_user function.
	 *
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */

   public function create($params) {
 		$data = array(
 			'tipe_kendaraan' => $params['tipe_kendaraan'],
 			'merk_kendaraan' => $params['merk_kendaraan'],
 			'tarif_kendaraan' => $params['tarif_kendaraan']
 		);
 		return $this->db->insert('tarif', $data);
 	}

   public function get(){
 		$this->db->where('deleted', '');
 		$query = $this->db->get('tarif');
 		return $query->result();
   }
}
