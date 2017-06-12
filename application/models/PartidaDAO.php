<?php

class PartidaDAO extends CI_Model{
    
    public function inserir(Partida $usr){
        $this->db->insert("Partida",$usr->toArray());
    }
    
    public function buscarPartidas(Partida $partida){
        $sql = "SELECT   A.id, DATE_FORMAT(A.dtInicial,'%d/%m/%Y %H:%i') as dtInicial,DATE_FORMAT(A.dtFinal,'%d/%m/%Y %H:%i') as dtFinal,";
        $sql = $sql . ' (SELECT time from Usuario where id = A.idUsuario1 ) as timeUser1,';
        $sql = $sql . ' (SELECT nome from Usuario where id = A.idUsuario2 ) as nomeUser2,';
        $sql = $sql . ' (SELECT time from Usuario where id = A.idUsuario2 ) as timeUser2';
        $sql = $sql . ' from Partida A where A.idUsuario1 =  ?;';

        $query = $this->db->query($sql, array($partida->getIdUsuario1()));
        return $query->result_array();
    }  
    
   public function deletar(Partida $partida){
      $this->db->where('id', $partida->getId());
      $this->db->delete('Partida'); 
     return true;
    }
}

?>