<?php


class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    //Class Constructor
    public function __construct(
        $dbname = "DBName",
        $tablename = "tablename",
        $servername = "localhost",
        $username = "zaidali",
        $password = "1234"
    ) 
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername =  $servername;
        $this->username = $username;
        $this->password = $password;  
        
        //Create connection
        $this->con = mysqli_connect($servername, $username, $password);

        //Check Connection
        if(!$this->con) {
            die("Connection failed:".mysqli_connect_error());
        }

        //QUERY
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //Execute Query
        if(mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            //sql to create new table
            $sql = "CREATE TABLE IF NOT EXISTS $tablename
                    (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(25) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100)
                    );";

            if(!mysqli_query($this->con, $sql)) {
                echo "Error creating table:".mysqli_error($this->con);

            }
            else {
                return false;
            }


        }

    }

    // Get Product from the database
    public function getData() {
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
