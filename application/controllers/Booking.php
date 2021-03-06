<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/BaseController.php');

class Booking extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
				$this->load->model('users_model');

				$this->load->library('session');
		    $this->load->model('book_model');
		    $this->load->model('main_model');
	}

	public function index() {
    $page = $this->input->get('p');
		$booking = $this->book_model->get($page);
		$jumlah = $this->book_model->totalBooking();
    $asd['booking'] = $booking;
    $asd['jumlah'] = $jumlah;
    $asd['page'] = $page;
    parent::getView('m_booking/listbooking', 'booking', $asd);
	}

	public function detail($id){
		$booking = $this->book_model->getDetail($id);
		// echo $this->book_model->updateBookAfter60();;
		parent::getView('m_booking/detailbooking', 'booking', $booking);
	}

	public function konfirmasi(){
		$id_booking = $this->input->get('id');
		$status = $this->input->get('status');

		if($status == '1'){
			$params = array('konfirmasi' => 'Y');
		} else {
			$params = array('deleted_at' => date('Y-m-d H:i:s'));
		}

		$insert = $this->main_model->update($params, 'booking', ['id_booking' => $id_booking]);
		if ($insert) {
			$this->session->set_flashdata('alert', array('message' => 'Berhasil menghapus foto','class' => 'success'));
			redirect('booking');
		} else {
			$this->session->set_flashdata('alert', array('message' => 'Gagal menghapus foto','class' => 'danger'));
			redirect('booking');
		}
	}

	public function kembalikan(){
    $id_booking = $this->input->get('id');
    $pengembalian = date('Y-m-d H:i:s');
    $result = array();
    $params = array('waktu_pengembalian' => $pengembalian);
    $insert = $this->main_model->update($params, 'booking', ['id_booking' => $id_booking]);

    if($insert){
      redirect('booking/detail/'.$id_booking);
    }
  }

}
