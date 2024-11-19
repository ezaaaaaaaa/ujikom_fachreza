<?php
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

$id_siswa = $_GET['id_siswa'];

// Fetch the existing data of the selected student
$query = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update student data
    $nis = $_POST['NIS'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $updateQuery = "UPDATE siswa SET NIS='$nis', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', kelas='$kelas', no_telp='$no_telp', email='$email', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id_siswa='$id_siswa'";
    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: siswa.php");
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Edit Data Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php include "sidebar.php"; ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Edit Data Siswa</h2>
            <div class="container mt-5 mb-3">
                <form method="POST">
                    <div class="form-group mb-3">
                        <label>NIS</label>
                        <input type="text" name="NIS" class="form-control" value="<?php echo htmlspecialchars($row['NIS']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo htmlspecialchars($row['tempat_lahir']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo htmlspecialchars($row['tanggal_lahir']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="<?php echo htmlspecialchars($row['kelas']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control" value="<?php echo htmlspecialchars($row['no_telp']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki" <?php if($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required><?php echo htmlspecialchars($row['alamat']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="siswa.php" class="btn btn-secondary">Cancel</a>
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