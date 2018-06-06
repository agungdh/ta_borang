<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->pustaka->auth($this->session->level, [1]);
	}

	function index() {
		foreach ($this->db->get_where('standar', ['versi_id' => 1])->result() as $item) {
			var_dump($item);
		}
	}

}