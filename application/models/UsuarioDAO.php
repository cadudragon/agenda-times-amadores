<?php

class UsuarioDAO extends CI_Model{
    
    public function inserir(Usuario $usr){
        $this->db->insert("Usuario",$usr->toArray());
    }
    
    public function verificar(Usuario $usr){
        $this->db->select('*');
        $this->db->from('Usuario');
        $options = [
    		'cost' => 11,
    		'salt' => "salççlgkngklghkhjkhfjikjfghgfihi\hijkgfiujlfhifhbifo",
		];
		$pass = password_hash($usr->getSenha(), PASSWORD_BCRYPT, $options);
        $this->db->where('email', $usr->getEmail());
        $this->db->where('senha',  $pass);
        //var_dump($pass);
        //SELECT * FROM usuario WHERE usuario.email = $email AND
        //usuario.senha = $senha
        $query = $this->db->get();
        return $query->num_rows() == 1;
    }
    
    public function buscarUsuario(Usuario $usr){
        $sql = "SELECT * FROM Usuario where email = ?;";
        $query = $this->db->query($sql, array($usr->getEmail()));
        $usuario = $query->row(0, 'Usuario');
        return $usuario;
    }  
    
    public function listUsersDifLogado(Usuario $usr){
        
        $listaUsuarios =  array();
        $sql = "SELECT * FROM Usuario where id <> ? ;";
        $query = $this->db->query($sql, array($usr->getId()));
         
        foreach ($query->result('Usuario') as $user)
        {
          $listaUsuarios[] = $user;
          
        }
        
        return $listaUsuarios;
    }   
}

?>