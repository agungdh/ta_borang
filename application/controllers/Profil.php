<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['nav'] = "profil/nav";
		$data['isi'] = "profil/index";
		$data['data']['user'] = $this->db->get_where('user', ['id' => $this->session->id])->row();
		
		$this->load->view("template/template", $data);
	}

}
