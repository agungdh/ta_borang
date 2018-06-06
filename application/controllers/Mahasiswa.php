<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->pustaka->auth($this->session->level, [1]);
	}

	function index() {
		$data['isi'] = 'mahasiswa/index';
		$data['js'] = 'mahasiswa/index_js';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'mahasiswa/tambah';
		$data['js'] = 'mahasiswa/tambah_js';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'mahasiswa/ubah';
		$data['js'] = 'mahasiswa/ubah_js';
		$data['data']['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		$this->db->insert('mahasiswa', $data);

		redirect(base_url('mahasiswa'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update('mahasiswa', $data, $where);

		redirect(base_url('mahasiswa'));
	}

	function aksi_hapus($id) {
		$this->db->delete('mahasiswa', ['id' => $id]);

		redirect(base_url('mahasiswa'));
	}

	function ajax(){
	    $requestData = $_REQUEST;
	    $columns = ['nip', 'nama', 'nama_prodi', 'nama_fakultas'];

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM v_mahasiswa", [])->row();

	        $totalData = $row->total_data;
	        $totalFiltered = $totalData; 

	    $data = [];

	    if( !empty($requestData['search']['value']) ) {
	      $search_value = "%" . $requestData['search']['value'] . "%";

		    $cari = [];

	  	    for ($i=1; $i <= 4; $i++) { 
		    	$cari[] = $search_value;
		    }

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM v_mahasiswa
	        WHERE nip LIKE ?
	        OR nama like ?
	        OR nama_prodi like ?
	        OR nama_fakultas like ?", $cari)->row();

	        $totalFiltered = $row->total_data; 

	      $query = $this->db->query("SELECT *
	        FROM v_mahasiswa
	        WHERE nip LIKE ?
	        OR nama like ?
	        OR nama_prodi like ?
	        OR nama_fakultas like ?
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], $cari);
	            
	    } else {  

	      $query = $this->db->query("SELECT *
	        FROM v_mahasiswa
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], []);
	            
	    }

	    foreach ($query->result() as $row) { 
	      $nestedData=[]; 
	      $id = $row->id;
	      $nestedData[] = $row->nip;
	      $nestedData[] = $row->nama;
	      $nestedData[] = $row->nama_prodi;
	      $nestedData[] = $row->nama_fakultas;
	      $nestedData[] = '
	          <div class="btn-group">
	            <a class="btn btn-primary" href="' . base_url('mahasiswa/ubah/' . $row->id) . '" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a>
	            <a class="btn btn-primary" href="#" onclick="hapus(' . "'$row->id'" . ')" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
	          </div>';

	      $data[] = $nestedData;
	        
	    }

	    $json_data = [
	          "draw"            => intval( $requestData['draw'] ),    
	          "recordsTotal"    => intval( $totalData ), 
	          "recordsFiltered" => intval( $totalFiltered ), 
	          "data"            => $data   
	          ];

	    echo json_encode($json_data);  
	  }

}