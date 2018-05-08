<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 3) {
			redirect(base_url('logout'));
		}

		$this->table = "pengajuan";
	}

	function index() {
		$data['nav'] = "prodi/pengajuan/nav";
		$data['isi'] = "prodi/pengajuan/index";
		$data['data']['pengajuan'] = $this->db->get($this->table)->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['nav'] = "prodi/pengajuan/nav";
		$data['isi'] = "prodi/pengajuan/form";
		$data['aksi'] = "tambah";

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "prodi/pengajuan/nav";
		$data['isi'] = "prodi/pengajuan/form";
		$data['aksi'] = "ubah";
		$data['data']['pengajuan'] = $this->db->get_where($this->table, ['id' => $id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('prodi/pengajuan'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('prodi/pengajuan'));
	}

	function aksi_hapus($id) {
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('prodi/pengajuan'));
	}

}
