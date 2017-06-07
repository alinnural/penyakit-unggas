<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session'));
		$this->load->model(array('gejala_penyakit_model','gejala_model','penyakit_model'));
	}
	
	
	public function index()
	{
		$data["title"] = "";
		$data["sub_title"] = "";
		$rows = $this->gejala_model->get_all();
		$data["row"] = $rows['data_arr'];
		$this->load->view("beranda/index", $data);
	}
}
