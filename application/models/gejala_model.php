<?php

Class gejala_model extends CI_Model {

     function __construct()
     {
         parent::__construct();
     }


     function mapp_field($field=""){
         if (is_object($field)==false){
             $_result["id"]="";
             $_result["kode"]="";
             $_result["keterangan"]="";
         }
         else{
            $_result["id"]=$field->id;
            $_result["kode"]=$field->kode;
            $_result["keterangan"]=$field->keterangan;
         }
         return $_result;

     }

     function get_all($status=''){
         $this->db->select('*')->from('gejala');
         if ($status=='y'){
             $this->db->where('status','y');	
         }
         $this->db->order_by('id','desc');

         $record["data"] = $this->db->get();
         $record["data_arr"] = $record["data"]->result();
         $record["count"] = count($record["data"]->result());

         return $record;
     }

     function get_by_id($id){
         $this->db->select('*')->from('gejala');
         $this->db->where("id",$id);
         $query = $this->db->get();
         $result = $query->result();

         if (count($result) > 0){
         	$records = $this->mapp_field($result[0]);
         }
         else{
         	$records = $this->mapp_field($result);
         }

         return $records;
     }

     function get_last_record(){
         $this->db->select('*')->from('gejala');
         $this->db->order_by("id", "desc");
         $this->db->limit(1);
         $query = $this->db->get();
         $result = $query->result();

         if (count($result) > 0){
         	$records = $this->mapp_field($result[0]);
         }
         else{
         	$records = $this->mapp_field($result);
         }

         return $records;
     }

     function get_by_param($param_name,$value){
         $this->db->select('*')->from('gejala');
         $this->db->where($param_name,$value);
         $query = $this->db->get();

         $record["data"] = $this->db->get();
         $record["data_arr"] = $record["data"]->result();
         $record["count"] = count($record["data"]->result());
         return $record;
     }

     function get_search($start, $rows, $search){
         $sql = "select * from gejala where id like '%".$search."%' order by id asc limit ".$start.",".$rows;
         return $this->db->query($sql);
     }
     function get_search_count($search){
         $sql = "select count(*) as hasil from gejala where id like '%".$search."%' order by id asc";
         return $this->db->query($sql);
     }

     function save($data){
         $this->db->insert('gejala',$data);
     }

     function update($data,$id){
         $this->db->where('id',$id);
         $this->db->update('gejala',$data);
     }

     function delete($id){
         $this->db->where('id',$id);
         $this->db->delete('gejala');
     }

	 function get_list_data(){
        $this->db->select('*');
        $this->db->from('gejala');
        return $this->db->get();
    }
	 
}
?>
