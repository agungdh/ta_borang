<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standar extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 2) {
			redirect(base_url('logout'));
		}

		$this->table = "standar";
	}

	function index($tipeversi_id) {
		$data['nav'] = "dpm/standar/nav";
		$data['isi'] = "dpm/standar/index";
		$data['data']['standar'] = $this->db->get_where($this->table, ['tipeversi_id' => $tipeversi_id])->result();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function tambah($tipeversi_id) {
		$data['nav'] = "dpm/standar/nav";
		$data['isi'] = "dpm/standar/form";
		$data['aksi'] = "tambah";
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();


		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "dpm/standar/nav";
		$data['isi'] = "dpm/standar/form";
		$data['aksi'] = "ubah";
		$data['data']['standar'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('dpm/standar/index/' . $data['tipeversi_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('dpm/standar/index/' . $data['tipeversi_id']));
	}

	function aksi_hapus($id) {
		$tipeversi_id = $this->db->get_where($this->table, ['id' => $id])->row()->tipeversi_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('dpm/standar/index/' . $tipeversi_id));
	}

}
