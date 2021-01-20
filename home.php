<?php session_start(); require 'header.php'; require 'functions.php';
   if(!isset($_SESSION["login"])) {
      header("Location: gate.php");
      exit;
   }

   if(isset($_POST["logout"])) {
      logout();
   }

   $pegawai = query("SELECT * FROM tb_pegawai WHERE id BETWEEN 1 AND 5");
   $jabatan = query("SELECT * FROM tb_jabatan WHERE id BETWEEN 1 AND 5");
   $kontrak = query("SELECT p.namaDepan, p.namaBelakang, k.Id, k.lama_kontrak, j.nm_jabatan, j.singkatan FROM tb_pegawai p, tb_kontrak k, tb_jabatan j WHERE p.Id=k.id_pegawai and k.id_jabatan=j.Id");

   $jumlahPegawai = query("SELECT COUNT(id) as jumlah FROM tb_pegawai");
   $jumlahJabatan = query("SELECT COUNT(id) as jumlah FROM tb_jabatan");
   $jumlahKontrak = query("SELECT COUNT(id) as jumlah FROM tb_kontrak");
?>

<!-- ///////// HEADER //////////// -->

<main>
   <section class="home">
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
                              <li><a class="dropdown-item" href="<?php $BASEURL; ?>pegawai">Entry data pegawai</a></li>
                              <li><a class="dropdown-item" href="jabatan">Entry Jabatan</a></li>
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
                     <li class="list-group-item border-0 bg-light">
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
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-light p-3 rounded mt-2 me-3">
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Overview</li>
               </ol>
            </nav>
            <div class="row me-2">
               <div class="col">
                  <div class="card bg-primary">
                     <div class="card-body">
                        <h5 class="text-white"><?php echo $jumlahPegawai[0]["jumlah"]; ?> Pegawai</h5>
                        <hr>
                        <a href="pegawai" class="text-white">View Details</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card bg-success">
                     <div class="card-body">
                        <h5 class="text-white"><?php echo $jumlahJabatan[0]["jumlah"]; ?> Jabatan</h5>
                        <hr>
                        <a href="jabatan" class="text-white">View Details</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card bg-warning">
                     <div class="card-body">
                        <h5 class="text-white"><?php echo $jumlahKontrak[0]["jumlah"]; ?> Kontrak</h5>
                        <hr>
                        <a href="kontrak" class="text-white">View Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row me-2 mt-4 mb-4">
               <div class="col">
                  <ul class="list-group">
                     <li class="list-group-item bg-light fw-bold">Data Pegawai</li>
                     <?php foreach($pegawai as $row) : ?>
                     <li class="list-group-item">
                        <?php echo $row["namaDepan"] . " "; echo $row["namaBelakang"]; ?>
                        <a href=""  onclick="window.open('pegawai/detail.php?id=<?php echo $row['Id']; ?>', 'newwindow', 'width=600,height=600, top=300, left=300', 'titlebar=0'); return false;" class="badge bg-success float-end mx-2 p-2">detail</a>
                     </li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div> 
            <div class="row me-2 mt-4 mb-4">
               <div class="col">
                  <ul class="list-group">
                     <li class="list-group-item bg-light fw-bold">Data Jabatan</li>
                     <?php foreach($jabatan as $j) : ?>
                        <li class="list-group-item">
                        <?php echo $j["nm_jabatan"]; ?>
                           <a href="" onclick="window.open('jabatan/detail.php?id=<?php echo $j['Id']; ?>', 'newwindow', 'width=600,height=600, top=300, left=300', 'titlebar=0'); return false;" class="badge bg-success float-end mx-2 p-2">detail</a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div> 
            <div class="row me-2 mt-4 mb-4">
               <div class="col">
                  <ul class="list-group">
                     <li class="list-group-item bg-light fw-bold">Data Kontrak Pegawai</li>
                     <?php foreach($kontrak as $k) : ?>
                        <li class="list-group-item">
                        <?php echo $k["namaDepan"] . " "; echo $k["nm_jabatan"] . " "; echo $k["lama_kontrak"]; ?>
                           <a href="" onclick="window.open('kontrak/detail.php?id=<?php echo $k['Id']; ?>', 'newwindow', 'width=600,height=600, top=300, left=300', 'titlebar=0'); return false;" class="badge bg-success float-end mx-2 p-2">detail</a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div> 
         </div>
      </div>
   </section>
</main>

<!-- ///////// FOOTER //////////// -->
<?php require 'footer.php'; ?>