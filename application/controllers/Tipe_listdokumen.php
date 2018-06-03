<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_listdokumen extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 2]);

		$this->table = "tipe_listdokumen";
	}

	function index() {
		$data['nav'] = "tipe_listdokumen/nav";
		$data['isi'] = "tipe_listdokumen/index";
		$data['data']['tipe_listdokumen'] = $this->db->get($this->table)->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['nav'] = "tipe_listdokumen/nav";
		$data['isi'] = "tipe_listdokumen/form";
		$data['aksi'] = "tambah";

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "tipe_listdokumen/nav";
		$data['isi'] = "tipe_listdokumen/form";
		$data['aksi'] = "ubah";
		$data['data']['tipe_listdokumen'] = $this->db->get_where($this->table, ['id' => $id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('tipe_listdokumen'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('tipe_listdokumen'));
	}

	function aksi_hapus($id) {
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('tipe_listdokumen'));
	}

}
