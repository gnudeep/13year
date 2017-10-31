<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 12:42 PM
 */

class Report_data_model extends CI_Model
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

    public function getSchoolTeachers($school_id, $r_type){
        $this->db->select('title AS Title, teacher_in_name AS Name With Initials, s1.subject_name AS Subject 01, s2.subject_name AS Subject 02, s3.subject_name AS Subject 03');
        $this->db->join('subject_list s1', 's1.id = t.teacher_sub_1', 'left');
        $this->db->join('subject_list s2', 's2.id = t.teacher_sub_2', 'left');
        $this->db->join('subject_list s3', 's3.id = t.teacher_sub_3', 'left');
        $this->db->where('school_id', $school_id);
        $query = $this->db->get('teachers t');

        if($r_type == 'list'){
            return $query->result_array();
        }else if($r_type == 'count'){
            return $query->num_rows();
        }
    }
    
    public function getSchoolClasses($school_id, $r_type){
        $this->db->select('grade AS Grade, class_name AS Class Name, commenced_date AS Commenced Date, t.teacher_in_name AS Teacher');
        $this->db->join('teachers t', 't.id = c.class_teacher', 'left');
        $this->db->where('c.school_id', $school_id);
        $query = $this->db->get('classes c');

        if($r_type == 'list'){
            return $query->result_array();
        }else if($r_type == 'count'){
            return $query->num_rows();
        }
    }
    
    public function getSchoolStudents($school_id, $r_type){
        $this->db->select('index_no AS Index No, nic AS NIC, in_name AS Name With Initials, gender AS Gender');
        $this->db->where('school_id', $school_id);
        $query = $this->db->get('students_info');

        if($r_type == 'list'){
            return $query->result_array();
        }else if($r_type == 'count'){
            return $query->num_rows();
        }
    }
}