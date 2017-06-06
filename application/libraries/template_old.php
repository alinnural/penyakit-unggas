<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Template{
		protected $_ci;
		
		function __construct(){ 
			$this->_ci=&get_instance();
		}
		
		function display($template, $data_content=null){
			$data['title'] = $data_content['title'];
			$data['sub_title'] = $data_content['sub_title'];
			$data['content']=$this->_ci->load->view($template,$data_content,true);
			$data['menu'] = "";
			//$data['menu'] = $this->_ci->users_model->get_menu($this->_ci->access->get_level());
			$this->_ci->load->view('template',$data);
		}
		
		function displayFe($template, $data_content=null, $slide=false){
			
			$data['header'] = $this->_ci->load->view('fe/menu/list',$data_content,true);
			$data['fo_content']=$this->_ci->load->view($template,$data_content,true);
			$data['fo_content_kanan']=$this->_ci->load->view('fe/menu/kanan',$data_content,true);
			$data['footer'] = "SISLOGNAS @2013";
			$data['slide'] = "";$data['content'] = "";
						
			if($slide){
				$data['content'] = $this->_ci->load->view('fe/slide/slider',$data_content,true);
				$data['slide'] = $this->_ci->load->view('fe/slide/script',$data_content,true);
			}
			//$data['menu'] = $this->_ci->users_model->get_menu($this->_ci->access->get_level());
			$this->_ci->load->view('fe/template',$data);
		}
        
	} 
?>