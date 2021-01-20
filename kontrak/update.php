<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   if(isset($_POST["udKontrak"])) {
      if(ubahKontrak($_POST) > 0) {
      echo "<script>window.close(); window.location.href = '../kontrak';</script>";
      } else {
         flash(false, "Data Gagal Diubah");
      }
   }

   $id = $_GET["id"];
   $kontrak = query("SELECT p.namaDepan, p.namaBelakang, p.email, p.noTelp, k.Id, k.id_pegawai, k.id_jabatan, k.awalKontrak, k.akhirKontrak, k.lama_kontrak, j.nm_jabatan FROM tb_pegawai p, tb_kontrak k, tb_jabatan j WHERE p.Id=k.id_pegawai and k.id_jabatan=j.Id and k.Id = '$id'")[0];
    // var_dump($kontrak); die;
?>

<!-- ///////// HEADER //////////// -->

<main>
   <section class="tambahDataJabatan">
      <form action="" method="post">
         <div class="container border mt-4 mb-4">
         <h1>Ubah data Kontrak Pegawai</h1>
            <div class="mb-3 mt-2">
               <label for="idPegawai" class="form-label">Nama Pegawai</label>
               <div class="row">
                <div class="col col-lg-11">
                    <input type="hidden" class="form-control" id="idKontrak" name="idKontrak" readonly required autocomplete="off" value="<?php echo $kontrak["Id"]; ?>">
                    <input type="hidden" class="form-control" id="idPegawai" name="idPegawai" readonly required autocomplete="off" value="<?php echo $kontrak["id_pegawai"]; ?>">
                    <input type="text" class="form-control" id="nmPegawai" name="nmPegawai" readonly required autocomplete="off" value="<?php echo $kontrak["namaDepan"] . " "; echo $kontrak["namaBelakang"]; ?>">
                </div>
               </div>
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" class="form-control" id="email" name="email" readonly required autocomplete="off" value="<?php echo $kontrak["email"]; ?>">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="noTelp" class="form-label">No Telepon</label>
               <input type="text" class="form-control" id="noTelp" name="noTelp" readonly required autocomplete="off" value="<?php echo $kontrak["noTelp"]; ?>">
            </div>
            <div class="mb-3">
               <label for="nmJabatan" class="form-label">Jabatan</label>
               <div class="row">
                <div class="col col-lg-10">
                    <input type="hidden" class="form-control d-flex" id="id" name="idJabatan" readonly required autocomplete="off" value="<?php echo $kontrak["id_jabatan"]; ?>">
                    <input type="text" class="form-control d-flex" id="nmJabatan" name="nmJabatan" readonly required autocomplete="off" value="<?php echo $kontrak["nm_jabatan"]; ?>">
                </div>
               </div>
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="lmKontrak" class="form-label">Lama Kontrak</label>
               <input type="text" class="form-control" id="lmKontrak" name="lmKontrak" required autocomplete="off" value="<?php echo $kontrak["lama_kontrak"]; ?>">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="awalKontrak" class="form-label">Awal Kontrak</label>
               <input type="date" class="form-control" id="awalKontrak" name="awalKontrak" required autocomplete="off" value="<?php echo $kontrak["awalKontrak"]; ?>">
            </div>
            <div class="col col-lg-10 mb-3">
               <label for="akhirKontrak" class="form-label">Akhir Kontrak</label>
               <input type="date" class="form-control" id="akhirKontrak" name="akhirKontrak" required autocomplete="off" value="<?php echo $kontrak["akhirKontrak"]; ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ml-2" name="udKontrak">Ubah data Kontrak</button>
            <button type="button" onclick="window.close();" class="btn btn-outline-primary mb-3 ml-2">Batal</button>
         </div>
      </form>
   </section>

</main>
<script src="script.js"></script>

<!-- ///////// FOOTER //////////// -->