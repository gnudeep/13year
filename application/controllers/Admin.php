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
    }
    public function index()
    {
        $this->check_sess();
        $this->load->view('head');
        $this->load->view('admin-sidebar');
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

    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
    }
}