<?php session_start(); require '../header.php'; require '../functions.php';
   if(!isset($_SESSION["login"])) {
      header("Location: ../gate.php");
      exit;
   }

    $id = $_GET["id"];

    $pegawai = query("SELECT * FROM tb_pegawai WHERE id = '$id'")[0];
       
    if(isset($_POST["tdUbahPegawai"])) {
        if(ubah($_POST) > 0) {
        echo "<script>
                    alert('data berhasil diubah');
                    window.close();
                    document.location.href = '../pegawai';
                </script>";
        } else {
            flash(false, "Data Gagal Diubah");
        }
    }
?>
<!-- ///////// HEADER //////////// -->
    <section class="editPegawai">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="container border mt-4 mb-4">
                        <h1>Ubah data pegawai</h1>
                        <input type="hidden" name="id" value="<?php echo $pegawai["Id"]; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
                            <div class="mb-3 mt-2">
                                <label for="namadepan" class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" id="namadepan" name="namaDepan" required autocomplete="off" value="<?php echo $pegawai["namaDepan"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="namaBelakang" class="form-label">Nama belakang</label>
                                <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" required autocomplete="off" value="<?php echo $pegawai["namaBelakang"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tmpLahir" class="form-label">Tempat lahir</label>
                                <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" required autocomplete="off" value="<?php echo $pegawai["tmpLahir"]; ?>">
                            </div>
                            <div class="mb-3">
                            <label for="jenKel">Jenis kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="laki-laki">
                                <label class="form-check-label" for="flexRadioDefault1" name="perempuan">
                                    Laki-Laki
                                </label>
                            </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="perempuan">
                                    <label class="form-check-label" for="flexRadioDefault2" name="perempuan">
                                        Perermpuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tglLahir" class="form-label">tanggal lahir</label>
                                <input type="date" class="form-control" id="tglLahir" name="tglLahir" autocomplete="off" value="<?php echo $pegawai["tglLahir"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example" id="Agama" name="agama">
                                    <option selected><?php echo $pegawai["agama"]; ?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Hindu">Hindu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required autocomplete="off" name="email" value="<?php echo $pegawai["email"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="form-label">no telp</label>
                                <input type="number" class="form-control" id="noHp" required autocomplete="off" name="noTelp" value="<?php echo $pegawai["noTelp"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" required name="alamat"><?php echo $pegawai["alamat"]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <img src="../public/img/pegawai/<?php echo $pegawai["foto"]; ?>" alt="404" width="130px" class="img-thumbnail mb-4">
                                <input type="file" class="form-control" id="foto" rows="3" required name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary mb-3" name="tdUbahPegawai">Ubah data</button>
                            <button type="button" class="btn btn-outline-secondary mb-3 ms-4 text-body" name="tdUbahPegawai" onclick="window.close();">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- ///////// FOOTER //////////// -->
<?php require '../footer.php'; ?>