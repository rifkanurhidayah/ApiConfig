<?php

include "../config/koneksi.php";

$id = @$_POST['id'];
$Nama_Pengunjung = @$_POST['Nama_Pengunjung'];
$Jenis_kelamin = @$_POST['Jenis_kelamin'];

$data = [];

$query = mysqli_query($kon, "UPDATE `datapengunjung`
SET `Nama_Pengunjung` ='". $Nama_Pengunjung ."',
`Jenis_kelamin`  = '". $Jenis_kelamin ."'
WHERE `id` ='". $id ."'");

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