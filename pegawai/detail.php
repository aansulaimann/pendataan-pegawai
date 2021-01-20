<?php session_start(); require '../header.php'; require '../functions.php';
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $id = $_GET["id"];

   $detail = query("SELECT * FROM tb_pegawai WHERE Id = '$id'")[0];
?>
<!-- ///////// HEADER //////////// -->

<section class="modalDetailPegawai">
   <div class="container">
      <div class="row">
         <div class="col">
            <h2>Detail Pegawai</h2>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <img src="../public/img/pegawai/<?php echo $detail["foto"]; ?>" class="img-thumbnail" alt="404">
         </div>
         <div class="col">
            <ul class="list-group">
               <li class="list-group-item">
                  <label for="" class="fw-bold">Nama : </label>
                  <?php echo $detail["namaDepan"] . " "; echo $detail["namaBelakang"];  ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Tempat lahir : </label>
                  <?php echo $detail["tmpLahir"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Jenis kelamin : </label>
                  <?php echo $detail["jenKel"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Tanggal Lahir : </label>
                  <?php echo $detail["tglLahir"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Agama : </label>
                  <?php echo $detail["agama"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Email : </label>
                  <?php echo $detail["email"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">No Telp : </label>
                  <?php echo $detail["noTelp"]; ?>
               </li>
               <li class="list-group-item">
                  <label for="" class="fw-bold">Alamat : </label>
                  <?php echo $detail["alamat"]; ?>
               </li>
                  <button type="button" class="btn btn-primary mt-3" onclick="window.close();">Kembali</button>
            </ul>
         </div>
      </div>
   </div>
</section>