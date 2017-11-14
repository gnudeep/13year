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

        $this->getClassDetails();
        $this->response['travel_modes'] = $this->Form_data_model->select('travel_mode');

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

    function getClassDetails()
    {
        $searchArray = array('census_id' =>$this->session->school_id);
        $this->response['school'] = $this->Form_data_model->searchdb('schools', $searchArray);

        $ClassSearchArray = array('class_teacher' => $this->session->teacher_id);
        $this->response['class'] = $this->Form_data_model->searchdb('classes', $ClassSearchArray);

        $searchArray = array('school_id' =>$this->session->school_id, 'class_id' => $this->response['class']['0']['id']);
        $this->response['subjects'] = $this->Form_data_model->getClassDetails($this->session->school_id, $this->response['class']['0']['id']);

        $this->response['students'] = $this->Form_data_model->getClassStudents($this->response['class']['0']['id']);

        $this->response['attendance'] = $this->Form_data_model->getClassAttendance($this->session->school_id, $this->response['class']['0']['id']);
        
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

        $this->response['travel_modes'] = $this->Form_data_model->select('travel_mode');
        $this->load->view('teacher/addStudent', $this->response);
        $this->load->view('footer');
    }

    //Function to add new school.
    function addNewStudent()
    {
        $school_id = $this->session->school_id;
        $index_no = $this->security->xss_clean($_REQUEST['index_no']);
        $nic = $this->security->xss_clean($_REQUEST['nic']);
        $in_name = $this->security->xss_clean($_REQUEST['in_name']);
        $dob = $this->security->xss_clean($_REQUEST['dob']);
        $gender = $this->security->xss_clean($_REQUEST['gender']);
        $address = $this->security->xss_clean($_REQUEST['address']);
        $telephone = $this->security->xss_clean($_REQUEST['telephone']);
        $medium = $this->security->xss_clean($_REQUEST['medium']);
        $dist_school = $this->security->xss_clean($_REQUEST['dist_school']);
        $income = $this->security->xss_clean($_REQUEST['income']);
        $travel_mode = $this->security->xss_clean($_REQUEST['travel_mode']);

        $ClassSearchArray = array('class_teacher' =>$this->session->teacher_id);
        $class_id = $this->Form_data_model->searchdb('classes', $ClassSearchArray)['0']['id'];
        
        $student_id = $this->Form_data_model->get_recent_id('students_info')['0']['id'] + 1;

        $stdArray = array('id' => $student_id, 'school_id' =>$school_id, 'index_no' => $index_no,'nic' => $nic,'in_name' => $in_name, 'dob' => $dob, 'gender' => $gender, 'address' => $address, 'telephone' => $telephone, 'medium' => $medium, 'dist_school' => $dist_school, 'income' => $income, 'travel_mode_id' => $travel_mode, 'status' => 'Phase 1', 'last_edit' => $this->session->user_id);

        $classArray = array('school_id' => $school_id, 'class_id' => $class_id, 'student_id' => $student_id);

        $res = $this->Form_data_model->addStudent($stdArray, $classArray);
        //$res = 1;
        if ($res == 1){

            $this->session->set_flashdata('success',$name . ' Student Has Added Successfully');
            redirect('teacher/index');

        } else {
            $this->session->set_flashdata('not-success','Something went wrong! Student Details Did not Added');
            redirect('teacher/index');
        }
    }
    
    public function students()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        
        $formAction = $this->input->post('formAction');
        $school_id = $this->session->school_id;
        $std_id = $this->input->post('std_id');
        $index_no = $this->input->post('index_no');
        $in_name = $this->input->post('in_name');
        $nic = strtoupper($this->input->post('nic'));
        $gender = $this->input->post('gender');
        $address = $this->input->post('address');
        $telephone = $this->input->post('telephone');
        $medium = $this->input->post('medium');
        $dist_school = $this->input->post('dist_school');
        $income = $this->input->post('income');
        $travel_mode_id = $this->input->post('travel_mode');
        $full_name = $this->input->post('full_name');
        $dob = $this->input->post('dob');

        $ClassSearchArray = array('class_teacher' =>$this->session->teacher_id);
        $class_id = $this->Form_data_model->searchdb('classes', $ClassSearchArray)['0']['id'];

        $student_id = $this->Form_data_model->get_recent_id('students_info')['0']['id'] + 1;
        
        $student_array = array('school_id' => $school_id, 'index_no' => $index_no, 'in_name' => $in_name, 'full_name' => $full_name, 'nic' => $nic, 'gender' => $gender, 'address' => $address, 'telephone' => $telephone, 'medium' => $medium, 'dist_school' => $dist_school, 'income' => $income, 'travel_mode_id' => $travel_mode_id, 'dob' => $dob, 'status' => 'Phase 1', 'last_edit' => $this->session->user_id);
        

        $classArray = array('school_id' => $school_id, 'class_id' => $class_id, 'student_id' => $student_id);

        if ($formAction == 'add') {
            $student_array['id'] = $student_id;
            $res = $this->Form_data_model->addStudent($student_array, $classArray);
        } else if ($formAction == 'edit') {
            $res = $this->Form_data_model->update('students_info', 'id', $std_id, $student_array);
        } else if ($formAction == 'delete') {
            $res = $this->Form_data_model->deleteStudent( $std_id );
        }
        
        if($res == '1'){
            echo "success";
        }else {
            echo json_encode($res);
        }
    }
    
    function attendanceForm()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('teacher/sidebar');

        $ClassSearchArray = array('class_teacher' =>$this->session->teacher_id);
        $class_id = $this->Form_data_model->searchdb('classes', $ClassSearchArray)['0']['id'];
        
        $this->response['students'] = $this->Form_data_model->getClassStudents($class_id);
        $this->load->view('teacher/markAttendance', $this->response);
        $this->load->view('footer');
    }
    
    function getMonthAttendance()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $this->check_sess();

        $teacher_id = $this->session->teacher_id;
        $searchArray = array('class_teacher' => $teacher_id);
        $class = $this->Form_data_model->searchdb('classes', $searchArray)['0']['id'];
        
        $attmonth = $this->security->xss_clean($_POST['attmonth']);

        $attArray = array('class_id' => $class, 'month' => $attmonth);
        $res = $this->Form_data_model->searchdb('p1_attendance', $attArray);
        
        echo json_encode($res);
    }
    
    function markAttendance()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $this->check_sess();
        
        $school_id = $this->session->school_id;
        $teacher_id = $this->session->teacher_id;

        $searchArray = array('class_teacher' => $teacher_id);
        $class = $this->Form_data_model->searchdb('classes', $searchArray)['0']['id'];
        
        $students = json_decode($_POST['students']);
        $attmonth = $this->security->xss_clean($_POST['attmonth']);

        $attendancelist = array();
        foreach( $students as $key ) {
            
            $student = array('school_id' => $school_id, 'class_id' => $class, 'student_id' => $key->student_id, 'month' => $attmonth, 'attended_days' => $key->days);
            array_push($attendancelist,$student);
            
        }
        
        $res = $this->Form_data_model->addAttendance('p1_attendance', $attendancelist);
        echo $res;
    }
}