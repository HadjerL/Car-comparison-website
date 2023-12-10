<?php
class Model{
    private $db_name='car_compare';
    private $host='127.0.0.1';
    private $user = 'root';
    private $password = "";
    // public function __construct($db_name, $host, $user, $password) {
    //     $this->db_name = $db_name;
    //     $this->host = $host;
    //     $this->user = $user;
    //     $this->password = $password;
    // }
    protected function getDbName(){
        return $this->db_name;
    }
    protected function getHost(){
        return $this->host;
    }
    protected function getUser(){
        return $this->user;
    }
    protected function getPassword(){
        return $this->password;
    }
    public function connect($db_name, $host, $user, $password){
        $dsn = "mysql:dbname=$db_name; host=$host;";
        try{
            $pdo = new PDO($dsn, $user, $password);
        }
        catch (PDOException $e) {
            printf("error: couldn't connect to database", $e->getMessage());
            exit();
        }
        return $pdo;
    }
    protected function disconect (&$pdo) {
        $pdo=null;
    }
    protected function request($pdo,$request){
        $conn = $pdo->prepare($request);
        $conn->execute();
        return $conn->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>