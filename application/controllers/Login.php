<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Login
 *
 * @author kosala
 * This Class handle the functions for user login.
 * User Levels
 * Super Admin - 0
 * School Admin - 1
 * School Finance - 2
 * School Teacher - 3
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
        redirect('/sadmin/index');
        }else if ($user_level == "2") {
            redirect('/finance/index');
        }else if ($user_level == "3") {
            redirect('/teacher/index');
        }else{
            redirect('/editor/index');
        }
    }
    
    function login_user()
    {
        $uname = strtolower($this->security->xss_clean($_REQUEST['username']));
        //$pwd  = password_hash($this->security->xss_clean($_REQUEST['password']), PASSWORD_DEFAULT);
        $pwd  = $this->security->xss_clean($_REQUEST['password']);

        $chk_login = $this->User_model->login($uname, $pwd);

        if ($chk_login == 1) {
            $this->load->library('session');
            $data = $this->User_model->get_a_record('LOWER(uname)',$uname);
            $name = $data[0]['name'];
            $role = $data[0]['role'];
            $school = $data[0]['school_id'];
            $teacher_id = $data[0]['teacher_id'];
            $user_id = $data[0]['id'];
            $userData = array('username' => $uname, 'name' => $name, 'user_id'=> $user_id, 'user_role'=>$role, 'school_id' => $school, 'teacher_id' => $teacher_id, 'user_logged' => "in");
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
