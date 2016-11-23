<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Subscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('SubscripcionsModel');
		}
		
		//PROCEDIMIENTO PARA LEER SUBSCRIPCIONES (SI LAS HAY).
		public function LeerSubscripciones(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',294,'Error , Identificat');
			//crear una instancia de Subscripciones
			$p = new SubscripcionsModel();
			$p->id_usuari=$u->id;
			//leer las Subscripciones de un usuario en BDD
			if($p->getSubscripcions()){
				//mostrar la vista de Subscripciones de un usuario
				$data['id_usuari'] = $p->id_usuari;
				$data['id_curs'] = $p->id_curs;
				$data['data_hora'] = $p->data_hora;
				
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista Subscripcions alumne
				$this->load->view('templates/footer', $data);
			}else{
				// ESTE USUARIO NO TIENE SUBSCRIPCIONES
				$data['mensaje'] = "Alumne sense Subscripcions a cap curs";
				$data['usuario']=$u;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista Subscripcions alumne
				$this->load->view('templates/footer', $data);
			}
		}
		
		//PROCEDIMIENTO PARA REGISTRAR UNA SUBSCRIPCION
		public function registroS($id_area){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',294,'Error , Identificat');
				//crear una instancia de Subscripciones
				$p = new SubscripcionsModel();
				
				$p->id_usuari=$u->id;
				$p->id_area=$id_area;

				//guardar el usuario en BDD
				if(!$p->guardarS())
					show_error('No ha pogut enregistrar la Subscripció',289,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] =$u;
				$data['mensaje'] = "Operació de registre Subscripció de l'Area satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
		}
		
		//PROCEDIMIENTO PARA DAR DE BAJA SUBSCRIPCIONES
		//solicita confirmación
		public function baja(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',294,'Error , Identificat');
			//crear una instancia de Preinscripciones
			$p = new SubscripcionsModel();
			
			
			$area= new AreaModel;
			$area= $area->getArea($id_area);
			
			//si no nos están enviando la conformación de baja
			if(!empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
		
				if(!$p->borrar())
					show_error('No es pot procesa la baixa',257,'Error al intentar donar de baixa');

				//mostrar la vista de éxito
				$data['usuario'] = $u;
				$Data['id_area'] = $area;
				$data['mensaje'] = 'Eliminat OK';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function eliminar($idc){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',294,'Error , Identificat');
			$this->load->model('CursModel');
			//crear una instancia de Subscripciones
			$p = new SubscripcionsModel();
			
			$p->id_usuari=$u->id;
			$p->id_area=$ida;
			if(!$p->borrarPAC())
				show_error('No es pot eliminar aquesta Subsscripcio',257,'Error al intentar eliminar');
				//mostrar la vista de éxito
		
				$this->alumne($u->id);
		}
		
		private function alumne($id){ // falta adecuarlo a las areas formativas
			$this->load->model('SubscripcionsModel');
			$this->load->model('CursModel');
			$alumne=new UsuarioModel();
			$alumne->id=$id;
			$alumne=$alumne->getUsuario2();
			$sub=new SubscripcionsModel();
			$pre->id_usuari=$id;
			$preinsc=$pre->getSubscripcions();
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