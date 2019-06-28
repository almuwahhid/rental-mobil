<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/BaseController.php');

class Tarif extends BaseController {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    // load form helper and validation library
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('tarif_model');
    $this->load->model('main_model');

    $this->load->helper('form');
  }

  public function index() {
    $tipe = $this->tarif_model->get();
    parent::getView('m_tarif/listtarif', 'tarif', $tipe);
  }

  public function tambah(){
    $data = $this->tarif_model->get();
    parent::getView('m_tarif/formtarif', 'tarif', $data);
  }

  public function detail($id_tarif){
    $model = $this->main_model->getDetail("tarif", ['id_tarif' => $id_tarif]);
		$data = $model;

		if(!$model) {
			echo "Tarif tidak tersedia";die();
		}
		parent::getView('m_tarif/detailtarif', 'tarif', $data);
  }

  public function simpan(){
    $merk_kendaraan = $this->input->post('merk_kendaraan');
    $tipe_kendaraan = $this->input->post('tipe_kendaraan');
    $tarif_kendaraan = $this->input->post('tarif_kendaraan');

    $data = array(
      'merk_kendaraan' => $merk_kendaraan,
      'tipe_kendaraan' => $tipe_kendaraan,
      'tarif_kendaraan' => $tarif_kendaraan
    );

    if($this->input->post('action') === 'tambah') {
      $insert = $this->tarif_model->create($data);
      if ($insert) {
        $this->session->set_flashdata('alert', array('message' => 'Berhasil menambah kendaraan','class' => 'success'));
        redirect('tarif');
      }
      else {
        $this->session->set_flashdata('alert', array('message' => 'Gagal menambah kendaraan','class' => 'danger'));
        redirect('tarif');
      }
    } else if ( $this->input->post('action') === 'edit' ) {
      $id_tarif = $this->input->post('id_tarif');

      $insert = $this->main_model->update($data, 'tarif', ['id_tarif' => $id_tarif]);
      if ($insert) {
        $this->session->set_flashdata('alert', array('message' => 'Berhasil mengedit Tarif Kendaraan','class' => 'success'));
        redirect('tarif/detail/'.$id_tarif);
      }
      else {
        $this->session->set_flashdata('alert', array('message' => 'Gagal mengedit model kendaraan','class' => 'danger'));
        redirect('tarif/detail/'.$id_tarif);
      }
    }
  }

  function delete()
  {
    $id_model = $this->input->get('id');

    $data = array(
      'deleted' => date("Y-m-d"),
    );
    $insert = $this->main_model->update($data, 'tarif', ['id_tarif' => $id_tarif]);

    if ($insert) {
      $this->session->set_flashdata('alert', array('message' => 'Berhasil menghapus tarif kendaraan','class' => 'success'));
      redirect('tarif');
    } else {
      $this->session->set_flashdata('alert', array('message' => 'Gagal menghapus tarif kendaraan','class' => 'danger'));
      echo "gagal";
      redirect('tarif');
    }
  }
}
