<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();
		
		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}
		
		$this->table = "user";
	}

	function index() {
		$data['nav'] = "profil/nav";
		$data['isi'] = "profil/index";
		$data['data']['user'] = $this->db->get_where($this->table, ['id' => $this->session->id])->row();
		
		$this->load->view("template/template", $data);
	}

	function ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		$this->session->set_userdata('nama', $data['nama']);

		$flashdata['header'] = "BERHASIL !!!";
		$flashdata['pesan'] = "Berhasil Ubah Profil !!!";
		$flashdata['status'] = "success";
		
		$this->session->set_flashdata('data', $flashdata);
		redirect(base_url('profil'));
	}

	function ganti_password() {
		foreach ($this->input->post('data') as $key => $value) {
			if ($key == "password") {
				$data[$key] = hash("sha512", $value);
			} else {
				$data[$key] = $value;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		$flashdata['header'] = "BERHASIL !!!";
		$flashdata['pesan'] = "Berhasil Ganti Password !!!";
		$flashdata['status'] = "success";
		
		$this->session->set_flashdata('data', $flashdata);
		redirect(base_url('profil'));
	}

}
