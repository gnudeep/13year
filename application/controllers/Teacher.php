<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 10/04/17
 * Time: 12:53 PM
 */

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none");

    public function index()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('teacher/sidebar');

        $this->getSchoolDetails();
        $this->load->view('teacher/dashboard', $this->response);
        $this->load->view('footer');
    }

    public function check_sess()
    {
        if ($this->session->user_logged != "in") {
            $this->logout(); //Redirect to login page if session not initiated.
        } elseif ($this->session->user_role != '3'){
            $this->logout(); //Redirect to login page if user not authored.
        }
    }

    //Logout function
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
    }

    function getSchoolDetails()
    {
        $searchArray = array('census_id' =>$this->session->school_id);
        $this->response['school'] = $this->Form_data_model->searchdb('schools', $searchArray);

        $ClassSearchArray = array('class_teacher' =>$this->session->teacher_id);
        $this->response['class'] = $this->Form_data_model->searchdb('classes', $ClassSearchArray);

        $searchArray = array('school_id' =>$this->session->school_id, 'class_id' => $this->response['class']['0']['id']);
        $this->response['subjects'] = $this->Form_data_model->getClassDetails($this->session->school_id, $this->response['class']['0']['id']);
    }

    public function Dtable($method)
    {
        $this->check_sess();

        header('Content-Type: application/x-json; charset=utf-8');
        // Datatables Variables

        //Load our library EditorLib 
        $this->load->library('EditorLib');

        //`Call the process method to process the posted data
        $this->editorlib->process($_POST);

        //Let the model produce the data
        $this->editorlib->CI->DataTable_model->$method($_POST);
    }

    //Function to view add new school Form.
    function addStudent()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('teacher/sidebar');

        $this->load->view('teacher/addStudent');
        $this->load->view('footer');
    }

    //Function to add new school.
    function addNewStudent()
    {
        $school_id = $this->session->school_id;
        $title = $this->security->xss_clean($_REQUEST['title']);
        $name = $this->security->xss_clean($_REQUEST['in_name']);
        $u_name = $this->security->xss_clean($_REQUEST['u_name']);
        $passwd = $this->security->xss_clean($_REQUEST['passwd']);
        $role = $this->security->xss_clean($_REQUEST['role']);

        $dataArray = array('school_id' =>$school_id, 'title' => $title,'name' => $name,'uname' => $u_name, 'passwd' => $passwd, 'role' => $role);

        $res = $this->Form_data_model->insert('teachers', $dataArray);
        //$res = 1;
        if ($res == 1){

            $this->session->set_flashdata('success',$name . ' Student Has Added Successfully');
            redirect('teacher/index');

        } else {
            $this->session->set_flashdata('not-success','Something went wrong! Teacher Details Did not Added');
            redirect('teacher/index');
        }
    }
}