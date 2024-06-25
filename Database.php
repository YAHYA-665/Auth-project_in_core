<?php
//include_once 'User.php';
class DB
{
   private $host= 'localhost';
   private $db_name= 'auth_projectdb';
   private string $username= 'root';
   private $password= '';
   public $connection;
   public function __construct()
   {
       $this->connection = null;
       $connection = null;
       try {
           $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
           // set the PDO error mode to exception
           $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
       } catch(PDOException $e) {
           echo "Connection failed: " . $e->getMessage();
       }
   }

   public function create()
   {
   }
}
