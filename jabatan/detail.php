<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $id = $_GET["id"];

   $detail = query("SELECT * FROM tb_jabatan WHERE Id = '$id'")[0];
?>
<!-- ///////// HEADER //////////// -->

<section class="modalDetailPegawai">
   <div class="container">
      <div class="row mb-4">
         <div class="col">
            <h2>Detail Jabatan</h2>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col">
            <ul class="list-group">
               <li class="list-group-item">
                  <label for="" class="fw-bold">Nama Jabatan : </label>
                  <?php echo $detail["nm_jabatan"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Singkatan Jabatan : </label>
                  <?php echo $detail["singkatan"]; ?>
               </li>
               <button type="button" class="btn btn-primary mt-3" onclick="window.close();">Kembali</button>
            </ul>
         </div>
      </div>
   </div>
</section>