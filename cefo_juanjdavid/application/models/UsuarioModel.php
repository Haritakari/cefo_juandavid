<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class UsuarioModel extends CI_Model{
		//PROPIEDADES
		public $user, $password, $nombre, $privilegio=100, $admin=0, $email, $ciudad, $pais, $apellidos, $telefono, 
		$fecha_nacimiento, $dni, $direccion;
			
		public function __construct(){
			
		}
		//METODOS
		//guarda el usuario en la BDD
		public function guardar(){
			$user_table = 'usuarios';
			$consulta = "INSERT INTO $user_table(nombre, apellidos, telefono, fecha_nacimiento, direccion, dni, email, user,
			password, ciudad, pais,  privilegio, admin)
			VALUES ('$this->nombre','$this->apellidos','$this->telefono','$this->fecha_nacimiento','$this->direccion',
			'$this->dni','$this->email','$this->user','$this->password','$this->ciudad','$this->pais',100,0);";
				
			return $this->db->query($consulta);
		}
		
		
		//actualiza los datos del usuario en la BDD
		public function actualizar(){
			$user_table = 'usuarios';
			$consulta = "UPDATE $user_table
							  SET nombre='$this->nombre', 
							  		apellidos='$this->apellidos', 
							  		telefono='$this->telefono',
							  		fecha_nacimiento='$this->fecha_nacimiento', 
							  		direccion='$this->direccion', 
							  		dni='$this->dni',
							  		email='$this->email', 
							  		user='$this->user', 
							  		password='$this->password',
							  		ciudad='$this->ciudad', 
							  		pais='$this->pais'
							  WHERE user='$this->user';";
			return $this->db->query($consulta);
		}
		
		
		//elimina el usuario de la BDD
		public function borrar(){
			$user_table = 'usuarios';
			$consulta = "DELETE FROM $user_table WHERE user='$this->user';";
			return $this->db->query($consulta);
		}
		
		
		
		//este método sirve para comprobar user y password (en la BDD)
		public function validar(){
			$user_table = 'usuarios';
			$consulta = "SELECT * FROM $user_table WHERE user='$this->user' AND password='$this->password';";

			$resultado = $this->db->query($consulta)->num_rows();
			//si hay algun usuario retornar true sino false
			return $resultado;
		}
		
		//este método debería retornar un usuario creado con los datos 
		//de la BDD (o NULL si no existe), a partir de un nombre de usuario
		public function getUsuario(){
			$user_table = 'usuarios';
			$consulta = "SELECT * FROM $user_table WHERE user='$this->user';";
			$resultado = $this->db->query($consulta);
			$use = $resultado->custom_result_object('UsuarioModel');
			return $use;
		}	
	}
?>