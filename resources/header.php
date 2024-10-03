<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:51:49 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="assets/images/Bridge 1.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="assets/css/dark-theme.css" />
  <link rel="stylesheet" href="assets/css/semi-dark.css" />
  <link rel="stylesheet" href="assets/css/header-colors.css" />
  <!-- script to eliminate -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Stone Mansory Arch Bridges Management System</title>
</head>

<body>
  <!--wrapper-->
  <div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="assets/images/bridge 1.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <p class="logo-text"><b>SABMS</b></p>
        </div>
       </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li class="menu-label">Username</li>
        <li>
          <a href="">
            <div class="parent-icon"><i class='bx bx-user'></i>
            </div>
            <div class="menu-title">Mahambazi</div>
          </a>
        </li>
        <li class="menu-label">Home</li>
        <li>
          <a href="index.php?p=home">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li class="menu-label">Maintenance Table</li>
        <li>
          <a href="index.php?p=maintenance">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">Resource Management</div>
          </a>
          <!-- <ul>
            <li> <a href="index.php?p=price"><i class='bx bx-radio-circle'></i>Add Price</a>
            </li>
            <li> <a href="index.php?p=viewPrice"><i class='bx bx-radio-circle'></i>View Price</a>
            </li>
          </ul> -->
        </li>
        <li class="menu-label">Maintenance Strategy</li>
        <li>
          <a href="index.php?p=operation">
            <div class="parent-icon"><i class="bx bx-line-chart"></i>
            </div>
            <div class="menu-title">Maintenance Strategy</div>
          </a>
          <!-- <ul>
            <li> <a href="index.php?p=graph"><i class='bx bx-radio-circle'></i>Graph</a>
            </li>
            </li>
          </ul> -->
        </li>
        <li class="menu-label">Logging out</li>
        <li>
          <a href="index.php">
            <div class="parent-icon"><i class="bx bx-logout"></i>
            </div>
            <div class="menu-title">Sign Out</div>
          </a>
          <!-- <ul>
            <li> <a href="index.php?p=graph"><i class='bx bx-radio-circle'></i>Graph</a>
            </li>
            </li>
          </ul> -->
        </li>         
      </ul>
      <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->

    <!--start header -->
    <header>
      <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
          </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
            <input class="form-control px-5" disabled type="search" placeholder="Search">
            <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">
          </div>
          <div class="user-box dropdown px-3">
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--end header -->