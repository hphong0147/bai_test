<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
  include_once('../../config/db.php');
  include_once('../../model/sanpham.php');

  $db = new db();
  $connect = $db->connect();

  $sanpham = new Sanpham($connect);
  //$show = $danhmuc->show();
  $sanpham->Idloai=isset($_GET['id']) ? $_GET['id']: die();
  //$danhmuc->Idsp=isset($_GET['Idsp']) ? $_GET['Idsp'] : die();
  $sanpham->show();
   $sanpham_item= array(
            'id_sanpham' => $sanpham->Idsp,
            'Tensp' => $sanpham->Tensp,
            'urlhinh'=> $sanpham->urlhinh
        

        ); 
   print_r(json_encode($sanpham_item));
?>