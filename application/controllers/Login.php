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
 * Class Teacher - 3
 * Report Viewer - 5
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
            $this->session->set_userdata('role_name', 'Main System Administrator');
            redirect('/admin/index');
        }else if ($user_level == "1") {
            $this->session->set_userdata('role_name', 'School System Administrator');
            redirect('/sadmin/index');
        }else if ($user_level == "2") {
            $this->session->set_userdata('role_name', 'School Finance Administrator');
            redirect('/finance/index');
        }else if ($user_level == "3") {
            $this->session->set_userdata('role_name', 'Class Teacher of School');
            redirect('/teacher/index');
        }else if ($user_level == "5") {
            $this->session->set_userdata('role_name', 'Reporting Administrator');
            redirect('/report/index');
        }else{
            redirect('/editor/index');
        }
    }
    
    function login_user()
    {
        $uname = strtolower($this->security->xss_clean($_REQUEST['username']));
        //$pwd  = password_hash($this->security->xss_clean($_REQUEST['password']), PASSWORD_DEFAULT);
        $pwd  = $this->security->xss_clean($_REQUEST['password']);
        $captcha = $this->security->xss_clean($_REQUEST['g-recaptcha-response']);

        $secret = "6LdzNjoUAAAAAI4VqwnzM1M_xCOpp3zLNEvAXAmW";

        /* if ($captcha) {

            $requestUrl = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST['g-recaptcha-response'];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $requestUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");

            $responseData1 = curl_exec($curl);

            if(curl_exec($curl) === false)
            {
                echo 'Curl error: ' . curl_error($curl);
            }
            else
            {
                echo 'Operation completed without any errors';
            }

            curl_close($curl);
            echo gethostbyname('www.google.com');
            echo '<br>';
            echo  $responseData1;

            //$responseData = json_decode($responseData);

        echo 'captha is '. $captcha . '<br>' . $_POST['g-recaptcha-response'] . '<br>';
           /*  $responseData = file_get_contents($requestUrl);
           print_r($responseData);
           echo '<br>'; */
            /* if ($responseData1["success"] != false) {
                $chk_login = $this->User_model->login($uname, $pwd);
            }
        }  */
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
            $this->sendEmail();

            redirect('/admin/index');
            
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

    function sendEmail()
    {
        $this->load->library('email');

        $this->email->from('13years.admin@moe.gov.lk', '13 Years Admin');
        $recepients = array('kosala4@gmail.com', 'kosala4@gmail.com');
        
        $this->email->to($recepients);

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
    }
}
