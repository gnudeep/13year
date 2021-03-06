<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 6/11/17
 * Time: 1:53 PM
 */

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_data_model'); //load database model.
        $this->load->model('Report_data_model'); //load database model.
        $this->load->model('General_data_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none");

    public function index()
    {
        $this->check_sess();
        $this->load->view('head');

        $this->response['schools'] = $this->Report_data_model->getSchools();
        $this->response['subjects'] = $this->Form_data_model->select('subjects');
        $this->response['provinces'] = $this->Form_data_model->select('province');
        $this->response['zones'] = $this->Form_data_model->select('zones');
        $this->getSchoolWithCount();
        
        $this->load->view('report/sidebar', $this->response);
        $this->load->view('report/dashboard', $this->response);
        $this->load->view('footer');
    }

    public function getMap()
    {
        $this->check_sess();
        $this->load->view('head');

        $this->response['schools'] = $this->General_data_model->getSchools();
        
        $this->load->view('report/sidebar-map', $this->response);
        $this->load->view('report/map', $this->response);
        $this->load->view('footer');
    }

    public function check_sess()
    {
        if ($this->session->user_logged != "in") {
            $this->logout(); //Redirect to login page if session not initiated.
        } elseif ($this->session->user_role != '5'){
            $this->logout(); //Redirect to login page if user not authored.
        }
    }

    //Logout function
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
    }

    public function getSchoolData()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $school_id = $this->security->xss_clean($this->input->post('school_id'));
        $this->response['teachers'] = $this->Report_data_model->getSchoolTeachers($school_id, 'count');
        $this->response['classes'] = $this->Report_data_model->getSchoolClasses($school_id, 'count');
        $this->response['students'] = $this->Report_data_model->getSchoolStudents($school_id, 'count', 'all');
        $this->response['funds'] = $this->Report_data_model->getSchoolFunds($school_id, 'total');
        echo json_encode($this->response);
    }
    
    public function getSubjectData()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $subject_id = $this->security->xss_clean($this->input->post('subject_id'));
        $this->response['teachers'] = $this->Report_data_model->getSubjectTeachers($subject_id, 'count');
        $this->response['classes'] = $this->Report_data_model->getSubjectClasses($subject_id, 'count');
        $this->response['students'] = $this->Report_data_model->getSubjectStudents($subject_id, 'count');
        echo json_encode($this->response);
    }
    
    public function getSelectedInfo()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $school_id = ($this->input->post('search_id'));
        $search_type = ($this->input->post('search_type'));
        $select = ($this->input->post('select'));

        switch ($select) {
            case 'teachers':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolTeachers($school_id, 'list');
                } else {
                    $res = $this->Report_data_model->getSubjectTeachers($school_id, 'list');
                }
                break;

            case 'classes':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolClasses($school_id, 'list');
                } else {
                    $res = $this->Report_data_model->getSubjectClasses($school_id, 'list');
                }
                break;
                
            case 'students':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolStudents($school_id, 'list', 'all');
                } else {
                    $res = $this->Report_data_model->getSubjectStudents($school_id, 'list', 'all');
                }
                break;
                
            case 'male students':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolStudents($school_id, 'list', 'Male');
                } else {
                    $res = $this->Report_data_model->getSubjectStudents($school_id, 'list', 'Male');
                }
                break;
                
            case 'female students':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolStudents($school_id, 'list', 'Female');
                } else {
                    $res = $this->Report_data_model->getSubjectStudents($school_id, 'list', 'Female');
                }
                break;
                
            case 'funds':
                if ($search_type == 'school') {
                    $res = $this->Report_data_model->getSchoolFunds($school_id, 'list');
                } 
                break;
            
            default:
            $res = '';
                break;
        }

        $jsonData = array();
        $row = array();
        foreach ($res as $rowIndex => $r){
            unset($row);
            foreach ($r as $colIndex => $c){
                if ($rowIndex == '0') {
                    $jsonData['columns'][] = array('title' => $colIndex, 'data' => $colIndex);
                    $row[$colIndex] = ucwords($c);
                } else {
                    $row[$colIndex] = ucwords($c);
                }
            }
            $jsonData['data'][] = $row;
        }
        echo json_encode($jsonData);
    }

    public function getSchoolWithCount()
    {
        $res = $this->Report_data_model->getSchools();
        $rowdata = array();
        foreach ($res as $row) {
            $rowdata['school_id'] = $row['census_id'];
            $rowdata['school'] = $row['schoolname'];
            $rowdata['teachers'] = $this->Report_data_model->getSchoolTeachers($rowdata['school_id'], 'count')['count'];
            $rowdata['classes'] = $this->Report_data_model->getSchoolClasses($rowdata['school_id'], 'count')['count'];
            $rowdata['students'] = $this->Report_data_model->getSchoolStudents($rowdata['school_id'], 'count', 'all')['count'];
            $rowdata['male'] = $this->Report_data_model->getSchoolStudents($rowdata['school_id'], 'count', 'male')['count'];
            $rowdata['female'] = $this->Report_data_model->getSchoolStudents($rowdata['school_id'], 'count', 'female')['count'];
            
            $this->response['schoolCounts']['schools'] = $this->Report_data_model->getTotalRecords('schools', '1');
            $this->response['schoolCounts']['teachers'] = $this->Report_data_model->getTotalRecords('teachers', '1');
            $this->response['schoolCounts']['classes'] = $this->Report_data_model->getTotalRecords('classes', '1');
            $this->response['schoolCounts']['students'] = $this->Report_data_model->getTotalRecords('students_info', '1');
            $this->response['schoolCounts'][] = $rowdata;
        }
    }

    public function getTotalDetails(){
        header('Content-Type: application/x-json; charset=utf-8');
        $this->response['schools'] = $this->Report_data_model->getTotalRecords('schools', '1');
        $this->response['teachers'] = $this->Report_data_model->getTotalRecords('teachers', '1');
        $this->response['classes'] = $this->Report_data_model->getTotalRecords('classes', '1');
        $this->response['students'] = $this->Report_data_model->getTotalRecords('students_info', '1');
        $this->response['students_male'] = $this->Report_data_model->getTotalRecords('students_info', 'Male');
        $this->response['students_female'] = $this->Report_data_model->getTotalRecords('students_info', 'Female');
        echo json_encode($this->response);
    }

    public function getStudentDetails(){
        header('Content-Type: application/x-json; charset=utf-8');
        $student_id = $this->input->post('std_id');
        
        $this->response['details'] = $this->Report_data_model->getStudentDetails($student_id);
        $this->response['attendance'] = $this->Report_data_model->getStudentAtendance($student_id);
        $this->response['class'] = $this->Report_data_model->getStudentClass($student_id);
        echo json_encode($this->response);
    }
}