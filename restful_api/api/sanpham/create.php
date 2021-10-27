<?php
    header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
  include_once('../../config/db.php');
  include_once('../../model/sanpham.php');

  $db = new db();
  $connect = $db->connect();

  $sanpham = new Sanpham($connect);
  $data = json_decode(file_get_contents("php://input"));
  $sanpham->Tensp = $data->Tensp;
  $sanpham->urlhinh = $data->urlhinh;

  if($sanpham->create()){

  	echo json_encode(array('thong bao'.'da duoc theem vao'));
  }else{
  	echo json_encode(array('thong bao'.'khong the them vao'));
  }


?>