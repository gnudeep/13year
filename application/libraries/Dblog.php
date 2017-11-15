<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 10/26/17
 * Time: 10:11 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dblog {
    public function __construct()
    {
        
    }

    function logQueries($sql){
        $CI =& get_instance();

        $filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php';

        $dt = new DateTime();
        $times = $dt->format('Y-m-d H:i:s');

        $log = $sql .  "\n Executed By: ". $CI->session->username . " | User ID: ". $CI->session->user_id  . "\n Executed at: ". $times ;

        $headerLine = '<?php defined("BASEPATH") OR exit("No direct script access allowed"); ?>';
        
        if(!file_exists($filepath)){
            file_put_contents($filepath, $headerLine. "\n\n");
        }

        file_put_contents($filepath, $log. "\n\n", FILE_APPEND);
    }
}