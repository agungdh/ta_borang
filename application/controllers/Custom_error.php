<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_error extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		redirect(base_url());
	}

	function e404() {
		$this->twig->display('error/e404.twig');
	}

}