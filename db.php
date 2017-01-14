<?php
session_start();
require('configx.php');

class user
{
    private $host;
    private $user;
    private $pass;
    private $db;

    public function user()
    {
        global $host;
        global $user;
        global $pass;
        global $db;
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function Connect()
    {
        $link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        mysqli_query("SET NAMES 'utf8'",$link);
        mysqli_query("SET CHARACTER SET 'utf8'",$link);
        mysqli_query( "SET character_set_connection = 'utf8'",$link);

        //mysqli_query($link,'SET NAMES \'utf8\'');
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully";
        return $link;
    }


    public function add_user($user,$mail,$phonenumber){
        $link = $this->Connect();
        $sql="INSERT INTO `users`(`name`, `mail`, `tel`) VALUES ('$user','$mail','$phonenumber')";
        $result =mysqli_query($link,$sql);

        return $result;


    }
    public function del_menue($company_id){
        $link = $this->Connect();
        $sql="DELETE FROM `company` where company_id =$company_id";
        $result =mysqli_query($link,$sql);
        return $sql;


    }

    public function get_item($id){
        $link = $this->Connect();
        $sql = "SELECT * FROM `layer` WHERE kelid='$id'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row['value'];

    }

    public function delete_item($id){
        $link = $this->Connect();
        $sql = "DELETE FROM `layer` where kelid LIKE CONCAT($id, '%')";
        $result=mysqli_query($link,$sql);
        return $result;

    }



}


?>