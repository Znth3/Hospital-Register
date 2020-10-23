<?php
$host = "localhost";
$port = "3307";
$db = "mpsi";
$user = "root";
$pass = "root";
//$dir = "http://localhost/appland/";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn){
}else{
    echo "gagal";
}

lockTable("daftar");
lockTable("jadwal_dokter");
lockTable("jadwal");
lockTable("pasien");
lockTable("regencies");

function lockTable($name){
    global $conn;
    $conn->query("LOCK TABLE ".$name."READ");
    $conn->query("LOCK TABLE ".$name."WRITE");
}