<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Apfelbox\FileDownload\FileDownload;

class Pengajuan extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		redirect(base_url());
	}

	function berkas($berkas_id) {
		$berkas = $this->db->get_where('berkas', ['id' => $berkas_id])->row();

		$fileDownload = FileDownload::createFromFilePath('uploads/berkas/' . $berkas->id);
		$fileDownload->sendDownload($berkas->nama);
	}

	function berkas_batch($pengajuan_id) {
		$zipFile = new \PhpZip\ZipFile();
		
		$data['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $pengajuan_id])->row();

		$data['detil'] = [];
		$i = 0;
		$standar = $this->db->get_where('standar', ['versi_id' => $data['pengajuan']->versi_id])->result();
		foreach ($standar as $item_standar) {
			$substandar = $this->db->get_where('substandar', ['standar_id' => $item_standar->id])->result();
			foreach ($substandar as $item_substandar) {
				$butir = $this->db->get_where('butir', ['substandar_id' => $item_substandar->id])->result();
				if ($butir != null) {
					foreach ($butir as $item_butir) {						
						$file = $this->db->get_where('berkas', ['pengajuan_id' => $data['pengajuan']->id, 'butir_id' => $item_butir->id])->row();

						$data['detil'][$item_standar->nomor][$i]['filename'] = $file != null ? 'Standar ' . $item_standar->nomor . '/' . 'Substandar ' . $item_substandar->nomor . '/' . 'Butir ' . $item_butir->nomor . ' - ' . $file->nama : null;
						$data['detil'][$item_standar->nomor][$i]['berkas_id'] = $file != null ? $file->id : null;

						$i++;
					}
				} else {
					$file = $this->db->get_where('berkas', ['pengajuan_id' => $data['pengajuan']->id, 'substandar_id' => $item_substandar->id])->row();

					$data['detil'][$item_standar->nomor][$i]['filename'] = $file != null ? 'Standar ' . $item_standar->nomor . '/' . 'Substandar ' . $item_substandar->nomor . ' - ' . $file->nama : null;
					$data['detil'][$item_standar->nomor][$i]['berkas_id'] = $file != null ? $file->id : null;

					$i++;
				}
			}
		}
		
		foreach ($data['detil'] as $item) {
			foreach ($item as $item2) {
				// foreach ($item2 as $value) {
				// 	if ($value != null) {
				// 		echo $value . "\n";
				// 	}
				// }
				if ($item2['berkas_id'] != null) {
					// var_dump($item2);
					$zipFile->addFile('uploads/berkas/' . $item2['berkas_id'], $item2['filename']);
				}
			}
		}


		$filename = "temps/" . $this->session->id;

		file_exists($filename) ? unlink($filename) : null;

		$zipFile->saveAsFile($filename);
		$zipFile->close();

		// var_dump($data['pengajuan']);
		// var_dump($this->db->get_where('prodi', ['id' => $data['pengajuan']->prodi_id])->row()); die;

		$fileOutput = "";
		$prodi = $this->db->get_where('prodi', ['id' => $data['pengajuan']->prodi_id])->row();
		$fileOutput .= "Prodi " . $prodi->nama . ' - ';
		$versi = $this->db->get_where('versi', ['id' => $data['pengajuan']->versi_id])->row();
		// var_dump($versi); die;
		$fileOutput .= "Standar Akreditasi " . $versi->nama . ' (' .  $versi->tahun . ')';
		$fileOutput .= '.zip';

		// var_dump($fileOutput); die;

		$fileDownload = FileDownload::createFromFilePath($filename);
		$fileDownload->sendDownload($fileOutput);
	}

	function aksi_detilpengajuan() {
		// echo "Butir\n";
		foreach ($this->input->post('berkas_butir') as $value) {
			if ($_FILES['berkas_butir_' . $value]['name'] != '') {
				// var_dump($_FILES['berkas_butir_' . $value]);
				$data['nama'] = $_FILES['berkas_butir_' . $value]['name'];
				$data['butir_id'] = $value;
				$data['pengajuan_id'] = $this->input->post('pengajuan_id');

				// var_dump($data);
				$this->db->insert('berkas', $data);
				move_uploaded_file($_FILES['berkas_butir_' . $value]['tmp_name'], 'uploads/berkas/' . $this->db->insert_id());
				unset($data);
			}
		}

		// echo "Sub Standar\n";
		foreach ($this->input->post('berkas_substandar') as $value) {
			if ($_FILES['berkas_substandar_' . $value]['name'] != '') {
				// var_dump($_FILES['berkas_substandar_' . $value]);
				$data['nama'] = $_FILES['berkas_substandar_' . $value]['name'];
				$data['substandar_id'] = $value;
				$data['pengajuan_id'] = $this->input->post('pengajuan_id');

				// var_dump($data);
				$this->db->insert('berkas', $data);
				move_uploaded_file($_FILES['berkas_substandar_' . $value]['tmp_name'], 'uploads/berkas/' . $this->db->insert_id());
				unset($data);
			}
		}

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
						
						$file = $this->db->get_where('berkas', ['pengajuan_id' => $data['pengajuan']->id, 'butir_id' => $item_butir->id])->row();

						$data['detil'][$item_standar->nomor][$i]['filename'] = $file != null ? $file->nama : '-';
						$data['detil'][$item_standar->nomor][$i]['berkas_id'] = $file != null ? $file->id : null;

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

					$file = $this->db->get_where('berkas', ['pengajuan_id' => $data['pengajuan']->id, 'substandar_id' => $item_substandar->id])->row();

					$data['detil'][$item_standar->nomor][$i]['filename'] = $file != null ? $file->nama : '-';
					$data['detil'][$item_standar->nomor][$i]['berkas_id'] = $file != null ? $file->id : null;

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
	      
   		    $data_progress['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $id])->row();

			$data_progress['detil'] = [];
			$i = 0;
			$jumlah_berkas_terupload = 0;
			$jumlah_berkas_harus_diupload = 0;
			$standar = $this->db->get_where('standar', ['versi_id' => $data_progress['pengajuan']->versi_id])->result();
			foreach ($standar as $item_standar) {
				$substandar = $this->db->get_where('substandar', ['standar_id' => $item_standar->id])->result();
				foreach ($substandar as $item_substandar) {
					$butir = $this->db->get_where('butir', ['substandar_id' => $item_substandar->id])->result();
					if ($butir != null) {
						foreach ($butir as $item_butir) {							
							$file = $this->db->get_where('berkas', ['pengajuan_id' => $data_progress['pengajuan']->id, 'butir_id' => $item_butir->id])->row();

							if ($file != null) {
								$jumlah_berkas_terupload++;
							}
							
							$jumlah_berkas_harus_diupload++;

							$i++;
						}
					} else {						
						$file = $this->db->get_where('berkas', ['pengajuan_id' => $data_progress['pengajuan']->id, 'substandar_id' => $item_substandar->id])->row();

							if ($file != null) {
								$jumlah_berkas_terupload++;
							}						
							
							$jumlah_berkas_harus_diupload++;

						$i++;
					}
				}
			}

			if ($jumlah_berkas_harus_diupload == 0) {
				$jumlah_persentase = 0;
			} else {
	      		$jumlah_persentase = number_format(($jumlah_berkas_terupload / $jumlah_berkas_harus_diupload) * 100, 2);
			}

	      $nestedData[] = '
  	        <div class="progress" data-toggle="tooltip" title="' . $jumlah_persentase . "%" . '">
  			  <div class="progress-bar" role="progressbar" style="width: ' . $jumlah_persentase . '%;" aria-valuenow="' . $jumlah_persentase . '" aria-valuemin="0" aria-valuemax="100">' . $jumlah_persentase . '%</div>
  			</div>';
	      $nestedData[] = '
	          <div class="btn-group">
	            <a class="btn btn-primary" href="' . base_url('pengajuan/berkas_batch/' . $row->id) . '" data-toggle="tooltip" title="Download Berkas"><i class="fa fa-download"></i></a>
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