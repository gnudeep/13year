<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 12:42 PM
 */

class Form_data_model extends CI_Model
{
    public function select($table){
        switch ($table){
            case "province":
                $res = $this->getAllRecords('province');
                break;
            case "schools":
                $res = $this->getAllRecords('schools');
                break;
            case "subjects":
                $res = $this->getAllRecords('subject_list');
                break;
        }

        return $res;
    }

    public function getAllRecords($table){

        $this->db->select('*');
        $query = $this->db->get($table);

        if ($query->num_rows() >= 1) {
            $res  = $query->result_array();
            return $res;
        } else{
            return 0;
        }
    }

    public function searchdb($table, $search_array){
        $this->db->where($search_array);
        $query = $this->db->get($table);

        if ($query->num_rows() >= 1) {
            $res  = $query->result_array();
            return $res;
        } else{
            return 0;
        }
    }

    public function get_districts($province_id){
        $search_array = array('province_id'=> $province_id);
        $result = $this->searchdb('district', $search_array);

        return $result;
    }

    public function get_zones($district_id){
        $search_array = array('district_id'=> $district_id);
        $result = $this->searchdb('zone', $search_array);

        return $result;
    }

    public function insert($table, $schoolArray){
        $this->db->insert($table, $schoolArray);

        if($this->db->affected_rows()){
            return '1';
        }
    }
    
    public function getTeachersForSubjects($subject, $school){
        $this->db->where('school_id =', $school);
        $this->db->where('teacher_sub_1 =', $subject);
        $this->db->or_where('teacher_sub_2 =', $subject);
        $this->db->or_where('teacher_sub_3 =', $subject);
        $query = $this->db->get("teachers");

        if ($query->num_rows() >= 1) {
            $res  = $query->result_array();
            return $res;
        } else{
            return 0;
        }
    }
    
    public function getClassDetails($school_id, $class_id ){
        $this->db->select('*');
        $this->db->from('class_subjects C');
        $this->db->join('subject_list S', 'S.id = C.subject_id');
        $this->db->join('teachers T', 'T.id = C.teacher_id');
        $this->db->where('C.school_id', $school_id);
        $this->db->where('C.class_id', $class_id);
        $this->db->order_by('C.class_id', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    }
}