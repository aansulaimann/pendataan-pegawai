<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $jabatan = query("SELECT * FROM tb_jabatan");
?>

<section class="container mt-3">
    <div class="row">
      <div class="col">
         <table class="table table-striped">
            <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">ID Jabatan</th>
                     <th scope="col">Nama Jabatan</th>
                     <th scope="col">Aksi</th>
                  </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($jabatan as $row) : ?>
                  <tr>
                     <th scope="row"><?php echo $i++; ?></th>
                     <td><?php echo $row["Id"]; ?></td>
                     <td><?php echo $row["nm_jabatan"]; ?></td>
                     <td><badge class="badge btn btn-primary p-2" onclick="sendValue('<?php echo $row['Id']; ?>', '<?php echo $row['nm_jabatan']; ?>');">Pilih</td>
                  <tr>
            <?php endforeach; ?>
            </tbody>
         </table>
      </div>
    </div>
</section>

<script src="script.js"></script>