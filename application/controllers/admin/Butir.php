<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Butir extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 1) {
			redirect(base_url('logout'));
		}

		$this->table = "butir";
	}

	function index($substandar_id) {
		$data['nav'] = "admin/butir/nav";
		$data['isi'] = "admin/butir/index";
		$data['data']['butir'] = $this->db->get_where($this->table, ['substandar_id' => $substandar_id])->result();
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();
		
		$this->load->view("template/template", $data);
	}

	function tambah($substandar_id) {
		$data['nav'] = "admin/butir/nav";
		$data['isi'] = "admin/butir/form";
		$data['aksi'] = "tambah";
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "admin/butir/nav";
		$data['isi'] = "admin/butir/form";
		$data['aksi'] = "ubah";
		$data['data']['butir'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $data['data']['butir']->substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('admin/butir/index/' . $data['substandar_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('admin/butir/index/' . $data['substandar_id']));
	}

	function aksi_hapus($id) {
		$substandar_id = $this->db->get_where($this->table, ['id' => $id])->row()->substandar_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('admin/butir/index/' . $substandar_id));
	}

}
