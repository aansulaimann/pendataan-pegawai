<?php session_start(); require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

$id = $_GET["id"];

// var_dump($id); die;

if(hapusKontrak($id) > 0) {
    flash(true, "Data Berhasil Dihapus");
    header("Location: ". $BASEURL ."/kontrak");
} else {
    flash(true, "Data Berhasil Dihapus");
}