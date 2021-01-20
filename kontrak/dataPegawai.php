<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   $pegawai = query("SELECT * FROM tb_pegawai WHERE id NOT IN (SELECT id_pegawai FROM tb_kontrak)");
?>

<section class="container mt-3">
   <div class="row">
      <div class="col">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($pegawai as $row) : ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $row["Id"]; ?></td>
                    <td><?php echo $row["namaDepan"] . " "; echo $row["namaBelakang"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["noTelp"]; ?></td>
                    <td><badge class="badge btn btn-primary p-2" onclick="sendValuePegawai('<?php echo $row['Id']; ?>', '<?php echo $row['namaDepan'] . ' '; echo $row['namaBelakang']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['noTelp']; ?>');">Pilih</td>
                <tr>
            <?php endforeach; ?>
            </tbody>
            </table>
      </div>
   </div>
</section>

<script src="script.js"></script>