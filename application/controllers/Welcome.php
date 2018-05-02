<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');
	}

	function index() {
		$data['mahasiswa'] = $this->m_welcome->ambil();
		
		$get_id = $this->input->get('id');
		if ($get_id != null && $get_id != "") {
			$data['form'] = $this->m_welcome->ambil_where(array('id' => $get_id));
		}
		
		$this->load->view('welcome/index', $data);
	}

	function tambah() {
		$where['npm'] = $this->input->post('npm');
		if ($this->m_welcome->ambil_where($where) == null) {
			$data['npm'] = $this->input->post('npm');
			$data['nama'] = $this->input->post('nama');
			$this->m_welcome->tambah($data);			
			
			redirect(base_url());
		} else {
			redirect(base_url('?error=1'));
		}
	}

	function ubah() {
		$mahasiswa_awal = $this->m_welcome->ambil_where(array('id' => $this->input->post('id')));

		if ($mahasiswa_awal->npm != $this->input->post('npm')) {
			$where['npm'] = $this->input->post('npm');
			if ($this->m_welcome->ambil_where($where) == null) {
				$data['npm'] = $this->input->post('npm');
				$data['nama'] = $this->input->post('nama');

				$where2['id'] = $this->input->post('id');

				$this->m_welcome->ubah($data, $where2);			
				
				redirect(base_url());
			} else {
				redirect(base_url('?error=1'));
			}
		} else {
			$data['npm'] = $this->input->post('npm');
			$data['nama'] = $this->input->post('nama');

			$where2['id'] = $this->input->post('id');

			$this->m_welcome->ubah($data, $where2);			
			
			redirect(base_url());
		}
	}

	function hapus($id) {
		$where['id'] = $id;
		$this->m_welcome->hapus($where);

		redirect(base_url());
	}

}
