<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author edu
 */
class Login extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
    }
    public function index()
    {
        //$this->load->view('head');
        $this->load->view('login');
        //$this->load->view('footer');
    }

    function redirect_user($user_level)
    {
        //check user type to redirect
        if ($user_level == "0") {
                redirect('/admin/index');
        }else if ($user_level == "1") {
        redirect('/admin/officer');
        }else if ($user_level == "2") {
            redirect('/admin/sclerk');
        }else if ($user_level == "3") {
            redirect('/management/index');
        }else{
            redirect('/editor/index');
        }
    }
    
    function login_user()
    {
        $uname = strtolower($this->security->xss_clean($_REQUEST['username']));
        $pwd  = $this->security->xss_clean($_REQUEST['password']);

        $chk_login = $this->User_model->login($uname, $pwd);

        if ($chk_login == 1) {
            $this->load->library('session');
            $data = $this->User_model->get_a_record('LOWER(uname)',$uname);
            $name = $data[0]['name'];
            $role = $data[0]['role'];
            $userData = array('username' => $uname, 'name' => $name, 'user_role'=>$role, 'user_logged' => "in");
            $this->session->set_userdata($userData);

            $this->redirect_user($role);
            //echo($data[0]['level']);

            redirect('/admin/index');
            //echo "Success";
        }else {
            echo "Invalid User name or Password";
            redirect('/login/index');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login/index');
    }
}
