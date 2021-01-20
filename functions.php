<?php 
// connect to db
$conn = mysqli_connect("localhost", "root", "", "pendataanpegawai");
$BASEURL = "http://localhost/pendataan-pegawai";

if(!$conn) {
    die("ERR: DB NOT FOUND..");
}

function login($data) {
    global $conn;

    // var_dump($data); die;
    $email = htmlspecialchars(trim($data["email"]));
    $password = htmlspecialchars(trim($data["password"]));
    // SELECT username, email, password FROM tb_login WHERE email = 'admin@apkpendataan.com' AND password = 'admin123';
    $query = "SELECT username, email, password FROM tb_login WHERE email = '$email' AND password = '$password'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    
}

function logout() {
    session_unset();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: http://localhost/pendataan-pegawai/gate.php");
    exit;
    
    // return true;
}

function flash($bool, $text) {
    if($bool == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                '. $text .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else if($bool == false) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                '. $text .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
    global $conn;
    // var_dump($data);
    // var_dump($_FILES["foto"]);
    // echo $tmpName = $_FILES["foto"]["tmp_name"];
    // die;

    $query = "INSERT INTO tb_pegawai (id, namaDepan, namaBelakang, tmpLahir, jenKel, tglLahir, agama, email, noTelp, alamat, foto)
                VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statment = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statment, "ssssssssss", $namaDepan, $namaBelakang, $tmpLahir, $jenKel, $tglLahir, $agama, $email, $noTelp, $alamat, $gambar);

    $namaDepan = htmlspecialchars(trim($data["namaDepan"]));
    $namaBelakang = htmlspecialchars(trim($data["namaBelakang"]));
    $tmpLahir = htmlspecialchars(trim($data["tmpLahir"]));
    $jenKel = htmlspecialchars(trim($data["flexRadioDefault"]));
    $tglLahir = htmlspecialchars(trim($data["tglLahir"]));
    $agama = htmlspecialchars(trim($data["agama"]));
    $email = htmlspecialchars(trim($data["email"]));
    $noTelp = htmlspecialchars(trim($data["noTelp"]));
    $alamat = htmlspecialchars(trim($data["alamat"]));
    // $foto = htmlspecialchars(trim($data["foto"]));

    $gambar = upload();
    if( !$gambar ){
        return false;
    }

    mysqli_stmt_execute($statment);

    return mysqli_affected_rows($conn);
    mysqli_stmt_close($statment);
    mysqli_close($conn);
}

function tambahJabatan($data) {
    global $conn;

    $query = "INSERT INTO tb_jabatan (Id, nm_jabatan, singkatan) VALUES ('', ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "ss", $nmJabatan, $singkatan);

    $nmJabatan = htmlspecialchars(trim($data["nmJabatan"]));
    $singkatan = htmlspecialchars(trim($data["singkatan"]));

    mysqli_stmt_execute($stmt);
    return mysqli_affected_rows($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function tambahKontrak($data) {
    global $conn;

    $query = "INSERT INTO tb_kontrak (Id, id_pegawai, id_jabatan, lama_kontrak, created_date, awalKontrak, akhirKontrak) 
            VALUES ('', ?, ?, ?, '', ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "sssss", $idPegawai, $idJabatan, $lmKontrak, $awalKontrak, $akhirKontrak);

    $idPegawai = htmlspecialchars(trim($data["idPegawai"]));
    $idJabatan = htmlspecialchars(trim($data["idJabatan"]));
    $lmKontrak = htmlspecialchars(trim($data["lmKontrak"]));
    $awalKontrak = htmlspecialchars(trim($data["awalKontrak"]));
    $akhirKontrak = htmlspecialchars(trim($data["akhirKontrak"]));

    mysqli_stmt_execute($stmt);
    return mysqli_affected_rows($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ){
        echo " <script> alert('Masukan gambar terlebih dahulu'); </script> ";
        return false;
    }
    
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo " <script> alert('Yang anda upload bukan gambar!'); </script> ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 100000 ) {
        echo " <script> alert('ukuran gambar terlalu besar'); </script> ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../public/img/pegawai/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapusJabatan($id) {
    global $conn;

    $query = "DELETE FROM tb_jabatan WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_execute($stmt);

    return mysqli_affected_rows($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function hapusKontrak($id) {
    global $conn;

    $query = "DELETE FROM tb_kontrak WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_execute($stmt);

    return mysqli_affected_rows($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function hapus($id) {
    global $conn;

    $query = "DELETE FROM tb_pegawai WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_affected_rows($conn);
    mysqli_stmt_close($statment);
    mysqli_close($conn);
}

function ubah($data) {
    global $conn;
    // var_dump($data); die;
    // $id = $data['id'];

    // $query = "UPDATE FROM tb_pegawai 
    //             SET namaDepan = '?', namaBelakang = '?', tmpLahir = '?', jenKel = '?', tglLahir = '?', agama = '?', email = '?', noTelp = '?', alamat = '?'
    //             WHERE Id = '?'";

    // $statment = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($statment, "ssssssssss", $namaDepan, $namaBelakang, $tmpLahir, $jenKel, $tglLahir, $agama, $email, $noTelp, $alamat, $id);

    $namaDepan = htmlspecialchars(trim($data["namaDepan"]));
    $namaBelakang = htmlspecialchars(trim($data["namaBelakang"]));
    $tmpLahir = htmlspecialchars(trim($data["tmpLahir"]));
    $jenKel = htmlspecialchars(trim($data["flexRadioDefault"]));
    $tglLahir = htmlspecialchars(trim($data["tglLahir"]));
    $agama = htmlspecialchars(trim($data["agama"]));
    $email = htmlspecialchars(trim($data["email"]));
    $noTelp = htmlspecialchars(trim($data["noTelp"]));
    $alamat = htmlspecialchars(trim($data["alamat"]));
    $fotoLama = htmlspecialchars(trim($data["gambarLama"]));
    $id = $data["id"];

    if($_FILES['foto']['error'] === 4 ){
        $gambar = $fotoLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE tb_pegawai 
               SET namaDepan ='$namaDepan', namaBelakang ='$namaBelakang', tmpLahir ='$tmpLahir', jenKel ='$jenKel', tglLahir ='$tglLahir', agama ='$agama', email ='$email', noTelp ='$noTelp', alamat ='$alamat', foto ='$gambar' WHERE Id = '$id'";

    // mysqli_stmt_execute($statment);
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    // mysqli_stmt_close($statment);
    // mysqli_close($conn);
}

function ubahJabatan($data) {
    global $conn;

    $id = $data["id"];
    $nmJabatan = htmlspecialchars(trim($data["nmJabatan"]));
    $singkatan = htmlspecialchars(trim($data["singkatan"]));

    $query = "UPDATE tb_jabatan
                SET Id = '$id', nm_jabatan = '$nmJabatan', singkatan = '$singkatan' WHERE Id = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahKontrak($data) {
    global $conn;

    $id = $data["idKontrak"];
    $idPegawai = htmlspecialchars(trim($data["idPegawai"]));
    $idJabatan = htmlspecialchars(trim($data["idJabatan"]));
    $lamaKontrak = htmlspecialchars(trim($data["lmKontrak"]));
    $awalKontrak = htmlspecialchars(trim($data["awalKontrak"]));
    $akhirKontrak = htmlspecialchars(trim($data["akhirKontrak"]));

    $query = "UPDATE tb_kontrak SET id_pegawai = '$idPegawai', id_jabatan = '$idJabatan', lama_kontrak = '$lamaKontrak', awalKontrak = '$awalKontrak', akhirKontrak = '$akhirKontrak' WHERE Id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}