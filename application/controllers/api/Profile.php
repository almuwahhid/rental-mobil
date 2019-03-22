<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/api/Base_api.php');

class Profile extends Base_api {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->load->model('users_model');
    $this->load->model('main_model');
  }
  public function editprofile(){
    $username = $this->input->post('username');
    $no_ktp = $this->input->post('no_ktp');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $alamat = $this->input->post('alamat');
    $telp = $this->input->post('telp');
    $pekerjaan = $this->input->post('pekerjaan');
    $instansi = $this->input->post('instansi');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $jenis_kelamin = $this->input->post('jenis_kelamin');

    $data = array(
      'username' => $username,
      'no_ktp' => $no_ktp,
      'nama_lengkap' => $nama_lengkap,
      'alamat' => $alamat,
      'telp' => $telp,
      'pekerjaan' => $pekerjaan,
      'instansi' => $instansi,
      'tgl_lahir' => $tgl_lahir,
      'jenis_kelamin' => $jenis_kelamin
    );

    $update = $this->main_model->update($data, 'member', ['username' => $username]);
    if($update){
      $user = $this->users_model->get_user($username);

      $data = array(
                  'status'           => "200",
                  'message'           => "Update Berhasil",
                  'data'          => $user);
    } else {
      $data = array(
                  'status'           => "404",
                  'message'           => $confirm_data->message,
                  'data'          => new stdClass());
    }

    echo json_encode($data);
  }

  public function editpassword(){
    $username = $this->input->post('username');
    $password_lama = $this->input->post('password_lama');
    $password_baru = $this->input->post('password_baru');

    if ($this->users_model->check_login_user($username, $password_lama)) {
      $p_baru = $this->users_model->hash_password($password_baru);

      $data = array(
        'password' => $p_baru
      );
      $update = $this->main_model->update($data, 'users', ['username' => $username]);
      if($update){
        $data = array(
                    'status'           => "200",
                    'message'           => "Berhasil mengubah password",
                    'data'          => new stdClass());
      } else {
        $data = array(
                    'status'           => "404",
                    'message'           => "Ada yang bermasalah dengan server",
                    'data'          => new stdClass());
      }
    } else {
      $data = array(
                  'status'           => "204",
                  'message'           => "Password Anda salah",
                  'data'          => new stdClass());
    }

    echo json_encode($data);
  }
}
