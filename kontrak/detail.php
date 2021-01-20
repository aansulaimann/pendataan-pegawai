<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $id = $_GET["id"];

   $detail = query("SELECT p.namaDepan, p.namaBelakang, k.lama_kontrak, j.nm_jabatan, j.singkatan FROM tb_pegawai p, tb_kontrak k, tb_jabatan j WHERE p.Id=k.id_pegawai and k.id_jabatan=j.Id and k.Id = '$id'")[0];
//    var_dump($detail); die;
?>
<!-- ///////// HEADER //////////// -->

<section class="modalDetailPegawai">
      <div class="container">
         <div class="row mb-4">
            <div class="col">
               <h2>Detail Kontrak Pegawai</h2>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col">
               <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="img-thumbnail" alt="404">
            </div>
            <div class="col">
               <ul class="list-group">
                  <li class="list-group-item">
                     <label for="" class="fw-bold">Nama Pegawai : </label>
                     <?php echo $detail["namaDepan"] . " "; echo $detail["namaBelakang"]; ?>
                  </li>
                  <li class="list-group-item">
                     <label for="" class="fw-bold">Nama Jabatan : </label>
                     <?php echo $detail["nm_jabatan"]; ?>
                  </li>
                  <li class="list-group-item">
                     <label for="" class="fw-bold">Singkatan Jabatan : </label>
                     <?php echo $detail["singkatan"]; ?>
                  </li>
                  <li class="list-group-item">
                     <label for="" class="fw-bold">Lama Kontrak : </label>
                     <?php echo $detail["lama_kontrak"]; ?>
                  </li>
                     <button type="button" class="btn btn-primary mt-3" onclick="window.close();">Kembali</button>
               </ul>
            </div>
         </div>
      </div>
</section>