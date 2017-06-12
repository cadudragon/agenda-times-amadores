<?php

class Usuario extends CI_Model{
    private $id, $nome, $email, $senha, $time;
    
    public function criar($id, $nome, $email, $senha, $time){
        //parent::__construct($id, $nome, $email, $senha);
        $this->email = $email;
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->time = $time;
    }

    public function estaAutenticado(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->verificar($this);
    }
    
    public function getUsuario(){
       $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->buscarUsuario($this);
    }
    
        public function listUsersDifLogado(){
       $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->listUsersDifLogado($this);
    }
    
     public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getTime(){
        return $this->time;
    }
    
    public function toArray(){
        return get_object_vars($this);
    }
}

?>

