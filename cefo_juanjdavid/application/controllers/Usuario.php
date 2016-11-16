<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Usuario extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
		}
		//PROCEDIMIENTO PARA REGISTRAR UN USUARIO
		public function registro(){
				
			//si no llegan los datos a guardar
			if(empty($_POST['guardar'])){
				
				//mostramos la vista del formulario
				
				$usua=Login::getUsuario();
				$this->load->library('templ');
				$data['usuario']=$usua;
				$this->load->view('templates/header', $data);
				$this->load->view('usuario/registro.php', $data);
				$this->load->view('templates/footer', $data);
			
			//si llegan los datos por POST
			}else{
				//crear una instancia de Usuario
				$u = new UsuarioModel();
				
				
				//tomar los datos que vienen por POST
				
				$u->nom = $this->input->post("nom");
				$u->cognom1 =$this->input->post("cognom1");
				$u->cognom2 = $this->input->post("cognom2");
				$u->data_naixement =$this->input->post("example");
				$u->dni = $this->input->post("example");
				$u->estudis = $this->input->post("example");
				$u->situacio_laboral = $this->input->post("example");
				$u->prestacio = $this->input->post("example");
				$u->telefon_mobil = $this->input->post("example");
				$u->telefon_fix = $this->input->post("example");
				$u->email = $this->input->post("example");

				//guardar el usuario en BDD
				if(!$u->guardar())
					show_error('No ha pogut enregistrar les dades',289,'Error en el registre');
				
				//mostrar la vista de éxito
				$data['usuario'] = Login::getUsuario();
				$data['mensaje'] = 'Operació de registre satisfactoria';
				$this->load->view('result/exit', $data);
				$this->load->view('templates/header', $data);
				$this->load->view('result/exit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		

		//PROCEDIMIENTO PARA MODIFICAR UN USUARIO
		public function modificacion(){
			//si no hay usuario identificado... error
			if(!Login::getUsuario())
				throw new Exception('Debes estar identificado para poder modificar tus datos');
				
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				
				//mostramos la vista del formulario
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				
				$this->load_view('view/usuarios/modificacion.php', $datos);
					
				//si llegan los datos por POST
			}else{
				//recuperar los datos actuales del usuario
				$u = Login::getUsuario();
				$conexion = Database::get();
				
				//comprueba que el usuario se valide correctamente
				$p = MD5($conexion->real_escape_string($_POST['password']));
				if($u->password != $p)
					throw new Exception('El password no coincide, no se puede procesar la modificación');
								
				//recupera el nuevo password (si se desea cambiar)
				if(!empty($_POST['newpassword']))
					$u->password = MD5($conexion->real_escape_string($_POST['newpassword']));
				
				//recupera el nuevo nombre y el nuevo email
				$u->nombre = $conexion->real_escape_string($_POST['nombre']);
				$u->email = $conexion->real_escape_string($_POST['email']);
				$u->apellidos =$conexion->real_escape_string($_POST['apellidos']);
				$u->telefono = $conexion->real_escape_string($_POST['telefono']);
				$u->fecha_nacimiento = $conexion->real_escape_string($_POST['fecha_nacimiento']);
				$u->direccion = $conexion->real_escape_string($_POST['direccion']);
				$u->dni = $conexion->real_escape_string($_POST['dni']);
				$u->user = $conexion->real_escape_string($_POST['user']);
				$u->ciudad = $conexion->real_escape_string($_POST['ciudad']);
				$u->pais = $conexion->real_escape_string($_POST['pais']);
			
					
			
				//modificar el usuario en BDD
				if(!$u->actualizar())
					throw new Exception('No se pudo modificar');
		
				//hace de nuevo "login" para actualizar los datos del usuario
				//desde la BDD a la variable de sesión.
				Login::log_in($u->user, $u->password);
					
				//mostrar la vista de éxito
			
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = 'Modificación OK';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN USUARIO
		//solicita confirmación
		public function baja(){		
			//recuperar usuario
			$u = Login::getUsuario();
			
			//asegurarse que el usuario está identificado
			if(!$u) throw new Exception('Debes estar identificado para poder darte de baja');
			
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $u;
				$this->load_view('view/usuarios/baja.php', $datos);
		
			//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p = MD5(Database::get()->real_escape_string($_POST['password']));
				if($u->password != $p) 
					throw new Exception('El password no coincide, no se puede procesar la baja');
				
				//de borrar el usuario actual en la BDD
				if(!$u->borrar())
					throw new Exception('No se pudo dar de baja');

				//cierra la sesion
				Login::log_out();
					
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = null;
				$datos['mensaje'] = 'Eliminado OK';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
	}
?>