<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Usuario extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		}
		//PROCEDIMIENTO PARA REGISTRAR UN USUARIO
		public function llistar(){
			$cursos=new CursModel();
			$cursos=$cursos->llistar();
			$data['cursos']=$cursos;
			$data['usuario']=$usua;
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/veure.php', $data);
			$this->load->view('templates/footer', $data);
		}
	}
				