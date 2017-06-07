<?php

Class gejala_penyakit_model extends CI_Model {

     function __construct()
     {
         parent::__construct();
     }


     function mapp_field($field=""){
         if (is_object($field)==false){
             $_result["id"]="";
             $_result["gejala_id"]="";
             $_result["kelompok_gejala_id"]="";
             $_result["penyakit_id"]="";
             $_result["md"]="";
             $_result["mb"]="";
         }
         else{
            $_result["id"]=$field->id;
            $_result["gejala_id"]=$field->gejala_id;
            $_result["kelompok_gejala_id"]=$field->kelompok_gejala_id;
            $_result["penyakit_id"]=$field->penyakit_id;
            $_result["md"]=$field->md;
            $_result["mb"]=$field->mb;
         }
         return $_result;

     }

     function get_all($status=''){
         $this->db->select('gp.*, g.kode as kode_gejala, kg.nama as kelompok_gejala, g.keterangan as gejala, p.kode as kode_penyakit, p.keterangan as penyakit')->from('gejala_penyakit as gp');
		 $this->db->join('gejala as g', 'g.id = gp.gejala_id');
		 $this->db->join('kelompok_gejala as kg', 'kg.id = gp.kelompok_gejala_id');
		 $this->db->join('penyakit as p', 'p.id = gp.penyakit_id');
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
         $this->db->select('*')->from('gejala_penyakit');
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
         $this->db->select('gp.*, g.kode as kode_gejala, kg.nama as kelompok_gejala, g.keterangan as gejala, p.kode as kode_penyakit, p.keterangan as penyakit')->from('gejala_penyakit as gp');
		 $this->db->join('gejala as g', 'g.id = gp.gejala_id');
		 $this->db->join('kelompok_gejala as kg', 'kg.id = gp.kelompok_gejala_id');
		 $this->db->join('penyakit as p', 'p.id = gp.penyakit_id');
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
         $this->db->select('gp.*, g.kode as kode_gejala, kg.nama as kelompok_gejala, g.keterangan as gejala, p.kode as kode_penyakit, p.keterangan as penyakit')->from('gejala_penyakit as gp');
		 $this->db->join('gejala as g', 'g.id = gp.gejala_id');
		 $this->db->join('kelompok_gejala as kg', 'kg.id = gp.kelompok_gejala_id');
		 $this->db->join('penyakit as p', 'p.id = gp.penyakit_id');
         $this->db->where($param_name,$value);
         $query = $this->db->get();

         $record["data"] = $this->db->get();
         $record["data_arr"] = $record["data"]->result();
         $record["count"] = count($record["data"]->result());
         return $record;
     }

     function get_search($start, $rows, $search){
         $sql = "SELECT `gp`.*, `g`.`kode` as kode_gejala, `g`.`keterangan` as gejala, kg.nama as kelompok_gejala, `p`.`kode` as kode_penyakit, `p`.`keterangan` as penyakit 
					FROM (`gejala_penyakit` as gp) JOIN `gejala` as g ON `g`.`id` = `gp`.`gejala_id` JOIN `kelompok_gejala` as kg ON `kg`.`id` = `gp`.`kelompok_gejala_id` JOIN `penyakit` as p ON `p`.`id` = `gp`.`penyakit_id` 
					WHERE gp.id like '%".$search."%' order by gp.id asc limit ".$start.",".$rows;
         return $this->db->query($sql);
     }
     function get_search_count($search){
         $sql = "select count(*) as hasil from gejala_penyakit where id like '%".$search."%' order by id asc";
         return $this->db->query($sql);
     }

     function save($data){
         $this->db->insert('gejala_penyakit',$data);
     }

     function update($data,$id){
         $this->db->where('id',$id);
         $this->db->update('gejala_penyakit',$data);
     }

     function delete($id){
         $this->db->where('id',$id);
         $this->db->delete('gejala_penyakit');
     }

}
?>
