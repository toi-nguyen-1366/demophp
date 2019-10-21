<?php

class bbeCore
{
    protected $conn;

    public function __construct()
    {
        $servername = "127.0.0.1:3399";
        $username = "root";
        $password = "";
        $dbname = "user";
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=user", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllData($table)
    {
        $sql = "SELECT * FROM " . $table ;
        $result = $this->conn->query($sql,1);
        $kq = [];
        foreach($result as $row) {
            $a = get_object_vars($row);
            $sttm = array_shift($a);
            $kq[] = $a;
        }
        return $kq;
    }


    public function upadteData(string $sql){
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $msg = "update succesfully";
        }catch (PDOException  $e){
            echo '<pre>';
            print_r($e->getMessage());
            die("1");
        }
        return $msg;
    }

    function url(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    }
}


