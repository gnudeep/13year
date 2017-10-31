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
        $handle = fopen($filepath, "w");

        $dt = new DateTime();
        $times = $dt->format('Y-m-d H:i:s');
        //foreach ($sql as $key => $query) {
            //$sqlFunction = substr($query,0 , 3);
            //if ($sqlFunction != 'SEL') {
                //$log = $query . "\n Execution Time: ". $times[$key]. "\n Executed By: ". $CI->session->username . " - ". $sqlFunction;
                //$log = $sql .  "\n Executed By: ". $CI->session->username . " | User ID: ". $CI->session->user_id  . "\n Executed at: ". $times ;
                //fwrite($handle, $log. "\n\n");
            //}
        //}

        $log = $sql .  "\n Executed By: ". $CI->session->username . " | User ID: ". $CI->session->user_id  . "\n Executed at: ". $times ;
        fwrite($handle, $log. "\n\n");
        fclose($handle);
    }
}