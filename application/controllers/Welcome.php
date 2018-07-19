<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		if ($this->session->login != true) {
			$this->twig->display("template/login.twig");
		} else {
			$data['config'] = $this->db->get('config')->row();
			
			if ($this->session->level != 3) {
				$data['progress']['jumlah_pengajuan'] = $data['progress']['jumlah_pengajuan_selesai'] = $data['progress']['jumlah_pengajuan_proses'] = 0;
				foreach ($this->db->get('v_pengajuan')->result() as $item) {
				 	$id = $item->id;	
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
			      		$jumlah_persentase = number_format(($jumlah_berkas_terupload / $jumlah_berkas_harus_diupload) * 100, 0);
					}

					if ($jumlah_persentase == 100) {
						$data['progress']['jumlah_pengajuan_selesai']++;
					} else {
						$data['progress']['jumlah_pengajuan_proses']++;
					}

					$data['progress']['jumlah_pengajuan']++;

				 } 
				 
				$this->twig->display("welcome/index_r.twig", $data);
			} else {
				$data['progress']['jumlah_pengajuan'] = $data['progress']['jumlah_pengajuan_selesai'] = $data['progress']['jumlah_pengajuan_proses'] = 0;
				foreach ($this->db->get_where('v_pengajuan', ['prodi_id' => $this->session->prodi_id])->result() as $item) {
				 	$id = $item->id;	
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
			      		$jumlah_persentase = number_format(($jumlah_berkas_terupload / $jumlah_berkas_harus_diupload) * 100, 0);
					}

					if ($jumlah_persentase == 100) {
						$data['progress']['jumlah_pengajuan_selesai']++;
					} else {
						$data['progress']['jumlah_pengajuan_proses']++;

						if ($jumlah_berkas_harus_diupload == 0) {
							$jumlah_persentase = 0;
						} else {
				      		$jumlah_persentase = number_format(($jumlah_berkas_terupload / $jumlah_berkas_harus_diupload) * 100, 2);
						}

						$data['progress']['jumlah_persentase'] = $jumlah_persentase;
					}

					$data['progress']['jumlah_pengajuan']++;

				 } 

				$this->twig->display("welcome/index_crud.twig", $data);
			}

		}
	}

	function login() {
		$data_user = $this->db->get_where('user', ['username' => $this->input->post('username'), 'password' => hash("sha512", $this->input->post('password'))])->row();

		if ($data_user != null) {			
			$array_data_user = array(
				'id'  => $data_user->id,
				'nama'  => $data_user->nama,
				'username'  => $data_user->username,
				'level'  => $data_user->level,
				'prodi_id'  => $data_user->prodi_id,
				'login'  => true
			);

			$this->session->set_userdata($array_data_user);

			echo json_encode(['login' => true]);
		} else {
			$data['header'] = "ERROR !!!";
			$data['pesan'] = "Password Salah !!!";
			$data['status'] = "error";

			$data['login'] = false;

			echo json_encode($data);
		}
	}

}