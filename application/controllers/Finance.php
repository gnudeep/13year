<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 10/05/17
 * Time: 10:53 PM
 */

class Finance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        $this->load->model('General_data_model'); //load database model.
    }

    public $response = array("result"=>"none", "data"=>"none");

    public function index()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('finance/sidebar');

        $search_array = array('census_id'=> $this->session->school_id);
        $this->response['school'] = $this->Form_data_model->searchdb('schools', $search_array);
        $this->response['balance'] = $this->General_data_model->getFundsBalance($this->session->school_id);
        $this->load->view('finance/dashboard', $this->response);
        $this->load->view('footer');
    }

    public function check_sess()
    {
        if ($this->session->user_logged != "in") {
            $this->logout(); //Redirect to login page if session not initiated.
        } elseif ($this->session->user_role != '2'){
            $this->logout(); //Redirect to login page if user not authorized.
        }
    }

    //Logout function
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
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
