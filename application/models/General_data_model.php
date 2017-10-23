<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 12:42 PM
 */

class General_data_model extends CI_Model
{
    public function getSchools(){
        $this->db->select('*');
        $this->db->from('schools');
        $this->db->join('province', 'province.id = schools.province_id', 'left');
        $this->db->join('zone', 'zone.id = schools.zone_id', 'left');
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            $res  = $query->result_array();
            return $res;
        } else{
            return 0;
        }
    }
    
    public function getFundsBalance($school_id){
        $this->db->select('amount');
        $this->db->where('school_id', $school_id);
        $query1 = $this->db->get('funds');
        
        $totalFunds = 0;

        foreach ($query1->result() as $row){
            $totalFunds += $row->amount;
        }

        $this->db->select('amount');
        $this->db->where('school_id', $school_id);
        $query2 = $this->db->get('expenses');

        $totalExpenses = 0;

        foreach ($query2->result() as $row){
            $totalExpenses += $row->amount;
        }
        
        $balance = $totalFunds - $totalExpenses;
        return $balance;
    }
    
    public function getTotalStudents($school_id){
        $res = ['male' => 0, 'female' => 0];
        $status_active = array('Phase 1', 'Phase 2', 'Phase 3');
        
        $this->db->select('id, gender, status');
        $this->db->where('school_id', $school_id);
        $this->db->where_in('status', $status_active);
        $query = $this->db->get('students_info');
        $res['total'] = $query->num_rows();
        
        foreach ($query->result() as $row){
            if ($row->gender == 'Male'){
                $res['male'] ++;
            } else {
                $res['female'] ++;
            }
        }
        
        return $res;
    }
}