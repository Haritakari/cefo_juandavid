<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function view($page= 'home'){
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}	

		$usua=Login::getUsuario();
		$data['usuario']=$usua;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	public function privacidad(){
		
		if(!$fp=fopen("txt/avislegal.txt","r"))
			show_error('No existeix el fitxer <b>txt/avislegal.txt</b>',404,'Error al accedir al fitxer');
			
		$titol=fgets($fp);
		$linees='';
		while (!feof($fp)){
			$linees.=fgets($fp);
		}
		fclose($fp);
		
		if(!$fp1=fopen("txt/politiques.txt","r"))
			show_error('No existeix el fitxer <b>txt/politiques.txt</b>',404,'Error al accedir al fitxer');
				
			$titol1=fgets($fp1);
			$linees1='';
			while (!feof($fp1)){
				$linees1.=fgets($fp1);
			}
		fclose($fp1);
		
		$data['titol']=$titol;
		$data['cont']=$linees;
		$data['titol1']=$titol1;
		$data['cont1']=$linees1;
		$data['usuario']=Login::getUsuario();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/privacitat', $data);
		$this->load->view('templates/footer', $data);
	}
	
}
