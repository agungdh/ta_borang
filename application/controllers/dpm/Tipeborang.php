<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipeborang extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 2) {
			redirect(base_url('logout'));
		}

		$this->table = "tipeversi";
	}

	function index($versi_id) {
		$data['nav'] = "dpm/tipeborang/nav";
		$data['isi'] = "dpm/tipeborang/index";
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $versi_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where($this->table, ['versi_id' => $versi_id])->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah($versi_id) {
		$data['nav'] = "dpm/tipeborang/nav";
		$data['isi'] = "dpm/tipeborang/form";
		$data['aksi'] = "tambah";
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "dpm/tipeborang/nav";
		$data['isi'] = "dpm/tipeborang/form";
		$data['aksi'] = "ubah";
		$data['data']['tipeborang'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('dpm/tipeborang/index/' . $data['versi_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('dpm/tipeborang/index/' . $data['versi_id']));
	}

	function aksi_hapus($id) {
		$versi_id = $this->db->get_where($this->table, ['id' => $id])->row()->versi_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('dpm/tipeborang/index/' . $versi_id));
	}

}
