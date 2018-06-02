<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class versi extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 1) {
			redirect(base_url('logout'));
		}

		$this->table = "versi";
	}

	function index() {
		$data['nav'] = "admin/versi/nav";
		$data['isi'] = "admin/versi/index";
		$data['data']['versi'] = $this->db->get($this->table)->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['nav'] = "admin/versi/nav";
		$data['isi'] = "admin/versi/form";
		$data['aksi'] = "tambah";

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "admin/versi/nav";
		$data['isi'] = "admin/versi/form";
		$data['aksi'] = "ubah";
		$data['data']['versi'] = $this->db->get_where($this->table, ['id' => $id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('admin/versi'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('admin/versi'));
	}

	function aksi_hapus($id) {
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('admin/versi'));
	}

}