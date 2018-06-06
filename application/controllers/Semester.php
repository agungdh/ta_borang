<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->pustaka->auth($this->session->level, [1]);
	}

	function index() {
		$data['isi'] = 'semester/index';
		$data['js'] = 'semester/index_js';

		$this->db->where('semester_id', 1);
		$this->db->order_by('bulan', 'ASC');
		$data['data']['semester'] = $this->db->get('detil_semester')->row();

		$this->load->view('template/template', $data);
	}

	function aksi_ubah() {
		$this->db->truncate('detil_semester');

		$nilai = $this->input->post('ganjil_awal');

		$nilai2 = $nilai;

		$data_ganjil = [];
		$data_ganjil[] = (int)$nilai;
		for ($i = 1; $i <= 5; $i++) { 
			if ($nilai2 == 12) {
				$nilai2 = 1;
				$data_ganjil[] = $nilai2;
			} else {
				$nilai2++;
				$data_ganjil[] = (int)$nilai2;
			}
		}

		foreach ($data_ganjil as $item) {
			$this->db->insert('detil_semester', ['bulan' => $item, 'semester_id' => 1]);
		}

		if ($nilai2 == 12) {
			$nilai3 = 1;
		} else {
			$nilai3 = $nilai2 + 1;
		}

		$nilai4 = $nilai3;

		$data_genap = [];
		$data_genap[] = (int)$nilai3;
		for ($i = 1; $i <= 5; $i++) {
			if ($nilai4 == 12) {
				$nilai4 = 1;
				$data_genap[] = $nilai4;
			} else {
				$nilai4++;
				$data_genap[] = (int)$nilai4;
			}
		}	

		foreach ($data_genap as $item) {
			$this->db->insert('detil_semester', ['bulan' => $item, 'semester_id' => 2]);
		}

		echo json_encode(['success' => true]);
	}

}