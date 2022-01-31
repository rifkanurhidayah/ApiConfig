<?php

include "../config/koneksi.php";

$Nama_Pengunjung = @$_POST['Nama_Pengunjung'];
$Jenis_Kelamin = @$_POST ['Jenis_Kelamin'];

$data = [];

$query = mysqli_query($kon, "INSERT INTO `datapengunjung`
( `Nama_Pengunjung` , 
  `Jenis_Kelamin` )
  VALUES
  ('". $Nama_Pengunjung ."',
  '". $Jenis_Kelamin ."')");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
}else{
    $status = false;
    $pesan = "request failed";
}

$json = [
  "status" => $status,
  "pesan" => $pesan,
  "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>