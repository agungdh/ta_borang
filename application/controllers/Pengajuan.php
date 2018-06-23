<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		redirect(base_url());
	}

	function aksi_detilpengajuan() {
		redirect(base_url('pengajuan/detil_crud/' . $this->input->post('pengajuan_id') . '?tab=' . $this->input->post('last_tab')));
	}

	function detil_crud($id) {
		$data['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $id])->row();

		$this->db->where(['versi_id' => $data['pengajuan']->versi_id]);
		$this->db->order_by('nomor', 'asc');
		$data['nav'] = $this->db->get('standar')->result();

		$data['detil'] = [];
		$i = 0;
		$standar = $this->db->get_where('standar', ['versi_id' => $data['pengajuan']->versi_id])->result();
		foreach ($standar as $item_standar) {
			$substandar = $this->db->get_where('substandar', ['standar_id' => $item_standar->id])->result();
			foreach ($substandar as $item_substandar) {
				$butir = $this->db->get_where('butir', ['substandar_id' => $item_substandar->id])->result();
				if ($butir != null) {
					$id_standar = 0; $id_substandar = 0; $id_butir = 0;
					foreach ($butir as $item_butir) {
						$standar_string = $id_standar == $item_standar->id ? null : $item_standar->nomor . ' ' . $item_standar->nama;
						$substandar_string = $id_substandar == $item_substandar->id ? null : $item_substandar->nomor . ' ' . $item_substandar->nama;
						$data['detil'][$item_standar->nomor][$i]['standar'] = $standar_string;
						$data['detil'][$item_standar->nomor][$i]['id_standar'] = $item_standar->id;
						$data['detil'][$item_standar->nomor][$i]['substandar'] = $substandar_string;
						$data['detil'][$item_standar->nomor][$i]['id_substandar'] = $item_substandar->id;
						$data['detil'][$item_standar->nomor][$i]['butir'] = $item_butir->nomor . ' ' . $item_butir->nama;
						$data['detil'][$item_standar->nomor][$i]['id_butir'] = $item_butir->id;

						$i++;

						$id_standar = $item_standar->id; $id_substandar = $item_substandar->id;
					}
				} else {
					$standar_string = $id_standar == $item_standar->id ? null : $item_standar->nomor . ' ' . $item_standar->nama;
					$substandar_string = $id_substandar == $item_substandar->id ? null : $substandar_string;
					$data['detil'][$item_standar->nomor][$i]['standar'] = $standar_string;
					$data['detil'][$item_standar->nomor][$i]['id_standar'] = $item_standar->id;
					$data['detil'][$item_standar->nomor][$i]['substandar'] = $item_substandar->nomor . ' ' . $item_substandar->nama;
					$data['detil'][$item_standar->nomor][$i]['id_substandar'] = $item_substandar->id;

					$i++;

					$id_standar = $item_standar->id; $id_substandar = $item_substandar->id;
				}
			}
		}

		$this->twig->display('pengajuan/detil_crud.twig', $data);		
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

		redirect(base_url('pengajuan/detil_crud/' . $this->db->insert_id()));
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
	            <a class="btn btn-primary" href="' . base_url('pengajuan/detil_crud/' . $row->id) . '" data-toggle="tooltip" title="Detil Pengajuan"><i class="fa fa-share"></i></a>
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
	            <a class="btn btn-primary" href="' . base_url('pengajuan/detil_crud/' . $row->id) . '" data-toggle="tooltip" title="Detil Pengajuan"><i class="fa fa-share"></i></a>
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