<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pengajuan extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 2) {
			redirect(base_url('logout'));
		}

		$this->table = "berkas";
	}

	function index($pengajuan_id) {
		$data['nav'] = "dpm/detail_pengajuan/nav";
		$data['isi'] = "dpm/detail_pengajuan/index";
		$data['data']['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $pengajuan_id])->row();
		
		$this->load->view("template/template", $data);
	}

	function hapus($id, $standar) {
		$berkas = $this->db->get_where('berkas', ['id' => $id])->row();

		$this->db->delete('berkas', ['id' => $id]);
		unlink('uploads/' . $id);

		redirect(base_url('dpm/detail_pengajuan/index/' . $berkas->pengajuan_id . '?tab=' . $standar));
	}

	function upload() {
		$pengajuan = $this->db->get_where('pengajuan', ['id' => $this->input->post('pengajuan_id')])->row();
		
		foreach ($this->db->get_where('v_listdokumen', ['tipeversi_id' => $pengajuan->tipeversi_id])->result() as $item) {
			if ($_FILES['dokumen']['size'][$item->id] != 0){

				$berkas['pengajuan_id'] = $pengajuan->id;
				$berkas['listdokumen_id'] = $item->id;
				
				$berkas_lama = $this->db->get_where('berkas', $berkas)->row();
				if ($berkas_lama != null) {
					$this->db->delete('berkas', ['id' => $berkas_lama->id]);
					unlink('uploads/' . $berkas_lama->id);
				}

				$berkas['nama'] = $_FILES['dokumen']['name'][$item->id];

				$this->db->insert('berkas', $berkas);

				move_uploaded_file($_FILES['dokumen']['tmp_name'][$item->id], 'uploads/' . $this->db->insert_id());
			}
		}

		redirect(base_url('dpm/detail_pengajuan/index/' . $pengajuan->id . "?tab=" . $this->input->post('last_tab')));
	}

	function unduh($dokumen_id) {
		$this->_push_file('uploads/' . $dokumen_id, $this->db->get_where('berkas', ['id' => $dokumen_id])->row()->nama);
	}

	function unduh_semua($pengajuan_id) {
		$zip = new ZipArchive();

		$filename = "temps/" . $this->session->id;

		unlink($filename);

		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
		    exit("cannot open <$filename>\n");
		}

		$pengajuan = $this->db->get_where('pengajuan', ['id' => $pengajuan_id])->row();
		
		$tipeversi = $this->db->get_where('tipeversi', ['id' => $pengajuan->tipeversi_id])->row();

		$versi = $this->db->get_where('versi', ['id' => $tipeversi->versi_id])->row();
		
		$unit = $this->db->get_where('unit', ['id' => $pengajuan->unit_id])->row();
		// $nama_unit = $unit->unit == 1 ? "Universitas" : "Prodi";
		if ($unit->unit == 1) {
			$nama_unit = "Universitas";
		} elseif ($unit->unit == 2) {
			$nama_unit = "Prodi " . $this->db->get_where('prodi', ['id' => $unit->prodi_id])->row()->nama;
		} else {
			redirect(base_url('logout'));
		}

		$berkas = $this->db->get_where('berkas', ['pengajuan_id' => $pengajuan_id])->result();
		
		foreach ($this->db->get_where('standar', ['tipeversi_id' => $pengajuan->tipeversi_id])->result() as $item) {

			$id_standar = 0; $id_substandar = 0; $id_butir = 0;
			foreach ($this->db->get_where('v_listdokumen', ['standar_id' => $item->id])->result() as $item2) {
		        $standar = $id_standar == $item2->standar_id ? null : $item2->nomor_standar . ' ' . $item2->nama_standar;

		        $substandar = $id_substandar == $item2->substandar_id ? null : $item2->nomor_substandar . ' ' . $item2->nama_substandar;

		        $butir = $id_butir == $item2->butir_id ? null : $item2->nomor_butir . ' ' . $item2->nama_butir;

		        $berkas = $this->db->get_where('berkas', ['pengajuan_id' => $pengajuan->id, 'listdokumen_id' => $item2->id])->row();

		        if ($berkas != null) {
		        	$zip->addFile("uploads/" . $berkas->id, $standar . '/' . $substandar . '/' . $butir . '/' . $item2->keterangan . ' - ' . $berkas->nama);
		        }
		    }

		}

		$zip->close();

		$this->_push_file($filename, "Borang " . $versi->nama . ' ' . $versi->tahun . ' ' . $tipeversi->tipe . ' ' . $nama_unit . ' ' . $pengajuan->tahun_borang . ' ' . $this->pustaka->tanggal_indo($pengajuan->tanggal_pengajuan) . '.zip');

	}

	private function _push_file($path, $name)
	{
	  // make sure it's a file before doing anything!
	  if(is_file($path))
	  {
	    // required for IE
	    if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

	    // get the file mime type using the file extension
	    $this->load->helper('file');

	    $mime = get_mime_by_extension($path);

	    // Build the headers to push out the file properly.
	    header('Pragma: public');     // required
	    header('Expires: 0');         // no cache
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
	    header('Cache-Control: private',false);
	    header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
	    header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
	    header('Content-Transfer-Encoding: binary');
	    header('Content-Length: '.filesize($path)); // provide file size
	    header('Connection: close');
	    readfile($path); // push it out
	    exit();
	  }
	}

}
