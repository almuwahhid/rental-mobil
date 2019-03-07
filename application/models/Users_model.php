<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
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

	/**
	 * check_login function.
	 *
	 * @access public
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function check_login($email, $password) {

		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $email);
		$this->db->where('level', 'user');
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);
	}

	/**
	* check_login_admin function.
	 *
	 * @access public
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function check_login_admin($uname, $password) {

		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $uname);
		$this->db->where('level', 'admin');
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);

	}


	/**
	 * get_user_id_from function.
	 *
	 * @access public
	 * @param array $params
	 * @return int the user id
	 */
	public function get_admin_username_from($params) {

		$this->db->select('username');
		$this->db->from('users');
		$this->db->where($params);
		return $this->db->get()->row('username');

	}

	/**
	 * get_user function.
	 *
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		$this->db->from('users');
		$this->db->join('member', 'users.username = member.username');
		$this->db->where('users.username', $user_id);
		return (object) $this->db->get()->row();
	}

	public function get_detail_user($user_id){
		$this->db->from('users');
		$this->db->join('member', 'users.username = member.username');
		$this->db->where('member.id_member', $user_id);
		return $this->db->get()->row();
	}

	public function get_users() {
		$this->db->where('level', 'user');
		$this->db->join('member', 'users.username = member.username');
		$query = $this->db->get('users');
		return $query->result();
	}

	/**
	 * get_admin_id_from function.
	 *
	 * @access public
	 * @param array $params
	 * @return int the user id
	 */
	public function get_admin_id_from($params) {
		$this->db->select('id');
		$this->db->from('admin');
		$this->db->where($params);
		return $this->db->get()->row('id');
	}

	public function check_email($email) {
		$this->db->where('username', $email);
		$this->db->where('level', 'user');

		$query = $this->db->get('users');
		return $query->result();
	}

	/**
	 * check_access function.
	 *
	 * @access public
	 * @param mixed $access
	 * @return bool
	 */
	public function check_access($access){
		return $access === 'admin' ? true : false;
	}

	/**
	 * hash_password function.
	 *
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * verify_password_hash function.
	 *
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}

}
