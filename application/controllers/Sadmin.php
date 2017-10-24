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
    
    /*function getSchoolTeachers()
    {
        $searchArray = array('census_id' =>$this->session->school_id);
        $this->response['teachers'] = $this->Form_data_model->searchdb('schools', $searchArray);
    }*/

    //Function to view add new school Form.
    function addTeacher()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('sadmin/sidebar');

        $this->response['subjects'] = $this->Form_data_model->select('subjects');
        $this->load->view('sadmin/addTeacher', $this->response);
        $this->load->view('footer');
    }

    //Function to add new school.
    function addNewTeacher()
    {
        $school_id = $this->session->school_id;
        $title = $this->security->xss_clean($_REQUEST['title']);
        $name = $this->security->xss_clean($_REQUEST['name']);
        $nic = $this->security->xss_clean($_REQUEST['nic']);
        $dob = $this->security->xss_clean($_REQUEST['dob']);
        $mobile = $this->security->xss_clean($_REQUEST['mobile']);
        $email = $this->security->xss_clean($_REQUEST['email']);
        
        $trained1 = $this->security->xss_clean($_REQUEST['trained1']);
        $trained2 = (isset($_REQUEST['trained2']) ? $this->security->xss_clean($_REQUEST['trained2']): '0');
        $trained3 = (isset($_REQUEST['trained3']) ? $this->security->xss_clean($_REQUEST['trained3']): '0');
        
        $sub1 = $this->security->xss_clean($_REQUEST['sub1']);
        $sub2 = ($_REQUEST['sub2'] != "" ? $this->security->xss_clean($_REQUEST['sub2']) : NULL);
        $sub3 = ($_REQUEST['sub3'] != "" ? $this->security->xss_clean($_REQUEST['sub3']) : NULL);
        
        $app_ser = $this->security->xss_clean($_REQUEST['app_ser']);
        $app_sch = $this->security->xss_clean($_REQUEST['app_sch']);
        
        $dataArray = array('school_id' =>$school_id, 'title' => $title, 'teacher_in_name' => $name, 'nic' => $nic, 'dob' => $dob, 'teacher_mobile' => $mobile, 'teacher_email' => $email, 'teacher_trained_1' => $trained1, 'teacher_trained_2' => $trained2, 'teacher_trained_3' => $trained3, 'teacher_sub_1' => $sub1, 'teacher_sub_2' => $sub2, 'teacher_sub_3' => $sub3, 'app_date_service' => $app_ser, 'app_date_school' => $app_sch);

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

        $this->getSchoolDetails();
        $this->load->view('sadmin/addUser', $this->response);
        $this->load->view('footer');
    }

    //Function to add new school.
    function createNewUser()
    {
        $this->check_sess();

        header('Content-Type: application/x-json; charset=utf-8');

        $school_id = $this->session->school_id;
        $role = $this->input->post('role');
        $teacher_id = $this->input->post('teacher_id');
        $teacher_name = $this->input->post('teacher_name');
        $in_name = $this->input->post('in_name');
        $u_name = strtolower($this->input->post('u_name'));
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        
        $name = ($role == '3' ? $teacher_name : $in_name);
        $teacher_id = ($role == '3' ? $teacher_id : NULL);

        $user_array = array('role' => $role, 'name' => $name, 'uname' => $u_name, 'passwd' => $password, 'teacher_id' => $teacher_id, 'school_id' => $school_id);
        
        $res = $this->Form_data_model->insert('user', $user_array);

        if($res == '1'){
            echo "success";
        }else {
            echo strval($workplace_id);
        }
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
}