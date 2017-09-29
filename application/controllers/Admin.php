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
        $this->load->view('admin/admin-sidebar');

        $this->response['schools'] = $this->Form_data_model->select('schools');
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
        $this->load->view('admin/admin-sidebar');

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
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $subjects = $this->Form_data_model->select('subjects');

        $data = array();

        foreach($subjects as $r) {

            $data[] = array(
                $r['subject_name']
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => sizeof($subjects),
            "recordsFiltered" => sizeof($subjects),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
}