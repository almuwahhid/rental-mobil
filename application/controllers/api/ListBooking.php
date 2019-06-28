<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/api/Base_api.php');

class ListBooking extends Base_api {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->load->model('kendaraan_model');
    $this->load->model('main_model');
    $this->load->model('book_model');
  }

  public function index(){
    $result = array();
    $id = $this->input->post('id');
    $activebook = $this->book_model->getActiveBook($id);
    if($activebook){
      $result["result"] = "success";
      $result["data"] = array();

      foreach ($activebook as $k => $act) {
        $period = new DatePeriod(
          new DateTime($act->tanggal_mulai),
          new DateInterval('P1D'),
          new DateTime($act->tanggal_berakhir)
        );
        foreach ($period as $key => $value) {
          array_push($result["data"], $value->format('Y-m-d'));
        }
      }
    } else {
      $result["result"] = "failed";
    }
    echo json_encode($result);
  }
}
