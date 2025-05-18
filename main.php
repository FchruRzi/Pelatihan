<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Web App Pelatihan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/mycss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar styles */
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            color: white;
            transition: all 0.3s;
            padding-top: 20px;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin: 2px 0;
            display: flex;
            align-items: center;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .dropdown-menu {
            background-color: #343a40;
            border: none;
            margin-left: 1rem;
            width: 90%;
        }
        
        .sidebar .dropdown-item {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1rem;
        }
        
        .sidebar .dropdown-item:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header {
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .main-content {
            min-height: 100vh;
            padding: 20px;
        }
        
        .user-profile {
            text-align: center;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-profile img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .user-profile p {
            margin: 5px 0;
            font-size: 0.9rem;
        }
        
        .user-profile .btn {
            margin-top: 10px;
        }
        
        /* Additional header styling for inline background image */
        .header-with-bg {
            background-image: url('Assets/REKTORAT.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 30px 0;
        }
        
        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.75);
            z-index: 1;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        /* For mobile: collapse sidebar by default */
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 280px;
                z-index: 1050;
                overflow-y: auto;
            }
            
            .sidebar.show {
                left: 0;
            }
            
            .sidebar-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1040;
                display: none;
            }
            
            .sidebar-backdrop.show {
                display: block;
            }
            
            .content-wrapper {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Updated Header with Background Image -->
    <div class="header-with-bg">
        <div class="header-overlay"></div>
        <div class="header-content text-black text-center">
            <img src="Assets/Logo_Polnes.png" alt="Logo Polnes" style="width:100px; height:135px; margin-bottom: 10px;">
            <h3><em>Politeknik Negeri Samarinda</em></h3>
            <h3><strong>Pelatihan</strong></h3>
            <h5 class="mt-2"><i class="bi bi-geo-alt-fill"></i> Jl. Cipto Mangunkusumo, Samarinda Seberang</h5>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Mobile toggle button -->
            <div class="d-block d-lg-none py-2 px-3 bg-dark">
                <button class="btn btn-light" id="sidebarToggle">
                    <i class="bi bi-list"></i> Menu
                </button>
            </div>
            
            <!-- Sidebar backdrop for mobile -->
            <div class="sidebar-backdrop"></div>
            
            <!-- Sidebar -->
            <div class="col-lg-3 col-xl-2 sidebar" id="sidebar">
                <div class="sidebar-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Menu</h5>
                    <button class="btn btn-link text-light d-block d-lg-none p-0" id="closeSidebar">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="main.php">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                    
                    <!-- Yang mengakses halaman ini hanya admin -->
                    <?php if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == "Admin") { ?>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#masterDataSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-people-fill"></i> Master Data
                        </a>
                        <div class="collapse" id="masterDataSubmenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=owner">
                                        <i class="bi bi-person-fill"></i> Mahasiswa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=kasir">
                                        <i class="bi bi-cash-register"></i> Dosen/Instruktor
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=tenant">
                                        <i class="bi bi-shop"></i> Admin
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    
                    <!-- Yang mengakses halaman ini hanya tenant dan admin -->
                    <?php if (isset($_SESSION['authorized']) && ($_SESSION['authorized'] == "Tenant" || $_SESSION['authorized'] == "Admin")) { ?>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#pemesananSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-bag-fill"></i> Pelatihan
                        </a>
                        <div class="collapse" id="pemesananSubmenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=menu">
                                        <i class="bi bi-card-list"></i> Menu
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=pesanan">
                                        <i class="bi bi-basket-fill"></i> Pesanan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    
                    <!-- Yang mengakses halaman ini hanya kasir dan admin -->
                    <?php if (isset($_SESSION['authorized']) && ($_SESSION['authorized'] == "Kasir" || $_SESSION['authorized'] == "Admin")) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="main.php?p=pembayaran">
                            <i class="bi bi-credit-card-fill"></i> Sertifikat
                        </a>
                    </li>
                    <?php } ?>
                    
                    <!-- Yang mengakses halaman ini hanya tenant, kasir, dan admin -->
                    <?php if (isset($_SESSION['authorized']) && ($_SESSION['authorized'] == "Tenant" || $_SESSION['authorized'] == "Kasir" || $_SESSION['authorized'] == "Admin")) { ?>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#notifikasiSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-bell-fill"></i> Notifikasi
                        </a>
                        <div class="collapse" id="notifikasiSubmenu">
                            <ul class="nav flex-column ms-3">
                                <?php if ($_SESSION['authorized'] == "Kasir" || $_SESSION['authorized'] == "Admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=notifpesanan">
                                        <i class="bi bi-clipboard-check"></i> Pesanan
                                    </a>
                                </li>
                                <?php } ?>
                                
                                <?php if ($_SESSION['authorized'] == "Tenant" || $_SESSION['authorized'] == "Admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="main.php?p=notifpembayaran">
                                        <i class="bi bi-cash"></i> Pembayaran
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    
                    <!-- Yang mengakses halaman ini hanya admin -->
                    <?php if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == "Admin") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="main.php?p=setuser">
                            <i class="bi bi-person-fill-lock"></i> Forum
                        </a>
                    </li>
                    <?php } ?>
                    
                    <!-- Yang mengakses halaman ini semua user -->
                    <?php if (isset($_SESSION['authorized']) && ($_SESSION['authorized'] == "Owner" || $_SESSION['authorized'] == "Kasir" || $_SESSION['authorized'] == "Tenant" || $_SESSION['authorized'] == "Admin")) { ?>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#laporanSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-journals"></i> Laporan
                        </a>
                        <div class="collapse" id="laporanSubmenu">
                            <ul class="nav flex-column ms-3">
                                <?php if ($_SESSION['authorized'] == "Owner"|| $_SESSION['authorized'] == "Tenant" || $_SESSION['authorized'] == "Admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-clipboard-data"></i> Pemesanan
                                    </a>
                                </li>
                                <?php } ?>
                                
                                <?php if ($_SESSION['authorized'] == "Owner" || $_SESSION['authorized'] == "Kasir" || $_SESSION['authorized'] == "Admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-currency-exchange"></i> Transaksi
                                    </a>
                                </li>
                                <?php } ?>
                                
                                <?php if ($_SESSION['authorized'] == "Owner" || $_SESSION['authorized'] == "Admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-cart-check"></i> Penjualan
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#grafikSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="bi bi-bar-chart-line-fill"></i> Grafik
                        </a>
                        <div class="collapse" id="grafikSubmenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-table"></i> Data
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-graph-up"></i> Grafik Mingguan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-graph-up-arrow"></i> Grafik Bulanan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-graph-up"></i> Grafik Tahunan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="main.php?p=usermanual">
                            <i class="bi bi-person-fill-gear"></i> Profile User
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-9 col-xl-10 main-content">
                <div class="container mt-4">
                    <?php
                    $pages_dir = 'pages';
                    if (!empty($_GET['p'])) {
                        $pages = scandir($pages_dir, 0);
                        unset($pages[0], $pages[1]);

                        $p = $_GET['p'];
                        if (in_array($p . '.php', $pages)) {
                            include($pages_dir . '/' . $p . '.php');
                        } else {
                            echo 'Halaman Tidak Ditemukan';
                        }
                    } else {
                        include $pages_dir . '/beranda.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>Copyright Muhammad Nur Fachrurozi - 2024</p>
        </div>
    </footer>

    <!-- JavaScript for sidebar toggling -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebarBackdrop = document.querySelector('.sidebar-backdrop');
            
            // Toggle sidebar on mobile
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.add('show');
                sidebarBackdrop.classList.add('show');
                document.body.style.overflow = 'hidden'; // Prevent scrolling when sidebar is open
            });
            
            // Close sidebar functions
            function closeSidebarFunc() {
                sidebar.classList.remove('show');
                sidebarBackdrop.classList.remove('show');
                document.body.style.overflow = ''; // Re-enable scrolling
            }
            
            // Close sidebar with button
            closeSidebar.addEventListener('click', closeSidebarFunc);
            
            // Close sidebar when clicking backdrop
            sidebarBackdrop.addEventListener('click', closeSidebarFunc);
            
            // Handle dropdown toggles
            const dropdownToggleLinks = document.querySelectorAll('.nav-link.dropdown-toggle');
            dropdownToggleLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetCollapse = document.querySelector(targetId);
                    if (targetCollapse) {
                        // Bootstrap 5 way to toggle collapse
                        const bsCollapse = new bootstrap.Collapse(targetCollapse, {
                            toggle: true
                        });
                    }
                });
            });
            
            // Close other dropdowns when one is opened
            const collapseElements = document.querySelectorAll('.collapse');
            collapseElements.forEach(collapse => {
                collapse.addEventListener('show.bs.collapse', function() {
                    collapseElements.forEach(otherCollapse => {
                        if (otherCollapse !== collapse && otherCollapse.classList.contains('show')) {
                            bootstrap.Collapse.getInstance(otherCollapse).hide();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>