<?php
defined('BASEPATH') OR exit('No direct script access allowed');
# @Author: Kosala Gangabadage
# @Date:   2017-12-04T13:06:29+05:30
# @Email:  kosala4@gmail.com
# @Last modified by:   Kosala Gangabadage
# @Last modified time: 2017-12-18T15:03:51+05:30



class Error404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('error404');//loading in custom error view
    }
}
