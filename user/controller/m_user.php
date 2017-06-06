<?php
/*
******************************************************************************
Controller Name : M_user
Date Created    : 10-Oct-2016
Email           : danu@trendsolusi.com
******************************************************************************
*/
Class M_user extends CI_Controller {

     function __construct()
     {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->library(array('session','form_validation'));
         $this->load->model(array('m_user_model','t_personalia_model'));
          $this->load->model(array('m_user_model','t_personalia_id_model'));
     }
     
     
     
     	public function search()
	{
		$keyword = $this->uri->segment(4);
		//$id_per =  $this->uri->segment(3);
		
		$data = $this->db->from('t_personalia')->where("nama_lengkap like '%".$keyword."%' or nik like '%".$keyword."%'")->get();	     
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nik .'-'.$row->nama_lengkap,
				'id'=>$row->id
				);
		}        
		echo json_encode($arr);	        
	}


     function index()
     {
         $data["title"] = "Master Data";
         $data["sub_title"] = "Pengaturan User";
         $rows = $this->m_user_model->get_all();
         $data["row"] = $rows['data_arr'];
         $this->template->display('master/m_user_view', $data);
     }


     function add()
     {
         $data['row'] = $this->m_user_model->get_by_id('');
         $data['post'] = 'save';
		 $data['prof_perusahaan_query'] = $this->t_personalia_model->option_prof_perusahaan();
         $data['personal_name_query'] = $this->t_personalia_id_model->get_all_nama();
         $this->load->view('master/m_user_form',$data);
     }

     function save()
     {
         $this->form_validation->set_rules('user_name', 'user_name','required|strip_tags');
         $this->form_validation->set_rules('password', 'password','required|strip_tags');
    
         $this->form_validation->set_rules('m_profile_perusahaan', 'm_profile_perusahaan','required|strip_tags');

          if($this->form_validation->run() == TRUE){
                  $t_personalia_id=$this->input->post("t_personalia_id");
                  $user_name=$this->input->post("user_name");
                  $password=$this->input->post("password");
                  $m_profile_perusahaan=$this->input->post("m_profile_perusahaan");
                  $data = array(
                     'user_name'=>$user_name,
                     't_personalia_id'=>$t_personalia_id, 
                     'password'=>md5($password),
                     'm_profile_perusahaan'=>$m_profile_perusahaan,
                      't_personalia_id'=>$t_personalia_id 
                  );
                $this->m_user_model->save($data);

                $msg_status['status'] = 1;
                $msg_status['error'] = 0;
          }
          else{
                $msg_status['status'] = 0;
                $msg_status['error'] = validation_errors();
          }
          echo json_encode($msg_status);

     }
     function edit()
     {
         $id = $this->input->post('id');
		 $data['prof_perusahaan_query'] = $this->t_personalia_model->option_prof_perusahaan();
         $data['row'] = $this->m_user_model->get_by_id($id);
         $data['post'] = 'update';
         $this->load->view('master/m_user_form',$data);
     }

     function update()
     {
         $this->form_validation->set_rules('user_name', 'user_name','required|strip_tags');
         $this->form_validation->set_rules('password', 'password','required|strip_tags');
         
         $this->form_validation->set_rules('m_profile_perusahaan', 'm_profile_perusahaan','required|strip_tags');

         if($this->form_validation->run() == TRUE){
                  $id=$this->input->post("id");
                  $t_personalia_id=$this->input->post("t_personalia_id");
                  $user_name=$this->input->post("user_name");
                  $password=$this->input->post("password");
                  $nama_lengkap=$this->input->post("nama_lengkap");
                  $m_profile_perusahaan=$this->input->post("m_profile_perusahaan");
                    $old_password_db = $this->session->userdata('m_password');
                   
                     

                      
                        
                              
                            $data = array(
                                'user_name'=>$user_name,
                                't_personalia_id'=>$t_personalia_id, 
                                'password'=>md5($password),
                                
                                'm_profile_perusahaan'=>$m_profile_perusahaan
                            );
                        
                           
                       
                  $this->m_user_model->update($data,$id);
                  $msg_status['status'] = 1;
                  $msg_status['error'] = 0;
         }
         else{
                  $msg_status['status'] = 0;
                  $msg_status['error'] = validation_errors();
         }
         echo json_encode($msg_status);
     }

     function delete()
     {
         $id = $this->input->post('id');
         $this->m_user_model->delete($id);
         $msg_status['status'] = 1;
         $msg_status['error'] = 0;
         echo json_encode($msg_status);
     }

    function get_list(){
		// variable initialization
		$search = "";
		$start = 0;
		$rows = 10;

		// get search value (if any)
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$search = $_GET['sSearch'];
		}

		// limit
		$start = $this->get_start();
		$rows = $this->get_rows();

		// run query to get m_user listing
		$query = $this->m_user_model->get_search($start, $rows, $search);
		$iFilteredTotal = $query->num_rows();

		$iTotal=$this->m_user_model->get_search_count($search)->row()->hasil;

		$output = array(
			"sEcho" => intval($_GET['sEcho']),
	        "iTotalRecords" => $iTotal,
	        "iTotalDisplayRecords" => $iTotal,
	        "aaData" => array()
	    );

	    // get result after running query and put it in array
		$i=$start;
		$rows = $query->result();
	    foreach ($rows as $temp) {	
			$record = array();

			$record[] = $temp->user_name;
			$record[] = $temp->nama_lengkap;
			$record[] = $temp->m_profile_perusahaan;
			$record[] = "<a href=\"#\" class=\"text-yellow\" onclick=\"javascript:window_edit('".$temp->id."');\">Edit</a>&nbsp;|&nbsp;
                         <a href=\"#\"class=\"text-yellow\" onclick=\"javascript:delete_m_user('".$temp->id."');\">Delete</a>";
			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
		echo json_encode($output);
	}

	function get_start() {
		$start = 0;
		if (isset($_GET['iDisplayStart'])) {
			$start = intval($_GET['iDisplayStart']);

			if ($start < 0)
				$start = 0;
		}

		return $start;
	}

	function get_rows() {
		$rows = 10;
		if (isset($_GET['iDisplayLength'])) {
			$rows = intval($_GET['iDisplayLength']);
			if ($rows < 5 || $rows > 500) {
				$rows = 10;
			}
		}

		return $rows;
	}


}
?>
