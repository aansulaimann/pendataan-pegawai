<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   if(isset($_POST["tdJabatan"])) {
      if(tambahJabatan($_POST) > 0) {
         flash(true, "Data Berhasil Ditambah");
         header("Location: ". $BASEURL ."/jabatan");
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
         <h1>Entry data Jabatan</h1>
            <div class="mb-3 mt-2">
               <label for="nmJabatan" class="form-label">Nama Jabatan</label>
               <input type="text" class="form-control" id="nmJabatan" name="nmJabatan" required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="singkatan" class="form-label">Nama belakang</label>
               <input type="text" class="form-control" id="singkatan" name="singkatan" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ml-2" name="tdJabatan">Tambah data</button>
         </div>
      </form>
   </section>

</main>

<!-- ///////// FOOTER //////////// -->
<?php require '../footer.php'; ?>