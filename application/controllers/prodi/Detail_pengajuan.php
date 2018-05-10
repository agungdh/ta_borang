<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pengajuan extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url('logout'));
		}

		if ($this->session->level != 3) {
			redirect(base_url('logout'));
		}

		$this->table = "berkas";
	}

	function index($pengajuan_id) {
		$data['nav'] = "prodi/detail_pengajuan/nav";
		$data['isi'] = "prodi/detail_pengajuan/index";
		$data['data']['pengajuan'] = $this->db->get_where('pengajuan', ['id' => $pengajuan_id])->row();
		
		$this->load->view("template/template", $data);
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

		redirect(base_url('prodi/detail_pengajuan/index/' . $pengajuan->id . "?tab=" . $this->input->post('last_tab')));
	}

	function unduh($dokumen_id) {
		$this->_push_file('uploads/' . $dokumen_id, $this->db->get_where('berkas', ['id' => $dokumen_id])->row()->nama);
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
