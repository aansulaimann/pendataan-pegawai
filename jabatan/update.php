<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $id = $_GET["id"];
   $data = query("SELECT * FROM tb_jabatan WHERE Id = '$id'")[0];

    if(isset($_POST["tdUbahJabatan"])) {
      if(ubahJabatan($_POST) > 0) {
         echo "<script>window.close();</script>";
         
      } else {
         flash(false, "Data Gagal Diubah");
      }
   }
?>

<!-- ///////// HEADER //////////// -->

<main>
   <section class="ubahDataJabatan">
      <form action="" method="post">
         <div class="container border mt-4 mb-4">
            <h1>Ubah data Jabatan</h1>
            <div class="mb-3 mt-2">
               <input type="hidden" name="id" value="<?php echo $data['Id']; ?>">
               <label for="nmJabatan" class="form-label">Nama Jabatan</label>
               <input type="text" class="form-control" id="nmJabatan" name="nmJabatan" value="<?php echo $data["nm_jabatan"] ?>" required autocomplete="off">
            </div>
            <div class="mb-3">
               <label for="singkatan" class="form-label">Singkatan Jabatan</label>
               <input type="text" class="form-control" id="singkatan" name="singkatan" value="<?php echo $data['singkatan']; ?>" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ml-2" name="tdUbahJabatan">ubah data</button>
         </div>
      </form>
   </section>

</main>

<!-- ///////// FOOTER //////////// -->
<?php require '../footer.php'; ?>