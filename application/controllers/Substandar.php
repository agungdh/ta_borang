<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Substandar extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 2]);

		$this->table = "substandar";
	}

	function index($standar_id) {
		$data['nav'] = "substandar/nav";
		$data['isi'] = "substandar/index";
		$data['data']['substandar'] = $this->db->get_where($this->table, ['standar_id' => $standar_id])->result();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $standar_id])->row();;
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $data['data']['standar']->versi_id])->row();
		
		$this->load->view("template/template", $data);
	}

	function tambah($standar_id) {
		$data['nav'] = "substandar/nav";
		$data['isi'] = "substandar/form";
		$data['aksi'] = "tambah";
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $standar_id])->row();;
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $data['data']['standar']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "substandar/nav";
		$data['isi'] = "substandar/form";
		$data['aksi'] = "ubah";
		$data['data']['substandar'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();;
		$data['data']['versi'] = $this->db->get_where('versi', ['id' => $data['data']['standar']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('substandar/index/' . $data['standar_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('substandar/index/' . $data['standar_id']));
	}

	function aksi_hapus($id) {
		$standar_id = $this->db->get_where($this->table, ['id' => $id])->row()->standar_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('substandar/index/' . $standar_id));
	}

}
