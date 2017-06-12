<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: syahrilhermana
 * Date: 6/8/17
 * Time: 10:58
 */
class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('login_model','login_model'));
        $this->load->library("UserLibrary");
    }

    function index()
    {
        if($this->session->userdata('LOGGED_IN') == true) redirect('gejala');

        $data["view"]="login/login";
        $this->load->view("beranda/index", $data);
    }

    function submit(){
        if($this->input->post('username') != '' && $this->input->post('password') != ''){
            $obj = $this->login_model->getData($this->input->post('username'), $this->input->post('password'));
            if($obj->num_rows() > 0){

                $obj = $obj->row();
                $sessionData = array(
                    'ID_USER'		    => $obj->id,
                    'USERNAME'			=> $obj->username,
                    'NAMA'		    	=> $obj->nama,
                    'LOGGED_IN' 		=> TRUE
                );
                $this->session->set_userdata($sessionData);

                $this->session->set_flashdata('success', "Login Berhasil");
                redirect('gejala');
            }
        }

        $this->session->set_flashdata('error', "Username dan Password salah.");
        redirect('login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}