<?php

class Partida extends CI_Model{
    private  $id,$idUsuario1, $idUsuario2, $dtInicial, $dtFinal;
    
    public function criar($id,$idUsuario1, $idUsuario2, $dtInicial, $dtFinal){
        $this->id =  $id;
        $this->idUsuario1 = $idUsuario1;
        $this->idUsuario2 = $idUsuario2;
        $this->dtInicial = $dtInicial;
        $this->dtFinal = $dtFinal;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getIdUsuario1(){
        return $this->idUsuario1;
    }
    
    public function getIdUsuario2(){
        return $this->idUsuario2;
    }
    
    public function dtInicial(){
        return $this->dtInicial;
    }
    
    public function dtFinal(){
        return $this->dtFinal;
    }
    
   public function buscarPartidas(){
       $this->load->model("PartidaDAO","ptdDAO");
       return $this->ptdDAO->buscarPartidas($this);
    }
    
    public function toArray(){
        return get_object_vars($this);
    }
}

?>

