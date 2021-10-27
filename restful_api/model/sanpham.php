<?php
 class Sanpham{
 	private $conn;

 	public $Idloai;
     public $Idsp;
 	public $Tensp;
     public $urlhinh;
 	public function __construct($db){
 		$this->conn = $db;
 	}

 	//read data
 	public function read(){
      $sl = "SELECT * FROM sanpham ORDER BY Idsp DESC";
      $stmt = $this->conn->prepare($sl);
      $stmt->execute();
      return $stmt;
 	}

     //show

     public function show(){
      $sl = "SELECT * FROM sanpham WHERE Idsp=? LIMIT 1";
      $stmt = $this->conn->prepare($sl);
      $stmt->bindParam(1,$this->Idsp);
      $stmt->execute();
      
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->Tensp = $row['Tensp'];
      $this->urlhinh = $row['urlhinh'];
     }

     //create

     public function create()
     {
          $sl= "INSERT INTO sanpham SET Tensp=:Tensp,urlhinh=:urlhinh";
          $stmt = $this->conn->prepare($sl);
           $this->Tensp = htmlspecialchars(strip_tags($this->Tensp));
           $this->urlhinh = htmlspecialchars(strip_tags($this->urlhinh));
           $stmt->bindParam(':Tensp',$this->Tensp);
           $stmt->bindParam(':urlhinh',$this->urlhinh);

           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

     //update

     public function update()
     {
          $sl= "UPDATE sanpham SET Tensp=:Tensp,urlhinh=:urlhinh WHERE Idsp=:Idsp";
          $stmt = $this->conn->prepare($sl);
           $this->Tensp = htmlspecialchars(strip_tags($this->Tensp));
           $this->urlhinh = htmlspecialchars(strip_tags($this->urlhinh));
           $this->Idsp = htmlspecialchars(strip_tags($this->Idsp));
           $stmt->bindParam(':Tensp',$this->Tensp);
           $stmt->bindParam(':urlhinh',$this->urlhinh);
           $stmt->bindParam(':Idsp',$this->Idsp);
           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

     //delete

      public function delete()
     {
          $sl= " DELETE FROM sanpham WHERE Idsp=:Idsp";
          $stmt = $this->conn->prepare($sl);
          
           $this->Idsp = htmlspecialchars(strip_tags($this->Idsp));
           
           $stmt->bindParam(':Idsp',$this->Idsp);
           if($stmt->execute()){
               return true;
           }
           printf("error %s.\n" ,$stmt->error);
           return false;
     }

 }

?>