<?php 
include "koneksi.php"; 

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $kelas = $_POST['kelas'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $jk = $_POST['jk'] == '1' ? 'Laki-laki' : 'Perempuan';
    $alamat = $_POST['alamat'];

    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($foto_tmp, $target_dir . $foto)) {
        $query = "INSERT INTO siswa (NIS, nama, tempat_lahir, tanggal_lahir, kelas, no_telp, email, foto, jenis_kelamin, alamat) 
                  VALUES ('$nis', '$nama', '$tempat', '$tanggal', '$kelas', '$no_telp', '$email', '$foto', '$jk', '$alamat')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil disimpan!');</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload foto');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Aplikasi Biodata</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php include "sidebar.php"; ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Biodata</h2>
            <div class="container mt-5 mb-3">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="nis">NIS</label>
                                <input type="text" id="nis" class="form-control" placeholder="Masukan NIS anda" name="nis" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukan Nama anda" name="nama" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="tempat">Tempat Lahir</label>
                        <input type="text" id="tempat" class="form-control" placeholder="Masukan Tempat Lahir anda" name="tempat" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="tanggal">Tanggal Lahir</label>
                        <input type="date" id="tanggal" class="form-control" name="tanggal" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="kelas">Kelas</label>
                        <input type="text" id="kelas" class="form-control" placeholder="Masukan Kelas anda" name="kelas" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="no_telp">No. Telepon</label>
                        <input type="number" id="no_telp" class="form-control" placeholder="Masukan No. Telepon Anda" name="no_telp" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Masukan email anda" name="email" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="file" id="foto" class="form-control" name="foto" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="jk">Jenis Kelamin</label>
                        <select class="form-select w-100" id="jk" name="jk" required>
                            <option value="" selected>Pilih Jenis Kelamin Anda</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="4" name="alamat" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-block mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>