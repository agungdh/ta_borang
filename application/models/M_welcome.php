<?php
class M_welcome extends CI_Model{	 
    var $tabel;

    public function __construct()
    {
        parent::__construct();
        $this->tabel = 'mahasiswa';
    }

    function ambil() {
        return $this->db->get($this->tabel)->result();
    }

    function tambah($data) {
        $this->db->insert($this->tabel, $data);
        return $this->db->insert_id();
    }

    function ambil_where($where) {
        return $this->db->get_where($this->tabel, $where)->row();
    }

    function ubah($data, $where) {
        $this->db->update($this->tabel, $data, $where);
    }

    function hapus($where) {
        $this->db->delete($this->tabel, $where);
    }
 
}