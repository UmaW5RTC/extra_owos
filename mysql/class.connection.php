<?php
class getConnection {
    
   private $host = '192.168.56.101';
   private $user = 'root';
   private $pass = 'password';
   private $db = 'owos';
    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Could not connect to database!');
        } 
        //else {
        //     $this->dbcon = $con;
        //     echo 'Connection established!';
        // }
        $this->dbcon=$con;
        return $this->dbcon;
    }

    function close() {
        mysqli_close($dbcon);
        echo 'Connection closed!';
    }
  
    // else
    // {
    //    //echo"connected";
    //     return $con;
    // }

    //return $con;
  }
//}
