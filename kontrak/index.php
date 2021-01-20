<?php session_start(); require '../header.php'; require '../functions.php';
   
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

   if(isset($_POST["logout"])) {
      logout();
   }

   $kontrak = query("SELECT k.Id, p.namaDepan, p.namaBelakang, k.lama_kontrak, j.nm_jabatan, j.singkatan FROM tb_pegawai p, tb_kontrak k, tb_jabatan j WHERE p.Id=k.id_pegawai and k.id_jabatan=j.Id");

   $jumlahPegawai = query("SELECT COUNT(id) as jumlah FROM tb_kontrak");
?>
<!-- ///////// HEADER //////////// -->

<main>
   <section class="kontrak">
      <div class="row me-0">
      <!-- sidebar -->
         <div class="col col-lg-2 bg-light">
            <div class="card border-0 bg-light">
               <div class="card-body">
                  <ul class="list-group border-0">
                     <li class="list-group-item border-0 bg-light"><h5>Dashboard</h5></li>
                     <li class="list-group-item border-0 bg-light">
                        <div class="dropdown">
                           <a class="btn dropdown-toggle" href="" role="button" id="dropdownMenuLinkMaster" data-bs-toggle="dropdown" aria-expanded="false">
                              Master
                           </a>

                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkMaster">
                              <li><a class="dropdown-item" href="../pegawai">Entry data pegawai</a></li>
                              <li><a class="dropdown-item" href="../jabatan">Entry Jabatan</a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="list-group-item border-0 bg-light">
                        <div class="dropdown ml-4">
                           <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Transaksi
                           </a>

                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="kontrak">Entry data kontrak</a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="list-group-item border-0 bg-light ">
                        <form action="" method="post">                     
                           <button type="submit" class="btn btn-danger" name="logout">Keluar</button>
                        </form>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      <!-- main bar  -->
         <div class="col-12 col-lg">
            <div class="row">
               <div class="col col-lg-8">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb bg-light p-3 rounded mt-2 me-3">
                        <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontrak</li>
                     </ol>
                  </nav>
               </div>
               <div class="col mt-3">
                  <a href="tambah.php" class="btn btn-primary btn-lg shadow">Tambah data Kontrak Pegawai</a>
               </div>
            </div>
            <div class="row me-2">
               <div class="col">
                  <table class="table border">
                     <thead>
                        <tr>
                           <th scope="col">No</th>
                           <th scope="col">Nama Pegawai</th>
                           <th scope="col">Nama Jabatan</th>
                           <th scope="col">Lama Kontrak</th>
                           <th scope="col">Aksi
                              <badge class="badge btn btn-light text-body float-end" onclick="window.location.reload();">refresh</badge>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php $i = 1; foreach($kontrak as $row) : ?>
                        <tr>
                           <th scope="row"><?php echo $i++; ?></th>
                           <td><?php echo $row["namaDepan"] . " "; echo $row["namaBelakang"] . " <b>"; ?></td>
                           <td><?php echo $row["nm_jabatan"] ?></td>
                           <td><?php echo $row["lama_kontrak"]; ?></td>
                           <td>
                              <a href="#" class="badge bg-info me-2 p-2" onclick="window.open('detail.php?id=<?php echo $row['Id']; ?>', 'newwindow', 'width=800,height=380, top=110, left=300', 'titlebar=0'); return false;">detail</a>
                              <a href="delete.php?id=<?php echo $row["Id"]; ?>" onclick="return confirm('yakin hapus data?');" class="badge bg-danger me-2 p-2">delete</a>
                              <a href="#" onclick="window.open('update.php?id=<?php echo $row['Id']; ?>', 'newwindow', 'width=900,height=800, top=300, left=300'); return false;" class="badge bg-success me-2 p-2">update</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>


<!-- ///////// FOOTER //////////// -->
<?php require '../footer.php'; ?>