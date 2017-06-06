<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Root extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date'));
		$this->load->library(array('session'));

	}
	
	
	public function index()
	{
		
	}

	function verify(){
		$records = false;
		$username = $this->input->post('username');
		$password = $this->input->post("password");
		//echo $username;
		//echo $password;
		//exit;
        $data['msg'] = "";
		if ($username != '' && $password != '')
		{
			
			
				
				redirect('/biodata/index', 'refresh');
			
		}
		else {
			 	$data['username'] = $username;
			 	$data['password'] = $password;
			 	$data['msg'] = "Please enter Username and Password";
			 	$this->load->view('login/login',$data);
		}
	}

	function forgotpassword()
	{
		$this->session->sess_destroy();
		$data['msg'] = "";
		$this->load->view('login/forgotpassword',$data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		$data['msg'] = "";
		$this->load->view('login/login',$data);
	}
    
    function  changepassword(){
        $old_password_view = $this->input->post('old_password');
		$password = $this->input->post("password");
        $retype_password = $this->input->post("retype_password");
        $old_password_db = $this->session->userdata('m_password');    
        $username = $this->session->userdata('m_user_name');
	
            if($retype_password != $password){
             
                $data['msg'] = "Password in correct";
			  	$data['password'] = $password;
                $data['num_results'] = $this->t_personalia_model->total_karyawan();
				$data['pria_num_results'] = $this->t_personalia_model->total_karyawan_pria();
				$data['wanita_num_results'] = $this->t_personalia_model->total_karyawan_wanita();
				$data['karyawan_kontrak_num_results'] = $this->t_personalia_model->total_karyawan_kontrak();
				$data['karyawan_tetap_num_results'] = $this->t_personalia_model->total_karyawan_tetap();
				$data['karyawan_harian_num_results'] = $this->t_personalia_model->total_karyawan_harian();
				$data['karyawan_borongan_num_results'] = $this->t_personalia_model->total_karyawan_borongan();
				$data['num_rows_turn_over_karyawan'] = $this->t_personalia_model->turn_over_karyawan();

				$data['habis_kontrak'] = $this->t_personalia_model->get_all_habis_kontrak();
				$data['karyawan_resign'] = $this->t_personalia_model->get_all_karyawan_resign();
				$data['karyawan_ultah'] = $this->t_personalia_model->get_all_karyawan_ultah();

			 	$this->load->view('home/home',$data);
            }            
			
		
			else {                
                   if(md5($old_password_view) != $old_password_db){                        
                        $data['msg'] = "Password in correct";
                        $data['password'] = $password;
				
                        $data['num_results'] = $this->t_personalia_model->total_karyawan();
                        $data['pria_num_results'] = $this->t_personalia_model->total_karyawan_pria();
                        $data['wanita_num_results'] = $this->t_personalia_model->total_karyawan_wanita();
                        $data['karyawan_kontrak_num_results'] = $this->t_personalia_model->total_karyawan_kontrak();
                        $data['karyawan_tetap_num_results'] = $this->t_personalia_model->total_karyawan_tetap();
                        $data['karyawan_harian_num_results'] = $this->t_personalia_model->total_karyawan_harian();
                        $data['karyawan_borongan_num_results'] = $this->t_personalia_model->total_karyawan_borongan();
                        $data['num_rows_turn_over_karyawan'] = $this->t_personalia_model->turn_over_karyawan();

                        $data['habis_kontrak'] = $this->t_personalia_model->get_all_habis_kontrak();
                        $data['karyawan_resign'] = $this->t_personalia_model->get_all_karyawan_resign();
                        $data['karyawan_ultah'] = $this->t_personalia_model->get_all_karyawan_ultah();

                        $this->load->view('home/home',$data);                                                  
                       }                       
                   else {                       
                        $this->t_personalia_model->change_password($username,md5($password));                     
			            $data['msg'] = "Password has updated, Please Login with new password";
                        $this->load->view('login/login',$data);                       
                   }                  
            
            }
        
    }
   

}
