<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		if ($this->session->login != true) {
			$this->load->view("template/login");
		} else {
			$data['nav'] = "welcome/nav";
			$data['isi'] = "welcome/index";
			
			$this->load->view("template/template", $data);
		}
	}

	function login() {
		$data_user = $this->db->get_where('user', ['username' => $this->input->post('username'), 'password' => hash("sha512", $this->input->post('password'))])->row();

		if ($data_user != null) {			
			$array_data_user = array(
				'id'  => $data_user->id,
				'nama'  => $data_user->nama,
				'username'  => $data_user->username,
				'level'  => $data_user->level,
				'unit_id'  => $data_user->unit_id,
				'login'  => true
			);

			$this->session->set_userdata($array_data_user);

			redirect(base_url());
		} else {
			$flashdata['header'] = "ERROR !!!";
			$flashdata['pesan'] = "Password Salah !!!";
			$flashdata['status'] = "error";

			$flashdata['username'] = $this->input->post('username');
			
			$this->session->set_flashdata('data', $flashdata);
			redirect(base_url());
		}
	}

}