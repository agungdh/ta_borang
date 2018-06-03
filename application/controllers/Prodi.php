<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 2]);

		$this->table = "prodi";
	}

	function index($fakultas_id) {
		$data['nav'] = "prodi/nav";
		$data['isi'] = "prodi/index";
		$data['data']['fakultas'] = $this->db->get_where('fakultas', ['id' => $fakultas_id])->row();
		$data['data']['prodi'] = $this->db->get_where($this->table, ['fakultas_id' => $fakultas_id])->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah($fakultas_id) {
		$data['nav'] = "prodi/nav";
		$data['isi'] = "prodi/form";
		$data['aksi'] = "tambah";
		$data['data']['fakultas'] = $this->db->get_where('fakultas', ['id' => $fakultas_id])->row();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "prodi/nav";
		$data['isi'] = "prodi/form";
		$data['aksi'] = "ubah";
		$data['data']['prodi'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['fakultas'] = $this->db->get_where('fakultas', ['id' => $data['data']['prodi']->fakultas_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('prodi/index/' . $data['fakultas_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('prodi/index/' . $data['fakultas_id']));
	}

	function aksi_hapus($id) {
		$data['data']['prodi'] = $this->db->get_where($this->table, ['id' => $id])->row();
		
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('prodi/index/' . $data['data']['prodi']->fakultas_id));
	}

}
