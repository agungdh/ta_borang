<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 1) {
			redirect(base_url('logout'));
		}

		$this->table = "fakultas";
	}

	function index() {
		$data['nav'] = "admin/fakultas/nav";
		$data['isi'] = "admin/fakultas/index";
		$data['data']['fakultas'] = $this->db->get($this->table)->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['nav'] = "admin/fakultas/nav";
		$data['isi'] = "admin/fakultas/form";
		$data['aksi'] = "tambah";

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "admin/fakultas/nav";
		$data['isi'] = "admin/fakultas/form";
		$data['aksi'] = "ubah";
		$data['data']['fakultas'] = $this->db->get_where($this->table, ['id' => $id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('admin/fakultas'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('admin/fakultas'));
	}

	function aksi_hapus($id) {
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('admin/fakultas'));
	}

}
