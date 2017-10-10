<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 6/11/17
 * Time: 1:53 PM
 */

class General extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_data_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none");

    public function index()
    {
        //$this->load->view('head');

        $this->response['schools'] = $this->General_data_model->getSchools();
        $this->load->view('general/dashboard', $this->response);
        $this->load->view('footer');
    }
    
    public function getSchoolData()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $school_id = $this->input->post('school_id');
        $res = $this->General_data_model->getTotalStudents($school_id);
        echo json_encode($res);
    }
}