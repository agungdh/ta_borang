<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Welcome extends REST_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_welcome');
    }

    function index_get($id = null)
    {
        if ($id != null) {
            $mahasiswa = $this->m_welcome->ambil_where(['id' => $id]);

            if ($mahasiswa != null) {
                $this->response($mahasiswa, REST_Controller::HTTP_OK);
            } else {
                $response['pesan'] = "Mahasiswa Tidak Ada !!!";
                $this->response($response, REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $mahasiswa = $this->m_welcome->ambil();

            $this->response($mahasiswa, REST_Controller::HTTP_OK);
        }
    }

    function index_post()
    {
        $data['npm'] = $this->post('npm');
        $data['nama'] = $this->post('nama');

        if ($this->m_welcome->ambil_where(['npm' => $data['npm']]) == null) {
            $this->m_welcome->tambah($data);

            $this->response(null, REST_Controller::HTTP_CREATED);
        } else {
            $this->response(null, REST_Controller::HTTP_CONFLICT);
        }
    }

    function index_put($id = null)
    {
        if ($id != null) {
            $mahasiswa = $this->m_welcome->ambil_where(['id' => $id]);

            if ($mahasiswa != null) {
                $data['npm'] = $this->put('npm');
                $data['nama'] = $this->put('nama');

                $where['id'] = $id;

                if ($data['npm'] != $mahasiswa->npm) {
                    if ($this->m_welcome->ambil_where(['npm' => $data['npm']]) != null) {
                        $this->response(null, REST_Controller::HTTP_CONFLICT);                        
                    } else {
                        $this->m_welcome->ubah($data, $where);

                        $this->response(null, REST_Controller::HTTP_NO_CONTENT);   
                    }
                } else {
                    $this->m_welcome->ubah($data, $where);

                    $this->response(null, REST_Controller::HTTP_OK);   
                }
            } else {
                $response['pesan'] = "Mahasiswa Tidak Ada !!!";

                $this->response($response, REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $response['pesan'] = "ID Kosong !!!";

            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function index_delete($id = null)
    {
        if ($id != null) {
            $mahasiswa = $this->m_welcome->ambil_where(['id' => $id]);

            if ($mahasiswa != null) {
                $this->m_welcome->hapus(['id' => $id]);

                $this->response(null, REST_Controller::HTTP_NO_CONTENT);
            } else {
                $response['pesan'] = "Mahasiswa Tidak Ada !!!";

                $this->response($response, REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $response['pesan'] = "ID Kosong !!!";

            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }


}
