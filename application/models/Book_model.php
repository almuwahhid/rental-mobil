<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {
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
	public function status_book($id_kendaraan) {
    $this->db->where('id_kendaraan', $id_kendaraan);
    $this->db->where('confirmed', 'Y');
    $this->db->where("begin_date <= ", date('Y-m-d H:i:s'));
    $this->db->where("due_date >= ", date('Y-m-d H:i:s'));

		$query = $this->db->get('booking');
		return $query->result();
	}
}
