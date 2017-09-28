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
                $res = $this->getAllRecords('school');
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
}