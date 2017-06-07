<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session'));
		$this->load->model(array('gejala_penyakit_model','gejala_model','penyakit_model','kelompok_gejala_model'));
	}
	
	
	public function index()
	{
		$data["title"] = "";
		$data["sub_title"] = "";
		if(!$this->input->post("gejala"))
		{
			$data["view"]="beranda/form";
			$data['listKelompok'] = $this->kelompok_gejala_model->get_list_data(); 
			$this->load->view("beranda/index", $data);
		}
		else
		{
			$data["view"]="beranda/result";
			$gejala = implode(",", $this->input->post("gejala"));
			$data["listGejala"] = $this->gejala_model->get_list_by_id($gejala);
			//hitung
			$listPenyakit = $this->gejala_penyakit_model->get_by_gejala($gejala);
			$penyakit = [];
			$i=0;
			foreach($listPenyakit->result() as $value){
				$listGejala = $this->gejala_penyakit_model->get_gejala_by_penyakit($value->penyakit_id,$gejala);
				$combineCF=0;
				$CFBefore=0;
				$j=0;
				foreach($listGejala->result() as $value2){
					$j++;
					if($j==1)
						$combineCF=$value2->mb;
					else
					$combineCF =$combineCF + ($value2->mb * (1 - $combineCF));
				}
				if($combineCF>=0.5)
				{
					$penyakit[$i]=array('penyakit'=>$value->kode.' - '.$value->keterangan,
										'kepercayaan'=>$combineCF*100);
					$i++;
				}
			}
			
			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($penyakit, "cmp");
			$data["listPenyakit"] = $penyakit;
			$this->load->view("beranda/index", $data);
		}
	}
}
