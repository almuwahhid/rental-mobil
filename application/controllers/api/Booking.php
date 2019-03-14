<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('UPLOAD_DIR', 'confirm/');
require_once(APPPATH.'controllers/api/Base_api.php');


class Booking extends Base_api {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->load->model('book_model');
    $this->load->model('kendaraan_model');
    $this->load->model('main_model');
  }

  public function confirmPembayaran(){
    $img = $this->input->post('foto');
    $id_booking = $this->input->post('id_booking');

    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR . $id_booking . '.png';
    $success = file_put_contents($file, $data);

    if($success){
      $params = array('confirmation_photo' => $id_booking.'.png');
      $insert = $this->main_model->update($params, 'booking', ['id_booking' => $id_booking]);

      if($insert){
        $data = array(
          'status'           => "200",
          'message'           => "Sukses mengkonfirmasi booking");
      } else {
        $data = array(
                    'status'           => "500",
                    'message'           => "Gagal mengkonfirmasi booking");
      }
    } else {
      $data = array(
                  'status'           => "500",
                  'message'           => "Gagal mengkonfirmasi booking");
    }
    echo json_encode($data);
  }

  public function index(){
    $id_kendaraan = $this->input->post('id_kendaraan');
    $id_member = $this->input->post('id_member');
    $begin_date = $this->input->post('begin_date');
    $due_date = $this->input->post('due_date');
    $jaminan = $this->input->post('jaminan');

    // echo parent::getDayFromTimestamp($begin_date, $due_date);
    $data = array(
      'kode_booking' => 'B'.($this->book_model->allBooking()+1).$id_member.date("d", strtotime($begin_date)),
      'id_kendaraan' => $id_kendaraan,
      'id_member' => $id_member,
      'begin_date' => $begin_date,
      'due_date' => $due_date,
      'jaminan' => $jaminan,
      'confirmed' => 'N',
      'submit_date' => date('Y-m-d H:i:s'),
      'biaya' => parent::getBiaya($this->kendaraan_model->getBiaya($id_kendaraan)->tarif, $begin_date, $due_date)
    );
    $insert = $this->main_model->create($data, 'booking');
  }

  public function mybooking(){
    $id_member = $this->input->post('id_member');
    $datak = $this->book_model->listBookingUser($id_member);
    if($datak){
      $data = array(
                  'status'           => "200",
                  'message'           => "Booking tersedia",
                  'data'          => $datak);
    } else {
      $data = array(
                  'status'           => "204",
                  'message'           => "Booking tidak tersedia",
                  'data'          => $datak);
    }

    echo json_encode($data);
  }
}
