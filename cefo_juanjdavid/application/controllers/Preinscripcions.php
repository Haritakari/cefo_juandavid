<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Preinscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('PreinscripcionsModel');
		}
		
		//PROCEDIMIENTO PARA LEER PREINSCRIPCIONES (SI LAS HAY).
		public function LeerPreinscripciones($id_usuari){
		
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			$p->id_usuari=$id_usuari;
		
			//leer las preinscripciones de un usuario en BDD
			if($p->getPreinscripcions()){
				//mostrar la vista de preinscripciones de un usuario
				$data['id_usuari'] = $p->id_usuari;
				$data['id_curs'] = $p->id_curs;
				$data['data_hora'] = $p->data_hora;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista preinscripcions alumne
				$this->load->view('templates/footer', $data);
			}else{
				// ESTE USUARIO NO TIENE PREINSCRIPCIONES
				$data='';
				$data['mensaje'] = "Alumne sense preinscripcions a cap curs";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista preinscripcions alumne
				$this->load->view('templates/footer', $data);
			}
		}
		
		//PROCEDIMIENTO PARA REGISTRAR UNA PREINSCRIPCION
		public function registroP($id_curs,$id_usuari){
	
				//crear una instancia de Preinscripciones
				$p = new PreinscripcionsModel();
				$p->id_usuari=$id_usuari;
				$p->id_curs=$id_curs;

				//guardar el usuario en BDD
				if(!$p->guardarP())
					show_error('No ha pogut enregistrar la Preinscripció',289,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = Login::getUsuario();
				$data['mensaje'] = "Operació de registre Preinscripció Curs satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
		}
		
		//PROCEDIMIENTO PARA DAR DE BAJA PREINSCRIPCIONES
		//solicita confirmación
		public function baja(){
			
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			
			$usua=Login::getUsuario();
			$curs= new CursModel;
			$curs= $curs->getCurs($id_curs);
			
			//si no nos están enviando la conformación de baja
			if(!empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
		
				if(!$p->borrar())
					show_error('No es pot procesa la baixa',257,'Error al intentar donar de baixa');

				//mostrar la vista de éxito
				$data['usuario'] = $usua;
				$data['mensaje'] = 'Eliminat OK';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function eliminar($idu,$idc){
			$this->load->model('CursModel');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			$p->id_usuari=$idu;
			$p->id_curs=$idc;
			if(!$p->borrarPAC())
				show_error('No es pot eliminar aquesta preinscripcio',257,'Error al intentar eliminar');
				//mostrar la vista de éxito
		
				$this->alumne($idu);
		}
		
		public function alumne($id){
			$this->load->model('preinscripcionsModel');
			$this->load->model('CursModel');
			$alumne=new UsuarioModel();
			$alumne->id=$id;
			$alumne=$alumne->getUsuario2();
			$pre=new PreinscripcionsModel();
			$pre->id_usuari=$id;
			$preinsc=$pre->getPreinscripcions();
			$curspreins=array();
			if(count($preinsc)>=1){
				foreach ($preinsc as $p=>$v){
					$curs= new CursModel();
					$curs=$curs->getCurs($v->id_curs);
					$curspreins[]=$curs[0];
				}
			}
		
			$data['curspreins']=$curspreins;
			$data['alumne']=$alumne;
			$data['usuario']=Login::getUsuario();
			$this->load->view('templates/header', $data);
			$this->load->view('usuario/detall', $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>