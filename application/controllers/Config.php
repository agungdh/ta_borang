<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1]);
	}

	function index() {
		$data['config'] = $this->db->get('config')->row();

		$this->twig->display('config/index.twig', $data);
	}

	function aksi_ubah() {
		$fav = $_FILES['favicon'];
		if ($fav['size'] != 0) {
			move_uploaded_file($fav['tmp_name'], 'uploads/favicon');
		}

		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->update('config', $data);

		redirect(base_url());
	}

}