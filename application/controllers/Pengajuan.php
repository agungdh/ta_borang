<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		redirect(base_url());
	}

	function r() {
		$this->pustaka->auth($this->session->level, [1, 2]);

		$this->twig->display('pengajuan/r.twig');
	}

	function crud() {
		$this->pustaka->auth($this->session->level, [3]);

		$this->twig->display('pengajuan/crud.twig');
	}


	function tambah() {
		$this->pustaka->auth($this->session->level, [3]);

		$data['aksi'] = 'tambah';
		$this->twig->display('pengajuan/form.twig', $data);
	}

	function ubah($id) {
		$this->pustaka->auth($this->session->level, [3]);

		$data['aksi'] = 'ubah';
		$data['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $id])->row();

		$this->twig->display('pengajuan/form.twig', $data);
	}

	function aksi_tambah() {
		$this->pustaka->auth($this->session->level, [3]);

		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		$data['tanggal_pengajuan'] = date('Y-m-d');
		$data['prodi_id'] = $this->session->prodi_id;

		$this->db->insert('pengajuan', $data);

		redirect(base_url('pengajuan/crud'));
	}

	function aksi_ubah() {
		$this->pustaka->auth($this->session->level, [3]);

		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update('pengajuan', $data, $where);

		redirect(base_url('pengajuan/crud'));
	}

	function aksi_hapus($id) {
		$this->pustaka->auth($this->session->level, [3]);

		$this->db->delete('pengajuan', ['id' => $id]);
	}

	function ajax_crud(){
		$this->pustaka->auth($this->session->level, [3]);

	    $requestData = $_REQUEST;
	    $columns = ['tanggal_pengajuan', 'tahun_usulan'];

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM pengajuan
	        WHERE prodi_id = ?", [$this->session->prodi_id])->row();

	        $totalData = $row->total_data;
	        $totalFiltered = $totalData; 

	    $data = [];

	    if( !empty($requestData['search']['value']) ) {
	      $search_value = "%" . $requestData['search']['value'] . "%";

		    $cari = [];

		    $cari[] = $this->session->prodi_id;

	  	    for ($i=1; $i <= 2; $i++) { 
		    	$cari[] = $search_value;
		    }

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM pengajuan
	        WHERE prodi_id = ?
	        AND (tanggal_pengajuan LIKE ? OR tahun_usulan like ?)", $cari)->row();

	        $totalFiltered = $row->total_data; 

	      $query = $this->db->query("SELECT *
	        FROM pengajuan
	        WHERE prodi_id = ?
	        AND (tanggal_pengajuan LIKE ? OR tahun_usulan like ?)
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], $cari);
	            
	    } else {  

	      $query = $this->db->query("SELECT *
	        FROM pengajuan
	        WHERE prodi_id = ?
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], [$this->session->prodi_id]);
	            
	    }

	    foreach ($query->result() as $row) { 
	      $nestedData=[]; 
	      $id = $row->id;
	      $nestedData[] = $this->pustaka->tanggal_indo($row->tanggal_pengajuan);
	      $nestedData[] = $row->tahun_usulan;
	      $versi = $this->db->get_where('versi', ['id' => $row->versi_id])->row();
	      $nestedData[] = $versi->nama . ' (' . $versi->tahun . ')';
	      $nestedData[] = '60%';
	      $nestedData[] = '
	          <div class="btn-group">
	            <a class="btn btn-primary" href="' . base_url('substandar/index/' . $row->id) . '" data-toggle="tooltip" title="Substandar"><i class="fa fa-share"></i></a>
	            <a class="btn btn-primary" href="' . base_url('pengajuan/ubah/' . $row->id) . '" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a>
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

	function ajax_r(){
		$this->pustaka->auth($this->session->level, [3]);

	    $requestData = $_REQUEST;
	    $columns = ['tanggal_pengajuan', 'nama'];

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM pengajuan
	        WHERE versi_id = ?", [$versi_id])->row();

	        $totalData = $row->total_data;
	        $totalFiltered = $totalData; 

	    $data = [];

	    if( !empty($requestData['search']['value']) ) {
	      $search_value = "%" . $requestData['search']['value'] . "%";

		    $cari = [];

		    $cari[] = $versi_id;

	  	    for ($i=1; $i <= 2; $i++) { 
		    	$cari[] = $search_value;
		    }

	      $row = $this->db->query("SELECT count(*) total_data 
	        FROM pengajuan
	        WHERE versi_id = ?
	        AND (nama LIKE ? OR nomor like ?)", $cari)->row();

	        $totalFiltered = $row->total_data; 

	      $query = $this->db->query("SELECT *
	        FROM pengajuan
	        WHERE versi_id = ?
	        AND (nama LIKE ? OR nomor like ?)
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], $cari);
	            
	    } else {  

	      $query = $this->db->query("SELECT *
	        FROM pengajuan
	        WHERE versi_id = ?
	        ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], [$versi_id]);
	            
	    }

	    foreach ($query->result() as $row) { 
	      $nestedData=[]; 
	      $id = $row->id;
	      $nestedData[] = $row->nomor;
	      $nestedData[] = $row->nama;
	      $nestedData[] = '
	          <div class="btn-group">
	            <a class="btn btn-primary" href="' . base_url('substandar/index/' . $row->id) . '" data-toggle="tooltip" title="Substandar"><i class="fa fa-share"></i></a>
	            <a class="btn btn-primary" href="' . base_url('pengajuan/ubah/' . $row->id) . '" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a>
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