<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbnome extends CI_Controller {
	//MOSTRA O FORM
	public function cadastro(){
		$this->load->view("cadastro");
	}
	//EFETUA A INSRCAO DO REGISTRO
	public function inserir(){
		$this->load->model("Usuario","usr");
		$this->load->model("UsuarioDAO","usrDAO");
		$options = [
    		'cost' => 11,
    		'salt' => "salççlgkngklghkhjkhfjikjfghgfihi\hijkgfiujlfhifhbifo",
		];
		$pass = password_hash($this->input->post("senha"), PASSWORD_BCRYPT, $options);
		$this->usr->criar(0,$this->input->post("nome1"),$this->input->post("email"),$pass, $this->input->post("time"));
		$this->usrDAO->inserir($this->usr);
		
		 header("location: /ci/dbnome/login");
	}
	
	public function home(){
		if($this->session->userdata("_LOGIN") != ""){
			
			$this->load->model("Usuario","usr");
			$this->usr->criar($this->session->userdata('_ID'),'','','', '');
			
			$this->load->model("Partida","ptd");
			$this->ptd->criar(0,$this->session->userdata('_ID'),0,'','', '');
			
			$data["nome"] = $this->session->userdata('_NOME');
			$data["id"] = $this->session->userdata('_ID');
			$data["time"] = $this->session->userdata('_TIME');
			$data["times"] = $this->usr->listUsersDifLogado();
			$data["partidas"] =  $this->ptd->buscarPartidas();
			
			 $this->load->view("home", $data);
		}else{
			header("location: /ci/dbnome/login");
		}
	}
	
	public function painel(){
		$data["login"] = $this->session->userdata("_LOGIN");
		$this->load->view("painel",$data);
	}
	
	public function admin(){
		$login = $this->session->userdata("_LOGIN");
		if($login == "root@root.com"){
			$this->load->view("admin");
		}elseif (isset($login)) {
			$this->load->view("proibido");
		}else{
			//Precisa de autentcação como admin
			header("location: /ci/dbnome/login");
		}
	}
	
	public function login(){
		$this->load->view("autentica");
	}
	
	public function logout(){
		$this->session->unset_userdata("_LOGIN");
		$this->session->unset_userdata("_NOME");
		$this->session->unset_userdata("_ID");
		header("location: /ci");
	}
	
	public function autentica(){
		$this->load->model("Usuario","usr");
		$email = $this->input->post("email");
		$nome = $this->input->post("nome");
		$this->usr->criar(0,"",$this->input->post("email"),$this->input->post("senha"), '');
		if($this->usr->estaAutenticado()){
			 $this->session->set_userdata("_LOGIN",$email);
			 $this->session->set_userdata("_NOME", $this->usr->getUsuario()->getNome());
			  $this->session->set_userdata("_ID", $this->usr->getUsuario()->getId());
			  $this->session->set_userdata("_TIME", $this->usr->getUsuario()->getTime());
			 
			 header("location: /ci/dbnome/home");
		}else{
		     header("location: /ci/dbnome/login");
		}
	}

}
