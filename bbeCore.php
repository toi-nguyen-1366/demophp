<?php

class bbeCore
{
    protected $conn;

    public function __construct()
    {
        $dbbase = include "config.php";
        $server = $dbbase['db']['servername'];
        $dbname =  $dbbase['db']['dbname'];
        $username =  $dbbase['db']['username'];
        $password =  $dbbase['db']['password'];
        try {
            $this->conn = new PDO("mysql:host=$server;dbname=".$dbname, $username, $password);
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

}


