<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlibrary{
	
	var $CI = NULL;
	
	function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->library("session");
    }
    
    /**
     * @author Achmad
	 * Checking Login
     */
    function authCheck(){
    	if($this->CI->session->userdata('LOGGED_IN') != TRUE){
    		$this->CI->session->set_flashdata('error', 'Silakan login terlebih dahulu');
    		redirect('login');
    	}
    }
}