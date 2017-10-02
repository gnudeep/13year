<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorLib {

    public $CI = null;

    function __construct()
    {
        $this->CI = &get_instance();
    }   

    public function process($post)
    {   
        // DataTables PHP library
        require dirname(__FILE__).'/Editor/php/DataTables.php';

        //Load the model which will give us our data
        $this->CI->load->model('DataTable_model');

        //Pass the database object to the model
        $this->CI->DataTable_model->init($db);
    }
}