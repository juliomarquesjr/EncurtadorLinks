<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

$dados_tela = array('titulo' => 'On The Rocks - Encurtador de Links', 'titulo_pagina' => 'Encurtador de Links', );

class Links extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
		$this -> load -> helper('form');
		$this -> load -> helper('array');
		$this -> load -> library('form_validation');
		$this -> load -> model('links_model');
		$this -> load -> library('session');
	}

	public function index() {
		global $dados_tela;
		$this -> load -> view('inicial', $dados_tela);
	}

	function encurtalink() {
		global $dados_tela;

		$this -> form_validation -> set_rules('url', 'Endereço do Site', 'required');
		$this -> form_validation -> set_message('required', 'Você precisa digitar um endereço de site.');

		if ($this -> form_validation -> run() == TRUE) {
			$dados_banco = elements(array('url', 'id'), $this -> input -> post());
			$cod_unico = uniqueAlfa();

			while ($this -> links_model -> consultaCod($cod_unico) == TRUE) {
				$cod_unico = uniqueAlfa();
			}

			if ($this -> links_model -> consultaCod($cod_unico) == FALSE) {
				echo 'passei';
				$dados_banco['id'] = $cod_unico;
				$this -> session -> set_flashdata('urlEncurtada', $cod_unico);
				
				$this -> links_model -> insertLink($dados_banco);
				redirect('links');
				
			}
		}
		else{
			$this->load->view('inicial', $dados_tela);
		}
	}

}

function uniqueAlfa($length = 6) {
	$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$len = strlen($salt);
	$pass = '';
	mt_srand(10000000 * (double)microtime());
	for ($i = 0; $i < $length; $i++) {
		$pass .= $salt[mt_rand(0, $len - 1)];
	}
	return $pass;
}
