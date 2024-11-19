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
			<?php include "sidebar.php" ?>

      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Dashboard</h2>
        <div class="container mt-5 mb-3">
        <div class="row">
    <div class="col-md-4">
        <a href="siswa.php" style="text-decoration: none;">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">Siswa</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="biodata.php" style="text-decoration: none;">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-dribbble"></i> </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">Biodata</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="report.php" style="text-decoration: none;">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-reddit"></i> </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">Report</h3>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>