<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
	class TypeModel extends CI_Model{
		//PROPIEDADES
		public $id,$n_tipos;
		
		public function getype($id){
			$query = $this->db->get_where('tipo_producto', array('id' => $id));
			return $query->custom_result_object('TypeModel');
		}
	}
?>		
		