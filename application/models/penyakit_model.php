<?php

Class penyakit_model extends CI_Model {

     function __construct()
     {
         parent::__construct();
     }


     function mapp_field($field=""){
         if (is_object($field)==false){
             $_result["id"]="";
             $_result["kode"]="";
             $_result["nama"]="";
             $_result["keterangan"]="";
         }
         else{
            $_result["id"]=$field->id;
            $_result["kode"]=$field->kode;
            $_result["nama"]=$field->nama;
            $_result["keterangan"]=$field->keterangan;
         }
         return $_result;

     }

     function get_all($status=''){
         $this->db->select('*')->from('penyakit');
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
         $this->db->select('*')->from('penyakit');
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
         $this->db->select('*')->from('penyakit');
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
         $this->db->select('*')->from('penyakit');
         $this->db->where($param_name,$value);
         $query = $this->db->get();

         $record["data"] = $this->db->get();
         $record["data_arr"] = $record["data"]->result();
         $record["count"] = count($record["data"]->result());
         return $record;
     }

     function get_search($start, $rows, $search){
         $sql = "select * from penyakit where id like '%".$search."%' order by id asc limit ".$start.",".$rows;
         return $this->db->query($sql);
     }
     function get_search_count($search){
         $sql = "select count(*) as hasil from penyakit where id like '%".$search."%' order by id asc";
         return $this->db->query($sql);
     }

     function save($data){
         $this->db->insert('penyakit',$data);
     }

     function update($data,$id){
         $this->db->where('id',$id);
         $this->db->update('penyakit',$data);
     }

     function delete($id){
         $this->db->where('id',$id);
         $this->db->delete('penyakit');
     }

	 function get_list_data(){
        $this->db->select('*');
        $this->db->from('penyakit');
        return $this->db->get();
    }
}
?>
