<?php 
include "koneksi.php"; 

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
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
            <h2 class="mb-4">Data Siswa</h2>
            <form method="GET" action="" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan NIS atau Nama" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <div class="container mt-5 mb-3">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

                        $query = "SELECT * FROM siswa";
                        if ($search) {
                            $query .= " WHERE NIS LIKE '%$search%' OR nama LIKE '%$search%'";
                        }

                        $result = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['NIS']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['tempat_lahir']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['tanggal_lahir']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['no_telp']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td><img src='uploads/" . htmlspecialchars($row['foto']) . "' alt='Foto' width='50'></td>";
                                echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                echo "<td>
                                        <a href='report_detail.php?id_siswa=" . htmlspecialchars($row['id_siswa']) . "' class='btn btn-warning btn-sm btn-rounded'>Detail</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='text-center'>Tidak ada data</td></tr>";
                        }

                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>