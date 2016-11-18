<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Cursos extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('cursModel');
		}
		
		public function llistar($p=1,$f=10){
			$curso=new CursModel();
			$cursos=$curso->llistar($p,$f);
			
			$numpag=$curso->calc_query();
			$numpag=ceil($numpag/$f);
			
			
			$data['numpag']=$numpag;
			$data['p']=$p;
			$data['cursos']=$cursos;
			$data['usuario']=Login::getUsuario();
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/veure', $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function curs($id){
			
			$this->load->model('PreinscripcionsModel');
	
			$curso=new CursModel();
			$curso=$curso->getCurs($id);
			$curs=$curso[0];
			
			if($usuari=Login::getUsuario()){
				$preinscripcio=new PreinscripcionsModel();
				$preinscripcio->id_usuari=$usuari->id;
				$preinscripcio->id_curs=$curs->id;
				$data['preinscripcions']=$preinscripcio->getPreinscripcio();
			}
				
			$data['curso']=$curso;
			$data['usuario']=$usuari;
		
			$this->load->view('templates/header', $data);
			$this->load->view('cursos/detall', $data);
			$this->load->view('templates/footer', $data);
		}
	}
				