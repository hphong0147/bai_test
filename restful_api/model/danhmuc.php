<?php
 class Danhmuc{
 	private $conn;

 	public $Idloai;
 	public $Tensp;

 	public function __construct($db){
 		$this->conn = $db;
 	}

 	//read data
 	public function read(){
      $sl = "SELECT * FROM danhmuc ORDER BY Idloai DESC";
      $stmt = $this->conn->prepare($sl);
      $stmt->execute();
      return $stmt;
 	}

     //show

     public function show(){
      $sl = "SELECT * FROM danhmuc WHERE Idloai=? LIMIT 1";
      $stmt = $this->conn->prepare($sl);
      $stmt->bindParam(1,$this->Idloai);
      $stmt->execute();
      
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->Tensp = $row['Tensp'];
     }

     //create

     public function create()
     {
          $sl= "INSERT INTO danhmuc SET Tensp=:Tensp";
          $stmt = $this->conn->prepare($sl);
           $this->Tensp = htmlspecialchars(strip_tags($this->Tensp));
           $stmt->bindParam(':Tensp',$this->Tensp);

           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

     //update

     public function update()
     {
          $sl= "UPDATE danhmuc SET Tensp=:Tensp WHERE Idloai=:Idloai";
          $stmt = $this->conn->prepare($sl);
           $this->Tensp = htmlspecialchars(strip_tags($this->Tensp));
           $this->Idloai = htmlspecialchars(strip_tags($this->Idloai));
           $stmt->bindParam(':Tensp',$this->Tensp);
           $stmt->bindParam(':Idloai',$this->Idloai);
           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

     //delete

      public function delete()
     {
          $sl= " DELETE FROM danhmuc WHERE Idloai=:Idloai";
          $stmt = $this->conn->prepare($sl);
          
           $this->Idloai = htmlspecialchars(strip_tags($this->Idloai));
           
           $stmt->bindParam(':Idloai',$this->Idloai);
           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

 }

?>