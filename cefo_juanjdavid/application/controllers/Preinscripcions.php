<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Preinscripcions extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('PreinscripcionsModel');
		}
		
		//PROCEDIMIENTO PARA LEER PREINSCRIPCIONES (SI LAS HAY).
		public function LeerPreinscripciones(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			$p->id_usuari=$u->id;
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
				$data['mensaje'] = "Alumne sense preinscripcions a cap curs";
				$data['usuario']=$u;
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);// vista preinscripcions alumne
				$this->load->view('templates/footer', $data);
			}
		}
		
		//PROCEDIMIENTO PARA REGISTRAR UNA PREINSCRIPCION
		public function registroP($id_curs){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
				//crear una instancia de Preinscripciones
				$p = new PreinscripcionsModel();
				
				$p->id_usuari=$u->id;
				$p->id_curs=$id_curs;

				//guardar el usuario en BDD
				if(!$p->guardarP())
					show_error('No ha pogut enregistrar la Preinscripció',404,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] =$u;
				$data['mensaje'] = "Operació de registre Preinscripció Curs satisfactoria";
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
		}
		
		//PROCEDIMIENTO PARA DAR DE BAJA PREINSCRIPCIONES
		//solicita confirmación
		public function baja(){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			
			
			$curs= new CursModel;
			$curs= $curs->getCurs($id_curs);
			
			//si no nos están enviando la conformación de baja
			if(!empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
		
				if(!$p->borrar())
					show_error('No es pot procesa la baixa',404,'Error al intentar donar de baixa');

				//mostrar la vista de éxito
				$data['usuario'] = $u;
				$data['mensaje'] = 'Eliminat OK';
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		public function eliminar($idc){
			$u=Login::getUsuario();
			if(!$u)
				show_error('Tens que estar identificat',404,'Error , Identificat');
			$this->load->model('CursModel');
			//crear una instancia de Preinscripciones
			$p = new PreinscripcionsModel();
			
			$p->id_usuari=$u->id;
			$p->id_curs=$idc;
			if(!$p->borrarPAC())
				show_error('No es pot eliminar aquesta preinscripcio',404,'Error al intentar eliminar');
				//mostrar la vista de éxito
		
				$this->alumne($u->id);
		}
		private function alumne($id){
		
			if(!$u=Login::getUsuario())
				show_error('Tens que estar identificat ',404,'Error , Identificat');
			$this->load->model('subscripcionsModel');
			$this->load->model('preinscripcionsModel');
			$this->load->model('CursModel');
			$this->load->model('AreesModel');
			
			$alumne=new UsuarioModel();
			$alumne->id=$u->id;
			$alumne=$alumne->getUsuario2();
			
			$pre=new PreinscripcionsModel();
			$pre->id_usuari=$u->id;
			$preinsc=$pre->getPreinscripcions();
			$curspreins=array();
			if(count($preinsc)>=1){
				foreach ($preinsc as $p=>$v){
					$curs= new CursModel();
					$curs=$curs->getCurs($v->id_curs);
					$curspreins[]=$curs[0];
				}
			}
			$sub=new SubscripcionsModel();
			$sub->id_usuari=$u->id;
			$subscri=$sub->getSubscripcions();
			
			$alusubs=array();
			if(count($subscri)>=1){
				foreach ($subscri as $p=>$v){
					$area= new AreesModel();
					$area->id=$v->id_area;
					$area=$area->getArea();
					$alusubs[]=$area[0];
				}	
			}
			$data['alusubs']=$alusubs;
			$data['curspreins']=$curspreins;
			$data['alumne']=$alumne;
			$data['usuario']=$u;
			$this->load->view('templates/header', $data);
			$this->load->view('usuario/detall', $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>