<?php
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

if (!isset($_GET['id_siswa']) || empty($_GET['id_siswa'])) {
    echo "Invalid request.";
    exit;
}

$id_siswa = $_GET['id_siswa'];

$query = "SELECT * FROM siswa WHERE id_siswa = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_siswa);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data_siswa = mysqli_fetch_assoc($result);

if (!$data_siswa) {
    echo "Data siswa tidak ditemukan.";
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Detail Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Siswa</h2>
        <button class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="printDiv('printArea')">
                Print Data
            </button>
            <div id="printArea" class="pt-3">
        <table class="table table-bordered">
            <tr>
                <th>NIS</th>
                <td><?php echo htmlspecialchars($data_siswa['NIS']); ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo htmlspecialchars($data_siswa['nama']); ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?php echo htmlspecialchars($data_siswa['tempat_lahir']); ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo htmlspecialchars($data_siswa['tanggal_lahir']); ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?php echo htmlspecialchars($data_siswa['kelas']); ?></td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <td><?php echo htmlspecialchars($data_siswa['no_telp']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($data_siswa['email']); ?></td>
            </tr>
            <tr>
                <th>Foto</th>
                <td><img src="uploads/<?php echo htmlspecialchars($data_siswa['foto']); ?>" alt="Foto Siswa" width="100"></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo htmlspecialchars($data_siswa['jenis_kelamin']); ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo htmlspecialchars($data_siswa['alamat']); ?></td>
            </tr>
        </table>
        </div>
        <a href="report.php" class="btn btn-primary">Kembali</a>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>