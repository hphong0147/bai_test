<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
  include_once('../../config/db.php');
  include_once('../../model/danhmuc.php');

  $db = new db();
  $connect = $db->connect();

  $danhmuc = new Danhmuc($connect);
  $read = $danhmuc->read();
  $num = $read->rowCount();

  if($num>0){
      $danhmuc_array= [];
      $danhmuc_array['danhmuc']= [];
      while($row = $read->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $danhmuc_item= array(
            'id_danhmuc' => $Idloai,
            'Tensp' => $Tensp
        

        );  
        array_push($danhmuc_array['danhmuc'], $danhmuc_item);

      }
      echo json_encode($danhmuc_array);
  }


?>