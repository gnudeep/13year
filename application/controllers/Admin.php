<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 9/26/17
 * Time: 1:53 PM
 */

class Admin extends CI_Controller
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
        $this->load->view('admin/sidebar');

        $this->response['schools'] = $this->Form_data_model->select('schools');
        $this->response['coordinators'] = $this->Form_data_model->select('coordinators');
        $this->response['province'] = $this->Form_data_model->select('province');
        $this->load->view('admin/dashboard', $this->response);
        $this->load->view('footer');
    }

    public function check_sess()
    {
        if ($this->session->user_logged != "in") {
            $this->logout(); //Redirect to login page if session not initiated.
        } elseif ($this->session->user_role != '0'){
            $this->logout(); //Redirect to login page if user not authored.
        }
    }

    //Logout function
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
    }

    //Function to view add new school Form.
    function addSchool()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('admin/sidebar');

        $this->response['province'] = $this->Form_data_model->select('province');
        $this->load->view('admin/addSchool', $this->response);
        $this->load->view('footer');
    }

    //Function to add new school.
    function addNewSchool()
    {
        $census_id = $this->security->xss_clean($_REQUEST['census_id']);
        $name = $this->security->xss_clean($_REQUEST['name']);
        $province_id = $this->security->xss_clean($_REQUEST['province']);
        $district_id = $this->security->xss_clean($_REQUEST['district']);
        $zone_id = $this->security->xss_clean($_REQUEST['zone']);
        $telephone = $this->security->xss_clean($_REQUEST['telephone']);
        $fax = $this->security->xss_clean($_REQUEST['fax']);
        $email = $this->security->xss_clean($_REQUEST['email']);
        $pname = $this->security->xss_clean($_REQUEST['pname']);
        $pmobile = $this->security->xss_clean($_REQUEST['pmobile']);
        $pemail = $this->security->xss_clean($_REQUEST['pemail']);

        $schoolArray = array('census_id' =>$census_id, 'schoolname' => $name, 'province_id' => $province_id, 'district_id' => $district_id, 'zone_id' => $zone_id, 'telephone' => $telephone, 'fax' => $fax, 'email' => $email, 'principal_name' => $pname, 'principal_mobile' => $pmobile, 'principal_email' => $pemail);

        $res = $this->Form_data_model->insert('schools', $schoolArray);
        //$res = 1;
        if ($res == 1){

            $this->session->set_flashdata('success',$name . ' School Added Successfully');
            redirect('admin/index');

        } else {
            $this->session->set_flashdata('not-success','Something went wrong! School Did not Added');
            redirect('admin/index');
        }
    }
    
    public function Subjects()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        // Datatables Variables
        
        //Load our library EditorLib 
        $this->load->library('EditorLib');
        
        //Call the process method to process the posted data
        $this->editorlib->process($_POST);
        
        //Let the model produce the data
        $this->editorlib->CI->DataTable_model->Subjects($_POST);
    }

    public function Schools()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $formAction = $this->security->xss_clean($this->input->post('formAction'));
        $census_id = $this->security->xss_clean($this->input->post('census_id'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $province_id = $this->security->xss_clean($this->input->post('province'));
        $district_id = $this->security->xss_clean($this->input->post('district'));
        $zone_id = $this->security->xss_clean($this->input->post('zone'));
        $telephone = $this->security->xss_clean($this->input->post('telephone'));
        $fax = $this->security->xss_clean($this->input->post('fax'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $pname = $this->security->xss_clean($this->input->post('pname'));
        $pmobile = $this->security->xss_clean($this->input->post('pmobile'));
        $pemail = $this->security->xss_clean($this->input->post('pemail'));
        $lat = $this->security->xss_clean($this->input->post('lat'));
        $lot = $this->security->xss_clean($this->input->post('lot'));

        $schoolArray = array('census_id' =>$census_id, 'schoolname' => $name, 'province_id' => $province_id, 'district_id' => $district_id, 'zone_id' => $zone_id, 'telephone' => $telephone, 'fax' => $fax, 'email' => $email, 'principal_name' => $pname, 'principal_mobile' => $pmobile, 'principal_email' => $pemail, 'lat' => $lat, 'lot' => $lot);

        
        if ($formAction == 'add') {
            $res = $this->Form_data_model->insert('schools', $schoolArray);
        } else if ($formAction == 'edit') {
            $res = $this->Form_data_model->update('schools', 'census_id', $census_id, $schoolArray);
        } else if ($formAction == 'delete') {
            $res = $this->Form_data_model->deleteStudent( $std_id );
        }

        if ($res == 1){

            $this->session->set_flashdata('success',$name . ' School Added Successfully');
            redirect('admin/index');

        } else {
            $this->session->set_flashdata('not-success','Something went wrong! School Did not Added');
            redirect('admin/index');
        }
        
    }
    
    public function changeCoordinator()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        
        $formAction = $this->security->xss_clean($this->input->post('formAction'));
        $school_id = $this->security->xss_clean($this->input->post('school_id'));
        $cname = $this->security->xss_clean($this->input->post('cname'));
        $cnic = $this->security->xss_clean($this->input->post('cnic'));
        $cdob = $this->security->xss_clean($this->input->post('cdob'));
        $cmobile = $this->security->xss_clean($this->input->post('cmobile'));
        $cemail = $this->security->xss_clean($this->input->post('cemail'));
        $appsch = $this->security->xss_clean($this->input->post('appsch'));
        $appser = $this->security->xss_clean($this->input->post('appser'));
        $cuname = strtolower($this->security->xss_clean($this->input->post('cuname')));
        $cur_cuname = strtolower($this->security->xss_clean($this->input->post('cur_cuname')));
        $cpw = password_hash($this->security->xss_clean($this->input->post('cpw')), PASSWORD_DEFAULT);
        $cID = $this->security->xss_clean($this->input->post('cID'));
        $uID = $this->security->xss_clean($this->input->post('uID'));
        
        $coordinator_array = array('school_id' => $school_id, 'coordinator_nic' => $cnic, 'coordinator_name' => $cname, 'coordinator_dob' => $cdob, 'coordinator_mobile' => $cmobile, 'coordinator_email' => $cemail, 'coordinator_ser_app' => $appser, 'coordinator_sch_app' => $appsch);
        
        $user_array = array('role' => '1', 'name' => $cname, 'uname' => $cuname, 'passwd' => $cpw, 'school_id' => $school_id);
        
        if ($formAction == 'add') {
            $res = $this->Form_data_model->addCoordinator($coordinator_array, $user_array);
        } else if ($formAction == 'edit') {
            $coordinator_array['id'] = $cID;
            if ($cuname) {
                if ($cpw) {
                    $user_arrayx = array('id' => $uID, 'role' => '1', 'name' => $cname, 'uname' => $cuname, 'passwd' => $cpw, 'school_id' => $school_id);
                } else {
                    $user_arrayx = array('id' => $uID, 'role' => '1', 'name' => $cname, 'uname' => $cuname, 'school_id' => $school_id);
                }
                $res = $this->Form_data_model->updateCoordinator($coordinator_array, $user_arrayx, $cID, $uID);
            } else {
                $res = $this->Form_data_model->update('coordinators', 'id', $cID, $coordinator_array);
            }
            
        }
        
        if($res == '1'){
            echo "success";
        }else {
            echo strval($workplace_id);
        }
    }


    function sendEmail()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $recepients = $this->security->xss_clean($this->input->post('sel_list'));
        $message = $this->security->xss_clean($this->input->post('message'));
        $subject = $this->security->xss_clean($this->input->post('subject'));

        $this->load->library('email');

        $this->email->from('13years.admin@moe.gov.lk', '13 Years Admin');
        
        $this->email->to($recepients);

        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
         echo $message;
    }

    public function editProfile()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $edit = $this->security->xss_clean($this->input->post('edit'));
        $user_id = $this->security->xss_clean($this->input->post('user_id'));
        $in_name = $this->security->xss_clean($this->input->post('in_name'));
        $passwd = password_hash($this->security->xss_clean($this->input->post('passwd')), PASSWORD_DEFAULT);
        $res = '0';

        if ($edit == 'name') {
            $userArray = array('name' =>$in_name);
            $res = $this->Form_data_model->update('user', 'id', $user_id, $userArray);
        } elseif ($edit == 'passwd') {
            $userArray = array('passwd' =>$passwd);
            $res = $this->Form_data_model->update('user', 'id', $user_id, $userArray);
        }
    }
}