<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mapel_model');
		$this->load->model("User_model");
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
	}
	
	public function index()
	{
		$this->load->view('home');
	}
}
