<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Mysql",     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => "root",      // Database user name
	"pass" => "mysql123",  // Database password
	"host" => "localhost", // Database host
	"port" => "",          // Database connection port (can be left empty for default)
	"db"   => "13year",    // Database name
	"dsn"  => "",          // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
	"pdoAttr" => array()   // PHP PDO attributes array. See the PHP documentation for all options
);

