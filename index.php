<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Barang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .navbar-text {
            color: black;
            /* Set text color to black */
        }

        nav.centered-nav {
            background-color: #f8f9fa;
            /* Light background color */
            padding: 10px;
            /* Padding for better spacing */
            text-align: center;
        }

        .sidebar-brand-text,
        .nav-link span {
            color: #fff;
            /* Sidebar brand text color and Nav link text color */
        }

        .btn-primary,
        .btn-warning,
        .btn-danger {
            margin: 5px;
            /* Add some margin for better spacing */
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Input Barang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <span>Input Barang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="masuk.php">
                    <span>Barang Masuk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="keluar.php">
                    <span>Barang Keluar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="centered-nav">

                </nav>

                <!-- Page Content -->
                <div class="container-fluid">
                    <!-- Buttons -->
                    <div class="mb-4">
                        <button class="btn btn-primary" onclick="window.location.href='tambah.php'">Tambah Barang</button>
                    </div>

                    <!-- Content for "Tambah Barang" -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Vendor</th>
                                            <th>Tipe Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Harga</th>
                                            <th>Edit Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM barang");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['position'] . "</td>";
                                            echo "<td>" . $row['office'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['start_date'] . "</td>";
                                            echo "<td>" . $row['salary'] . "</td>";
                                            echo "<td>
                                                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                                                    <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Hapus</a>
                                                    <a href='keluar_barang.php?id=" . $row['id'] . "' class='btn btn-primary' onclick='return confirm(\"Are you sure you want to move this item to Barang Keluar?\")'>Keluar</a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content for "Edit Barang" -->


                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

<tbody>
    <?php
    $result = $conn->query("SELECT * FROM barang");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['position']) . "</td>";
        echo "<td>" . htmlspecialchars($row['office']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
        echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Edit</a></td>';
        echo "</tr>";
    }
    ?>
</tbody>

</html>
