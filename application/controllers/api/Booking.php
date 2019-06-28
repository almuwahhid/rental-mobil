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
      $params = array('konfirmasi_foto' => $id_booking.'.png');
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
    $tanggal_mulai = $this->input->post('tanggal_mulai');
    $tanggal_berakhir = $this->input->post('tanggal_berakhir');
    $jaminan = $this->input->post('jaminan');

    // echo parent::getDayFromTimestamp($tanggal_mulai, $tanggal_berakhir);
    $data = array(
      'kode_booking' => 'B'.($this->book_model->allBooking()+1).$id_member.date("d", strtotime($tanggal_mulai)),
      'id_kendaraan' => $id_kendaraan,
      'id_member' => $id_member,
      'tanggal_mulai' => $tanggal_mulai,
      'tanggal_berakhir' => $tanggal_berakhir,
      'jaminan' => $jaminan,
      'konfirmasi' => 'N',
      'kirimkan_tanggal' => date('Y-m-d H:i:s'),
      'biaya' => parent::getBiaya($this->kendaraan_model->getBiaya($id_kendaraan)->tarif_kendaraan, $tanggal_mulai, $tanggal_berakhir)
    );
    $insert = $this->main_model->create($data, 'booking');
    if($insert){
      $datak = $this->book_model->getFirst();

      $data = array(
                  'status'           => "200",
                  'message'           => "Booking berhasil",
                  'data'          => $datak);
    } else {
      $data = array(
                  'status'           => "204",
                  'message'           => "Gagal booking",
                  'data'          => new stdClass());
    }
    echo json_encode($data);
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

  public function searchbooking(){
    $kode_booking = $this->input->post('kode_booking');
    $id_member = $this->input->post('id_member');

    $datak = $this->book_model->getfromsearch($id_member, $kode_booking);
    if($datak){
      $data = array(
                  'status'           => "200",
                  'message'           => "Booking tersedia",
                  'data'          => $datak);
    } else {
      $data = array(
                  'status'           => "204",
                  'message'           => "Kode Booking tidak ditemukan",
                  'data'          => new stdClass());
    }

    echo json_encode($data);

  }

  public function searchbookingAll(){
    $kode_booking = $this->input->get('kode_booking');

    $datak = $this->book_model->getfromsearchAll($kode_booking);
    if($datak){
      $data = array(
                  'status'           => "200",
                  'message'           => "Booking tersedia",
                  'data'          => $datak);
    } else {
      $data = array(
                  'status'           => "204",
                  'message'           => "Kode Booking tidak ditemukan",
                  'data'          => new stdClass());
    }

    echo json_encode($data);
  }

  public function setPengembalian(){
    $id_booking = $this->input->post('id_booking');
    $pengembalian = date('Y-m-d H:i:s');
    $result = array();
    $params = array('waktu_pengembalian' => $pengembalian);
    $insert = $this->main_model->update($params, 'booking', ['id_booking' => $id_booking]);

    if($insert){
      $result["status"] = 200;
      $result["message"] = "Berhasil mengkonfirmasi pengembalian";
      $result["data"] = $pengembalian;
    } else {
      $result["status"] = 500;
      $result["message"] = "Gagal mengkonfirmasi pengembalian";
      $result["data"] = "";
    }
    echo json_encode($result);
  }
}
