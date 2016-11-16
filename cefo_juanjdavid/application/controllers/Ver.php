<?php
class Producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function view(){
		
		$usua=Login::getUsuario();
		$data['usuario']=$usua;
		$this->load->view('templates/header', $data);
		$this->load->view('ver/view', $data);
		$this->load->view('templates/footer', $data);
	}
}
?>