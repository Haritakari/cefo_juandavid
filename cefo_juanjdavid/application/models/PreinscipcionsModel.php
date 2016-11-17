<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class PreinscripcionsModel extends CI_Model{
		//PROPIEDADES
		public $id_usuari, $id_curs, $data;
			
		//METODOS
		//guarda la preinscripcions en la BDD
		public function guardar(){
			
			$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
			VALUES ('$this->id_usuari','$this->id_curs');";
				
			return $this->db->query($consulta);
		}
		
		//elimina una producto de la BDD
		public function borrar(){
			
			$consulta = "DELETE FROM preinscipcions WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
			return $this->db->query($consulta);
		}

		//este método sirve para recuperar una preinscipcion 
		public function getPreinscipcio($id_usuari, $id_curs){
			
   			$consulta="SELECT * FROM preinscripcions WHERE id_usuari='$this->id_usuari' AND id_curs='$this->id_curs';";
    		$lista=$this->db->query($consulta)->custom_result_object('PreinscripcionsModel');

			return $lista;
		}
		
		//este método sirve para recuperar todas las preinscipciones
		public function getPreinscipcions(){
				
			$consulta="SELECT * FROM preinscripcions';";
			$lista=$this->db->query($consulta)->custom_result_object('PreinscripcionsModel');
		
			return $lista;
		}

	}

			