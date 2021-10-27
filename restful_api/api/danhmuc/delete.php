<?php
    header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: DELETE');
   header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
  include_once('../../config/db.php');
  include_once('../../model/danhmuc.php');

  $db = new db();
  $connect = $db->connect();

  $danhmuc = new Danhmuc($connect);
  $data = json_decode(file_get_contents("php://input"));
  $danhmuc->Idloai = $data->Idloai;

  if($danhmuc->delete()){

  	echo json_encode(array('thong bao'.'da duoc delete'));
  }else{
  	echo json_encode(array('thong bao'.'khong the them delete'));
  }


?>