<?php
include_once 'Database.php';

class User extends DB
{
   private $table_name = "user";
   public $id;
   public $name;
   public $email;
   public $password;

   public function register()
   {
       $query = "SELECT * FROM " .$this->table_name. "WHERE email = :email";
       $stmt = $this->connection->prepare($query);

       $stmt->bindparam(':email' ,$this->email);
//        $stmt->execute();
       if ($stmt->rowCount() > 0){
           return false; # Error because of same id.
       }

       $query = "INSERT INTO " . $this->table_name . " (name, email, password)
                 VALUES (:name, :email, :password)";
//        var_dump($query);
       $stmt = $this->connection->prepare($query);
       $this->password = password_hash($this->password, PASSWORD_DEFAULT);
       $stmt->bindParam(':name', $this->name);
       $stmt->bindParam(':email', $this->email);
       $stmt->bindParam(':password', $this->password);

       if ($stmt->execute()){
           return true;
       }else{
           return false;
       }
   }

   public function signup()
   {
       $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
       $stmt = $this->connection->prepare($query);

       $stmt->bindParam(':email', $this->email);
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       if ($row && password_verify($this->password, $row['password'])) {
           $this->id = $row['id'];
           $this->name = $row['name'];
           return true;
       } else {
           return false;
       }
   }
}
