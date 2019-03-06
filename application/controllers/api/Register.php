<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->load->model('users_model');
    $this->load->model('main_model');
  }

  public function index(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($this->users_model->check_login($username, $password)) {
      $user = $this->users_model->get_user($username);
      if($user->aktif == 'N'){
        $data = array(
                    'status'           => "204",
                    'message'           => "Akun belum dikonfirmasi oleh Admin",
                    'data'          => new stdClass());
      } else {
        $data = array(
                    'status'           => "200",
                    'message'           => "Login berhasil",
                    'data'          => $user);
      }
    } else {
      $data = array(
                  'status'           => "404",
                  'message'           => "Username atau password salah",
                  'data'          => new stdClass());
    }

    echo json_encode($data);
  }

  public function registeremail(){
    include_once 'class.verifyEmail.php';
    $email = $this->input->post('username');

    if(!$this->users_model->check_email($email)){
      $vmail = new verifyEmail();
      $vmail->setStreamTimeoutWait(20);
      $vmail->Debug= TRUE;
      $vmail->Debugoutput= 'html';

      $vmail->setEmailFrom($email);//email which is used to set from headers,you can add your own/company email over here

      if ($vmail->check($email)) {
        $data = array(
                    'status'           => "200",
                    'message'           => "Email tersedia",
                    'data'          => $email);
      } elseif (verifyEmail::validate($email)) {
        $data = array(
                    'status'           => "202",
                    'message'           => "valid, but not exist!",
                    'data'          => $email);
      } else {
        $data = array(
                    'status'           => "500",
                    'message'           => "Email tidak valid!",
                    'data'          => "");
      }
    } else {
      $data = array(
                  'status'           => "404",
                  'message'           => "Email sudah terdaftar!",
                  'data'          => "");
    }
    echo json_encode($data);
  }

  public function index(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $no_ktp = $this->input->post('no_ktp');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $alamat = $this->input->post('alamat');
    $telp = $this->input->post('telp');
    $pekerjaan = $this->input->post('pekerjaan');
    $instansi = $this->input->post('instansi');

    $data = array(
      'username' => $username
      'password' => $this->users_model->hash_password($password),
      'no_ktp' => $no_ktp,
      'nama_lengkap' => $nama_lengkap,
      'alamat' => $alamat,
      'telp' => $telp,
      'pekerjaan' => $pekerjaan,
      'instansi' => $instansi
    );
    $insert = $this->main_model->create($data, 'member');

    $data2 = array(
      'username' => $username
      'password' => $this->users_model->hash_password($password),
      'level' => 'user',
      'aktif' => 'N'
    );
    $insert = $this->main_model->create($data2, 'users');
  }
}
