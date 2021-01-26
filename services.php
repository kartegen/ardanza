<?php

class Services{
    private $con;
    private $dbhost="localhost";
    private $dbuser="rootardanza";
    private $dbpass="qwerty123";
    private $dbname="ardanza";
    function __construct(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la DB no se relizó " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    
    public function clean($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }
    
    public function save($name,$email,$message){
        $sql = "INSERT INTO `Messages` ( `name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function saveCourse($courseName,$courseEmail,$phoneNumber){
        $sql = "INSERT INTO `Courses` ( `courseName`, `courseEmail`, `phoneNumber`) 
            VALUES ('$courseName', '$courseEmail', '$phoneNumber')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function saveUser($nameUser,$firstAp,$secondAp,$phoneUser,$pass){
        $sql = "INSERT INTO `Users` ( 'nameUser','firstAp','secondAp','phoneUser','pass') 
            VALUES ( '$nameUser','$firstAp','$secondAp','$phoneUser','$pass')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    
    public function getId($id){
        $sql = "SELECT * FROM user where idUser='$id'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res );
        return $return ;
    }
    
    public function getUser($userName){
        $sql = "SELECT * FROM user where nameUser='$userName'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res );
        return $return ;
    }
    
    public function getPass($pass){
        $sql = "SELECT * FROM user where nameUser='$pass'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res );
        return $return ;
    }
    
    public function update($nameUser,$firstAp,$secondAp,$phoneUser,$pass, $id){
        $sql = "UPDATE users SET nameUser='$nameUser', firstAp='$firstAp', secondAp='$secondAp', phoneUser='$phoneUser', pass='$pass' WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete($id){
        $sql = "DELETE FROM users WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    
}
?>