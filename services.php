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
            echo "<script>
                alert('Error en la conexion a la base datos');
                window.location= '/ardanza/index.php'
    </script>";
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
    
    
}
?>