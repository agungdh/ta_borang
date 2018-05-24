<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listdokumen extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 2) {
			redirect(base_url('logout'));
		}

		$this->table = "listdokumen";
	}

	function index($butir_id) {
		$data['nav'] = "dpm/listdokumen/nav";
		$data['isi'] = "dpm/listdokumen/index";
		$data['data']['listdokumen'] = $this->db->get_where($this->table, ['butir_id' => $butir_id])->result();
		$data['data']['butir'] = $this->db->get_where('butir', ['id' => $butir_id])->row();
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $data['data']['butir']->substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();
		
		$this->load->view("template/template", $data);
	}

	function tambah($butir_id) {
		$data['nav'] = "dpm/listdokumen/nav";
		$data['isi'] = "dpm/listdokumen/form";
		$data['aksi'] = "tambah";
		$data['data']['butir'] = $this->db->get_where('butir', ['id' => $butir_id])->row();
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $data['data']['butir']->substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();
		$data['data']['tipe_listdokumen'] = $this->db->get('tipe_listdokumen')->result();

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "dpm/listdokumen/nav";
		$data['isi'] = "dpm/listdokumen/form";
		$data['aksi'] = "ubah";
		$data['data']['listdokumen'] = $this->db->get_where($this->table, ['id' => $id])->row();
		$data['data']['butir'] = $this->db->get_where('butir', ['id' => $data['data']['listdokumen']->butir_id])->row();
		$data['data']['substandar'] = $this->db->get_where('substandar', ['id' => $data['data']['butir']->substandar_id])->row();
		$data['data']['standar'] = $this->db->get_where('standar', ['id' => $data['data']['substandar']->standar_id])->row();
		$data['data']['tipeborang'] = $this->db->get_where('tipeversi', ['id' => $data['data']['standar']->tipeversi_id])->row();
		$data['data']['borang'] = $this->db->get_where('versi', ['id' => $data['data']['tipeborang']->versi_id])->row();
		$data['data']['tipe_listdokumen'] = $this->db->get('tipe_listdokumen')->result();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('dpm/listdokumen/index/' . $data['butir_id']));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('dpm/listdokumen/index/' . $data['butir_id']));
	}

	function aksi_hapus($id) {
		$butir_id = $this->db->get_where($this->table, ['id' => $id])->row()->butir_id;
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('dpm/listdokumen/index/' . $butir_id));
	}

}
