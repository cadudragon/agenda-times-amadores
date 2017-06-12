<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partidacontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function inserir(){
		$this->load->model("Partida","ptd");
		$this->load->model("PartidaDAO","ptdDAO");
		$this->ptd->criar(0,$this->session->userdata('_ID'),$this->input->post("idUsuario2"),$this->input->post("dtInicialHidden"),$this->input->post("dtFinalHidden"));
		$this->ptdDAO->inserir($this->ptd);
		header("location: /ci/dbnome/home");
	}
	
		public function deletar(){
		$this->load->model("Partida","ptd");
		$this->load->model("PartidaDAO","ptdDAO");
		$this->ptd->criar($this->input->post("idPartida"),0,0,'','','');
		$this->ptdDAO->deletar($this->ptd);
		header("location: /ci/dbnome/home");
	}
	
	
		public function calendario(){
		if($this->session->userdata("_LOGIN") != ""){
			
			$this->load->model("Usuario","usr");
			$this->usr->criar($this->session->userdata('_ID'),'','','', '');
			
			$data["nome"] = $this->session->userdata('_NOME');
			$data["id"] = $this->session->userdata('_ID');

			 $this->load->view("calendario", $data);
		}else{
			header("location: /ci/dbnome/login");
		}
	}
	
	
	
		public function feedpartidas(){
		if($this->session->userdata("_LOGIN") != ""){
			
			$this->load->model("Partida","ptd");
			$this->ptd->criar(0,$this->session->userdata('_ID'),0,'','', '');
			$partidas = $this->ptd->buscarPartidas();
			
			$partidasFullCalendar = array();
			
			foreach($partidas as $partida) {
				
			    $object = new stdClass();
				$object->id = $partida['id'];
				$object->title = $partida['timeUser2'];
				$object->start =$partida['dtInicial'];
				$object->end = $partida['dtFinal'];
				$object->editable = false;
				
				$partidasFullCalendar [] = $object;
			}	
		
			echo json_encode($partidasFullCalendar);
		
	
		}else{
			header("location: /ci/dbnome/login");
		}
	}
}
