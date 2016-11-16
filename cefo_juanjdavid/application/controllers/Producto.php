<?php
class Producto extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function listar($p=1,$f=9){
		$this->load->model('productModel');
		if (!empty($_POST['add']))
			self::addcart();
		
		$producto=new ProductModel();
		$productos=$producto->mostrar($p,$f);
		$numpag=$producto->calc_query();
		$numpag=ceil($numpag/$f);

		$usua=Login::getUsuario();
		$data['usuario']=$usua;
		$data['productos']= $productos;
		$data['numpag']=$numpag;
		$data['p']=$p;
		$this->load->view('templates/header', $data);
		$this->load->view('producto/listar', $data);
		$this->load->view('templates/footer', $data);
		}
	public function addcart(){
		$data= array(
			'id'	=> $this->input->post('id'),
			'qty'	=> 1,
			'price'	=> $this->input->post('pre'),
			'name'	=> $this->input->post('nom'),
			'url'	=> $this->input->post('foto')
		);
		$this->cart->insert($data);
		//var_dump($this->cart->contents());
	}	
	public function uptdcart($rowid,$qty){
		$data= array(
				'rowid'=>$rowid,
				'qty'=>$qty
		);
		$this->cart->update($data);
	}
	public function removecart($rowid){
		$this->cart->remove($rowid);
	}
	public function showcart(){
		if (!empty($_POST['suma_x'])){
			$qty=$this->input->post('num')+1;
			$rowid=$this->input->post('roid');
			self::uptdcart($rowid,$qty);
		}
		if (!empty($_POST['rest_x'])){
			$qty=$this->input->post('num')-1;
			$rowid=$this->input->post('roid');
			self::uptdcart($rowid,$qty);
		}
		if (!empty($_POST['delete'])){
			self::removecart($this->input->post('roid'));
		}
		$usua=Login::getUsuario();
		$data['usuario']=$usua;
		$this->load->view('templates/header', $data);
		$this->load->view('producto/cart', $data);
		$this->load->view('templates/footer', $data);
	
	}
}
?>