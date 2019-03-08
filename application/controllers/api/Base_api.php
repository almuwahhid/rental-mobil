<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_api extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');

    $this->smtp_user = "djunkir@gmail.com";
    $this->smtp_pass = "djunkir@321";
  }

  public function send_email( $email, $subject, $body ){
        $this->load->library('email');

        $config['useragent'] = "JunaEdin";
        $config['mailpath'] = "/usr/bin/mail"; // or "/usr/sbin/sendmail"
        $config['protocol'] = "smtp";

        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['smtp_user'] = $this->smtp_user;
        $config['smtp_pass'] = $this->smtp_pass;

        $this->email->initialize($config);
        $this->email->from('no-reply@sewa_mobil.com');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message( $body );
        $this->email->set_mailtype('html');

        if($this->email->send()){
            return ['status' => 'sukses', 'message'=> ''];
        }
        else{
            show_error($this->email->print_debugger());
            return ['status' => 'gagal', 'message'=> 'error'];
        }
    }
}
