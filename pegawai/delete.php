<?php session_start(); require '../functions.php';
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   if(isset($_POST["logout"])) {
      logout();
   }

$id = $_GET["id"];

// var_dump($id); die;

if(hapus($id) > 0) {
    flash(true, "Data Berhasil Dihapus");
    header("Location: ". $BASEURL ."/pegawai");
} else {
    flash(true, "Data Berhasil Dihapus");
}