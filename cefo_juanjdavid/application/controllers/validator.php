<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Validator extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
		}
		public function validar(){
			$this->form_validation->set_rules();
			
			if($this->form_validation->run()===FALSE){
				$datos['titulo']='Validacion de formularios';
				$datos['contenido']='formularios';
				$this->load->view('usuario/registro',$datos);
			}
			else {
				$datos['titulo']='Validacion Correcta';
				$datos['contenido']='formulario correcto';
				$this->load->view('usuario/registro',$datos);
			}
		}
	
	
	}