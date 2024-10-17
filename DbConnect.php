<?php
//link the external php file
include_once './Config.php';

//PHP - OOP
class DbConnect {
    
    private $conn;

    // constructor
    function __construct() {
        
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
	
	function getConnection(){
		return $this->conn;
	}

    /**
     * Establishing database connection
     * @return database handler
     */
    function connect() {        
		include_once dirname(__FILE__) . '/Config.php';
        
        // Connecting to mysql database
        $this->conn = mysqli_connect(HOST, USERNAME, PASSWORD) or die(mysql_error());
        
		//var_dump($this->conn);exit;
		//mysqli_set_charset("UTF8", $this->conn);
		
		mysqli_set_charset($this->conn,"utf8");

	
        // Selecting database
        mysqli_select_db($this->conn,DATABASE_NAME) or die(mysql_error());
        
        // returing connection resource
        return $this->conn;
     
    }

    /**
     * Closing database connection
     */
    function close() {
        // closing db connection
        mysqli_close($this->conn);
    }

}

?>
