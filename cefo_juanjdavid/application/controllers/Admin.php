<?php
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function showPanel(){
		$usua=Login::getUsuario();
		$data['usuario']=$usua;
		$this->load->view('templates/header', $data);
		$this->load->view('admin/frontPanel', $data);
		$this->load->view('templates/footer', $data);
	}
	public function verprodu($p=1,$f=20){
		$this->load->model('productModel');
		
			
			$producto=new ProductModel();
			$productos=$producto->showAll($p,$f);
			$numpag=$producto->calc_query();
			$numpag=ceil($numpag/$f);
			$usua=Login::getUsuario();
			$data['usuario']=$usua;
			$data['productos']= $productos;
			
			$data['numpag']=$numpag;
			$data['p']=$p;
			$this->load->view('templates/header', $data);
			$this->load->view('admin/gestproduct', $data);
			$this->load->view('templates/footer', $data);
	}
}