<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Links_model extends CI_Model{
	
	//Insere o url no banco
	public function insertLink($dados){
		$this->db->insert('links', $dados);
	}
	
	//Busca a URL do codigo encurtado
	public function getURL($cod){
		
	}
	
	//Consulta a existencia do código no banco
	public function consultaCod($cod){
		echo $cod;
		return $this->db->get_where('links', array('id' => $cod)) -> result_array();
		
	}
	
}
