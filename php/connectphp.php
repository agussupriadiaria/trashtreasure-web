<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "bukutamu";

$db = mysqli_connect ($hostname,$username, $password, $databasename);

if($db-> connect_error){
    echo "koneksi database error";
    die("error");
}
// echo "Koneksi berhasil";
?>