<?php session_start(); require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

$id = $_GET["id"];

if(hapusJabatan($id) > 0) {
    flash(true, "Data Berhasil Dihapus");
    header("Location: ". $BASEURL ."/jabatan");
} else {
    flash(true, "Data Berhasil Dihapus");
}