<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Notes_model extends CI_Model{


     public function getSubjects($sub_branch_id, $sub_year_or_sem_id){
        $idArrays = array(
            "branch_id" => $sub_branch_id,
            "sem_year_id" => $sub_year_or_sem_id,
            "status" => 1,
        );

        $this->db->select("subjects_details.*, subjects.sub_name as sub_name, subjects.subject_code as subject_code");
        $this->db->where($idArrays);
        $this->db->join("subjects","subjects.id=subjects_details.subject_id","left");
        $res = $this->db->get("subjects_details");
       
        if($res->num_rows()>0){
            return $res->result_array();
        }else{
            return null;
        }
      
    }

    public function searchNotes($val){
        $this->db->like("sub_name", $val);
        $this->db->or_like("subject_code", $val);
        $res = $this->db->get("subjects");
        if($res->num_rows()>0){
            return $res->result_array();
        }else{
            return "";
        }
    }

    public function getSyllabus($id){
        $newArray= array(
            "subject_id" => $id,
            "status" => 1,
        );
        $this->db->select("syllabus.*, units.units as units");
        $this->db->where($newArray);
        $this->db->join("units", "units.id=syllabus.unit_id");
        $res = $this->db->get("syllabus");
        if($res->num_rows()>0){
            return $res->result_array();
        }else{
            return "";
        }
    }

    public function getNotes($id, $syll_id){
       
        $this->db->select("notes.*, syllabus.syllabus_detail as syllabus_detail, syllabus.name as name, units.units as units");
        $this->db->where("notes.subject_id", $id, "notes.syllabus_id", $syll_id, "notes.status", 1);
        $this->db->join("syllabus","syllabus.id=notes.syllabus_id","left");
        $this->db->join("units", "units.id=syllabus.unit_id","left");
        $res = $this->db->get("notes");
        
        return $res->result_array();
       
    }

}

?>