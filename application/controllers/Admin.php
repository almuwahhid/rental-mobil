<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/BaseController.php');

class Admin extends BaseController {
  public function __construct() {
	parent::__construct();
		// $this->load->model('user_model');
		// $this->load->model('main_m');
		// $this->is_admin = parent::is_admin();
	}

  public function index(){
    parent::getView('admin/dashboard', 'dashboard');
  }
  public function logout(){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      // remove session datas
      foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
      }
      redirect('/');

    } else {
      redirect('/');
    }
  }

}
?>
