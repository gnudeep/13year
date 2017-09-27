<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 1:00 PM
 */

class FormControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_data_model'); //load database model.
        $this->load->model('User_model'); //load database model.

    }

    public function getDistricts(){
        header('Content-Type: application/x-json; charset=utf-8');
        $province_id = $this->input->post('province_id');
        $res = $this->Form_data_model->get_districts($province_id);
        echo json_encode($res);
    }

    public function getZones(){
        header('Content-Type: application/x-json; charset=utf-8');
        $district_id = $this->input->post('district_id');
        $res = $this->Form_data_model->get_zones($district_id);
        echo json_encode($res);
    }
}