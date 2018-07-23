<?php
namespace ClasScheduler;

use mysqli;
use mysqli_result;
/**
 * @desc   : Handler for php auto function.
 * @author : lordshadowcz@gmail.com
 * @license: Apache License 2.0
 *
 */


class DB
{
    
    /**
     * @var DBConnection
     */
    protected static $connection = null;
    
    protected static function connCheck(){
        if (is_null(self::$connection)) {
            self::$connection = new DBconnection();
        }
        if(!self::$connection->isConnected()) {
            self::$connection = new DBconnection();
        }
    }
    
    public static function select($table,$query){
        self::connCheck();        
        
        
        return self::$connection->query("SELECT * FROM $table WHERE $query")->fetch_object();
    }       
}

class DBconnection extends mysqli {
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "test";  
    
    
    /**
     * @var mysqli_result
     */
    protected $result = null;
    
    public function __construct(){
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
        return $this;
    }
    
    public function isConnected(){  
        if ($this->connect_error) {
            return false;
        }
        return true;
    }
    
    public function query($query, $resultmode = null){
        $this->result = parent::query($query);        
        return $this->result;
    }
    
    
    public function __destruct(){
        $this->close();
    }
}

    