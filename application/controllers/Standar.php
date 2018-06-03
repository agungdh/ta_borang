<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standar extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 2]);

		$this->table = "standar";
	}

	function index($versi_id) {
		$data['nav'] = "standar/nav";
		$data['isi'] = "standar/index";
		$data['data']['standar'] = $this->db->get_where($this->table, ['versi_id' => $versi_id])->result();
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function tambah($versi_id) {
		$data['nav'] = "standar/nav";
		$data['isi'] = "standar/form";
		$data['aksi'] = "tambah";
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "standar/nav";
		$data['isi'] = "standar/form";
		$data['aksi'] = "ubah";
		$data['data']['standar'] = $this->db->get_where($this->table, ['id' => $id])->row();;
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $data['data']['standar']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('standar/index/' . $data['versi_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('standar/index/' . $data['versi_id']));
	}

	function aksi_hapus($id) {
		$versi_id = $this->db->get_where($this->table, ['id' => $id])->row()->versi_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('standar/index/' . $versi_id));
	}

}
