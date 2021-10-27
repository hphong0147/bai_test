<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
  include_once('../../config/db.php');
  include_once('../../model/sanpham.php');

  $db = new db();
  $connect = $db->connect();

  $sanpham = new Sanpham($connect);
  $read = $sanpham->read();
  $num = $read->rowCount();

  if($num>0){
      $sanpham_array= [];
      $sanpham_array['sanpham']= [];
      while($row = $read->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $sanpham_item= array(
            'id_danhmuc' => $Idloai,
            'Tensp' => $Tensp
        

        );  
        array_push($sanpham_array['sanpham'], $sanpham_item);

      }
      echo json_encode($sanpham_array);
  }


?>