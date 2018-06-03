<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	var $table;

	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1]);

		$this->table = "user";
	}

	function index() {
		$data['nav'] = "user/nav";
		$data['isi'] = "user/index";
		$data['data']['user'] = $this->db->get($this->table)->result();
		
		$this->load->view("template/template", $data);
	}

	function ajax_unit() {
		foreach ($this->db->get('fakultas')->result() as $item) {
			?>
			<optgroup label="<?php echo $item->nama; ?>">
				<?php
				foreach ($this->db->get_where('prodi', ['fakultas_id' => $item->id])->result() as $item2) {
				 	?>
				 	<option value="<?php echo $item2->id; ?>"><?php echo $item2->nama; ?></option>
				 	<?php
				 }
				?>
			</optgroup>
			<?php
		}
	}

	function tambah() {
		$data['nav'] = "user/nav";
		$data['isi'] = "user/formtambah";
		$data['aksi'] = "tambah";

		$this->load->view("template/template", $data);
	}

	function ubah($id) {
		$data['nav'] = "user/nav";
		$data['isi'] = "user/formubah";
		$data['aksi'] = "ubah";
		$data['data']['user'] = $this->db->get_where($this->table, ['id' => $id])->row();

		$this->load->view("template/template", $data);
	}

	function ganti_password() {
		foreach ($this->input->post('data') as $key => $value) {
			if ($key == "password") {
				$data[$key] = hash("sha512", $value);
			} else {
				$data[$key] = $value;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);
		
		redirect(base_url('user'));
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				case 'password':
					$data[$key] = hash('sha512', $value);
					break;
				
				default:
					$data[$key] = $value;
					break;
			}
		}

		$this->db->insert($this->table, $data);

		redirect(base_url('user'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$this->db->update($this->table, $data, $where);

		redirect(base_url('user'));
	}

	function aksi_hapus($id) {
		$this->db->delete($this->table, ['id' => $id]);

		redirect(base_url('user'));
	}

}
