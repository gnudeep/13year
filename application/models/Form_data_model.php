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
            case "coordinators":
                $res = $this->getAllCoordinators();
                break;
            case "travel_mode":
                $res = $this->getAllRecords('travel_mode');
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

    public function get_recent_id($table){
        $this->db->select('id');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);
        $res  = $query->result_array();

        return $res;
    }
    
    public function getAllCoordinators(){
        $this->db->select('*, c.id AS cID, u.id AS uID, c.coordinator_name, c.coordinator_mobile, c.coordinator_email, u.uname');
        $this->db->from('coordinators c');
        $this->db->join('schools s', 's.census_id = c.school_id');
        $this->db->join('user u', 'u.id = c.user_id', 'left');
        $query = $this->db->get();
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    }
    
    public function getClassStudents($class_id){
        $this->db->select('*, s.id AS std_id');
        $this->db->from('class_students c');
        $this->db->join('students_info s', 'c.student_id = s.id');
        $this->db->join('travel_mode t', 's.travel_mode_id = t.id', 'left');
        $this->db->order_by('s.index_no', 'ASC');
        $this->db->where('c.class_id', $class_id);
        $query = $this->db->get();
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    }
    
    public function getClassAttendance($school_id, $class_id){
        $checkQ = $this->db->query('SELECT * FROM p1_attendance');
        
        if($checkQ->num_rows() >= 1){

            $this->db->select('p.month, s.index_no, s.in_name, p.attended_days');
            $this->db->from('p1_attendance p');
            $this->db->join('students_info s', 'p.student_id = s.id');
            $this->db->where('p.school_id', $school_id);
            $this->db->where('p.class_id', $class_id);
            $this->db->order_by('p.month', 'ASC');
            $query = $this->db->get();
        
            $sql1 = "SET @SQL = NULL ";
            $this->db->query($sql1);
            
            $sql2 = "SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT CONCAT( 'SUM(CASE WHEN p.month = ''', mn ,''' THEN p.attended_days ELSE 0 END) AS `', mn, '`' )),',', 5) INTO @SQL FROM (SELECT p.month AS mn FROM p1_attendance p ORDER BY p.month)d";
            $this->db->query($sql2);
            
            $sql3 = "SET @SQL = CONCAT('SELECT s.index_no AS `Index No`, s.in_name AS Name, ', @SQL, 'FROM p1_attendance p INNER JOIN students_info s ON p.student_id = s.id WHERE p.school_id = ". $school_id . " and p.class_id = " . $class_id ." GROUP BY s.index_no, s.in_name;')";
            $this->db->query($sql3);
            
            $sql4 = "PREPARE stmt FROM @SQL;";
            $this->db->query($sql4);
    
            $sql5 = "EXECUTE stmt;";
            
            $query = $this->db->query($sql5);

            $res = $query->result_array();
    
            if($query->num_rows() >= 1){
                return $res;
            }
        }
        
    }
    
    /* public function getClassAttendance($school_id, $class_id){
        $this->db->select('p.month, s.index_no, s.in_name, p.attended_days');
        $this->db->from('p1_attendance p');
        $this->db->join('students_info s', 'p.student_id = s.id');
        $this->db->where('p.school_id', $school_id);
        $this->db->where('p.class_id', $class_id);
        $this->db->order_by('p.month', 'ASC');
        $query = $this->db->get();
        
        $sql1 = "SET @SQL := NULL ";
        $this->db->query($sql1);
        
        $sql2 = "SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT CONCAT( 'SUM(CASE WHEN p.month = ''', mn ,''' THEN p.attended_days ELSE 0 END) AS `', mn, '`' )),',', 5) INTO @SQL FROM (SELECT p.month AS mn FROM p1_attendance p ORDER BY p.month)d";
        $this->db->query($sql2);
        
        $sql3 = "SET @SQL := CONCAT('SELECT s.index_no AS `Index No`, s.in_name AS Name, ', @SQL, 'FROM p1_attendance p INNER JOIN students_info s ON p.student_id = s.id GROUP BY s.index_no, s.in_name;')";
        $this->db->query($sql3);
        
        $sql4 = "PREPARE stmt FROM @SQL;";
        $this->db->query($sql4);

        $sql5 = "EXECUTE stmt;";
        $this->db->query($sql5);
        
        $sql6 = "DEALLOCATE PREPARE stmt;";
        $query = $this->db->query($sql6);
        
        $res = $query->result_array();

        if($query->num_rows() >= 1){
            return $res;
        }
    } */

    public function insert($table, $schoolArray){
        $this->db->insert($table, $schoolArray);

        if($this->db->affected_rows() > 0){
            return '1';
        }
    }

    public function update($table, $search_field, $search_key, $update_array){
        
        $this->db->where($search_field, $search_key);
        $this->db->update($table, $update_array);
        
        if($this->db->affected_rows()){
            return '1';
        }
    }
    
    public function addCoordinator($coordinator, $user){
        $res=0;
        $this->db->trans_start();

        $this->db->insert('coordinators', $coordinator);
        $this->db->insert('user', $user);

        if ($this->db->trans_status() === TRUE){
            $res = 1;
            $this->db->trans_complete();
        } else {
            $err_message = $this->db->error();
            log_message('error', $err_message);
            $this->db->trans_complete();
        }

        return $res;
    }
    
    public function updateCoordinator($coordinator, $user, $cID, $uID){
        $res=0;
        $this->db->trans_start();

        $this->db->insert('coordinators', $coordinator);
        $this->db->insert('user', $user);

        if ($this->db->trans_status() === TRUE){
            $res = 1;
            $this->db->trans_complete();
        } else {
            $err_message = $this->db->error();
            log_message('error', $err_message);
            $this->db->trans_complete();
        }

        return $res;
    }
    
    public function addAttendance($table, $data){
        $this->db->insert_batch($table, $data);
        
        if($this->db->affected_rows()){
            return '1';
        }
    }

    public function addStudent($std_info, $class){
        $res=0;
        $this->db->trans_start();

        $this->db->insert('students_info', $std_info);
        $this->db->insert('class_students', $class);

        if ($this->db->trans_status() === TRUE){
            $res = 1;
            $this->db->trans_complete();
        } else {
            $err_message = $this->db->error();
            log_message('error', $err_message);
            $this->db->trans_complete();
        }

        return $res;
    }

    public function deleteStudent( $std_id ) {
        $res=0;
        $tables = array('p1_attendance', 'class_students', 'student_marks', 'student_subjects');
        $this->db->trans_start();

        $this->db->where('student_id', $std_id)->delete($tables);
        $this->db->where('id', $std_id)->delete('students_info')->reset_data(true);


        if ($this->db->trans_status() === TRUE){
            $res = 1;
            $this->db->trans_complete();
        } else {
            $err_message = $this->db->error();
            log_message('error', $err_message);
            $res = $err_message;
            $this->db->trans_complete();
        }

        return $res;
    }

    public function getLastQuery(){
        return $this->db->last_query();
    }
}
