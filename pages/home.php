<?php
require("resources/header.php");
?>
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

					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!-- <div class="card shadow-none bg-transparent">
					<div class="card-header py-3">
						<div class="row align-items-center">
							<div class="col-md-3">
								<h4 class="mb-3 mb-md-0">Overview</h4>
							</div>
							<div class="col-md-9">
								<form class="float-md-end">
									<div class="row row-cols-md-auto g-lg-3">
										<label for="inputFromDate" class="col-md-2 col-form-label text-md-end">From Date</label>
										<div class="col-md-4">
											<input type="date" class="form-control" id="inputFromDate">
										</div>
										<label for="inputToDate" class="col-md-2 col-form-label text-md-end">To Date</label>
										<div class="col-md-4">
											<input type="date" class="form-control" id="inputToDate">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div id="chart1"></div>
					</div>
					<div class="card">
						<div class="card-body">
							<div id="world-map-markers" style="height: 300px"></div>
						</div>
					</div>
				</div> -->



<!---------------------------------------------------------------------------------------->



				<div class="row">
					<div class="col-md-4">
						<div class="card radius-10 bg-primary">
							<div class="card-body ">
								<div class="d-flex align-items-center">
									<div>
										<h4 class="mb-0 pb-3">Human Resources</h4>
										<h4 class="text-white">70%</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>Today <?php echo date("Y-m-d"); ?></p> -->
									</div>
									<!-- <div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-group'></i>
									</div> -->
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card radius-10 bg-success">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h4 class="mb-0 pb-3">Equipments</h4>
										<h4 class="text-white">90%</h4>
										<!-- <p class="mb-0 font-13 text-primary"><i class='bx bxs-down-arrow align-middle'></i>Today <?php echo date("Y-m-d"); ?></p> -->
									</div>
									<!-- <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group'></i>
									</div> -->
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card radius-10 bg-warning">
							<div class="card-body ">
								<div class="d-flex align-items-center">
									<div>
										<h4 class="mb-0 pb-3">Budget</h4>
										<h4 class="text-white">80%</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>Today <?php echo date("Y-m-d"); ?></p> -->
									</div>
									<!-- <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group'></i>
									</div> -->
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<!--end row-->


				<div class="row col-12 col-lg-12">
					
					<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Bridge in Construction</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="row table-responsive">
							<table class="table align-middle mb-0">

								<div class="col-md-4">
									<div class="card radius-10">
										<div class="card-body ">
											<div class="d-flex align-items-center">
												<img src="assets/images/gallery/b2.jpeg">
											</div>
											
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="card radius-10 ">
										<div class="card-body ">
											<div class="d-flex align-items-center">
												<img src="assets/images/gallery/b1.jpeg">
											</div>
											
										</div>
									</div>
								</div>

							</table>
						</div>
					</div>
				</div>

					
				</div>
				<!--end row-->




<!---------------------------------------------------------------------------------------------------->


				
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	
	</div>
	<!--end wrapper-->


	<!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- highcharts js -->
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<!-- map -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
	<script src="assets/plugins/vectormap/jvectormap.custom.js"></script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:52:27 GMT -->
</html>

<?php 

require("resources/footer.php");

?>