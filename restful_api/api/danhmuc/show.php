<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
  include_once('../../config/db.php');
  include_once('../../model/danhmuc.php');

  $db = new db();
  $connect = $db->connect();

  $danhmuc = new Danhmuc($connect);
  //$show = $danhmuc->show();
  $danhmuc->Idloai=isset($_GET['id']) ? $_GET['id'] : die();
  $danhmuc->show();
   $danhmuc_item= array(
            'id_danhmuc' => $danhmuc->Idloai,
            'Tensp' => $danhmuc->Tensp
        

        ); 
   print_r(json_encode($danhmuc_item));
?>