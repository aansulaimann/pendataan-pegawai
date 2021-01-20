<?php session_start(); require '../header.php'; require '../functions.php';
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }
   
   if(isset($_POST["tdPegawai"])) {
      if(tambah($_POST) > 0) {
         flash(true, "Data Berhasil Ditambah");
         header("Location: ". $BASEURL ."/pegawai");
      } else {
         flash(false, "Data Gagal Ditambah");
      }
   }

?>
<!-- ///////// HEADER //////////// -->

<main>
   <section class="tambah">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="container border mt-4 mb-4">
         <h1>Entry data pegawai</h1>
            <div class="mb-3 mt-2">
               <label for="namadepan" class="form-label">Nama depan</label>
               <input type="text" class="form-control" id="namadepan" name="namaDepan" required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="namaBelakang" class="form-label">Nama belakang</label>
               <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="tmpLahir" class="form-label">Tempat lahir</label>
               <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="jenKel">Jenis kelamin</label>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  value="laki-laki">
                  <label class="form-check-label" for="flexRadioDefault1" name="perempuan">
                     Laki-Laki
                  </label>
               </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked  value="perempuan">
                     <label class="form-check-label" for="flexRadioDefault2" name="perempuan">
                        Perermpuan
                     </label>
               </div>
            </div>
            <div class="mb-3">
               <label for="tglLahir" class="form-label">tanggal lahir</label>
               <input type="date" class="form-control" id="tglLahir" name="tglLahir" autocomplete="off">
            </div>
            <div class="mb-3">
            <label for="Agama" class="form-label">Agama</label>
               <select class="form-select" aria-label="Default select example" id="Agama" name="agama">
                  <option selected>Agama : </option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                  <option value="Hindu">Hindu</option>
               </select>
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control" id="email" required autocomplete="off" name="email">
            </div>
            <div class="mb-3">
               <label for="noHp" class="form-label">no telp</label>
               <input type="number" class="form-control" id="noHp" required autocomplete="off" name="noTelp">
            </div>
            <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <textarea class="form-control" id="alamat" rows="3" required name="alamat"></textarea>
            </div>
            <div class="mb-3">
               <label for="foto" class="form-label">Foto</label>
               <input type="file" class="form-label" id="foto" required autocomplete="off" name="foto">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ml-2" name="tdPegawai" value="upload">Tambah data</button>
         </div>
      </form>
   </section>

</main>

<!-- ///////// FOOTER //////////// -->
<?php require '../footer.php'; ?>