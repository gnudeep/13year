<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/28/17
 * Time: 10:28 AM
 */

class Sadmin extends CI_Controller
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
        $this->load->view('sadmin/sidebar');

        $this->getSchoolDetails();
        $this->load->view('sadmin/dashboard', $this->response);
        $this->load->view('footer');
    }

    public function check_sess()
    {
        if ($this->session->user_logged != "in") {
            $this->logout(); //Redirect to login page if session not initiated.
        } elseif ($this->session->user_role != '1'){
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

        $TeacherSearchArray = array('school_id' =>$this->session->school_id);
        $this->response['teachers'] = $this->Form_data_model->searchdb('teachers', $TeacherSearchArray);
    }

    //Function to view add new school Form.
    function addTeacher()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('sadmin/sidebar');

        $this->load->view('sadmin/addTeacher');
        $this->load->view('footer');
    }

    //Function to add new school.
    function addNewTeacher()
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

            $this->session->set_flashdata('success',$name . ' Teacher Has Successfully Added');
            redirect('sadmin/index');

        } else {
            $this->session->set_flashdata('not-success','Something went wrong! Teacher Details Did not Added');
            redirect('sadmin/index');
        }
    }

    function createUser()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('sadmin/sidebar');

        $this->load->view('sadmin/addUser');
        $this->load->view('footer');
    }
}