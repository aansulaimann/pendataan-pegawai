<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   if(isset($_POST["tdKontrak"])) {
      if(tambahKontrak($_POST) > 0) {
         flash(true, "Data Berhasil Ditambah");
         header("Location: ". $BASEURL ."/kontrak");
      } else {
         flash(false, "Data Gagal Ditambah");
      }
   }
?>

<!-- ///////// HEADER //////////// -->

<main>
   <section class="tambahDataJabatan">
      <form action="" method="post">
         <div class="container border mt-4 mb-4">
            <h1>Entry data Kontrak Pegawai</h1>
            <div class="mb-3 mt-2">
               <label for="idPegawai" class="form-label">Nama Pegawai</label>
               <div class="row">
                <div class="col col-lg-10">
                    <input type="hidden" class="form-control" id="idPegawai" name="idPegawai" readonly required autocomplete="off">
                    <input type="text" class="form-control" id="nmPegawai" name="nmPegawai" readonly required autocomplete="off">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-secondary shadow" onclick="window.open('dataPegawai.php', 'newwindow', 'width=800, height=600, top=300, left=300', 'titlebar=0');return false; ">Cari ID Pegawai</button>
                </div>
               </div>
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" class="form-control" id="email" name="email" readonly required autocomplete="off">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="noTelp" class="form-label">No Telepon</label>
               <input type="text" class="form-control" id="noTelp" name="noTelp" readonly required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="nmJabatan" class="form-label">Jabatan</label>
               <div class="row">
                <div class="col-10">
                    <input type="hidden" class="form-control d-flex" id="id" name="idJabatan" readonly required autocomplete="off">
                    <input type="text" class="form-control d-flex" id="nmJabatan" name="nmJabatan" readonly required autocomplete="off">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-secondary shadow" onclick="window.open('dataJabatan.php', 'newwindow', 'width=600, height=600, top=300, left=300', 'titlebar=0');return false; ">Cari Jabatan</button>
                </div>
               </div>
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="lmKontrak" class="form-label">Lama Kontrak</label>
               <input type="text" class="form-control" id="lmKontrak" name="lmKontrak" required autocomplete="off">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="awalKontrak" class="form-label">Awal Kontrak</label>
               <input type="date" class="form-control" id="awalKontrak" name="awalKontrak" required autocomplete="off">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="akhirKontrak" class="form-label">Akhir Kontrak</label>
               <input type="date" class="form-control" id="akhirKontrak" name="akhirKontrak" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ml-2" name="tdKontrak">Tambah data Kontrak</button>
            <a href="../kontrak" class="btn btn-outline-primary mb-3 ml-2">Batal</a>
         </div>
      </form>
   </section>
</main>
<script src="script.js"></script>

<!-- ///////// FOOTER //////////// -->