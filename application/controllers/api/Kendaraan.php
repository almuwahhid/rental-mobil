<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->load->model('users_model');
    $this->load->model('main_model');
    $this->load->model('book_model');
  }

  public function index(){
    $user = $this->users_model->get_user($username);
    if($user->aktif == 'N'){
      $data = array(
                  'status'           => "204",
                  'data'          => new stdClass());
    } else {
      $data = array(
                  'status'           => "200",
                  'data'          => $user);
    }

    if ($this->users_model->check_login($username, $password)) {
      $user = $this->users_model->get_user($username);
      if($user->aktif == 'N'){
        $data = array(
                    'status'           => "204",
                    'data'          => new stdClass());
      } else {
        $data = array(
                    'status'           => "200",
                    'data'          => $user);
      }
    } else {
      $data = array(
                  'status'           => "404",
                  'data'          => new stdClass());
    }

    echo json_encode($data);
  }
}
