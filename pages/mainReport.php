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

<!---------------------------------------------------------------------------------------->

				<!-- asset register -->
				<div class="row col-12 col-lg-12">
					
					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5>Maintenance Modules</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
							<hr/>

							<div class="btn-group">
							  <a href="#" id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
      							Maintenance Strategy
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      	<li><a class="dropdown-item" href="index.php?p=addMainStrat">Add</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewMainstrat">View</a></li>
						      </ul>
						      <a href="#" id="btnGroupDrop3" type="button" class="btn btn-primary dropdown-toggle active" data-bs-toggle="dropdown" aria-expanded="false">
      							Asset Register
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop3">
						      	<li><a class="dropdown-item" href="index.php?p=asset">Add Asset</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewAsset">Registered asset</a></li>
						      </ul>
							  <a href="#" id="btnGroupDrop4" type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
      							Workorder Management
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						      	<li><a class="dropdown-item" href="index.php?p=workorder">Create Workorder</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewOrder">View Workorder</a></li>
						      </ul>
							  <a href="#" id="btnGroupDrop4" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      							Resource Management
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						      	<li><a class="dropdown-item" href="index.php?p=resource">Add Person</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewResource">View Person</a></li>
						      </ul>
							  <a href="#" class="btn btn-primary">Spareparts</a>
							  <a href="#" id="btnGroupDrop4" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      							Reporting
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						      	<li><a class="dropdown-item" href="index.php?p=subOption">Maintenance Report</a></li>
						      	<li><a class="dropdown-item" href="">Emergency Report</a></li>
						      </ul>
							</div>
							<hr/>

							<form class="row g-3 pt-5" id="addAsset" method="POST" action="index.php?p=insertMainReport">
										<div class="col-md-6">
											<label for="input2" class="form-label">Feeder Name</label>
											<input type="text" class="form-control" name="feeder" id="feeder" placeholder="feeder name" required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">Maintenance Date</label>
											<input type="date" class="form-control" name="tarehe" id="tarehe" placeholder="pole type" required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">Area</label>
											<input type="text" class="form-control" name="area" id="area" placeholder="area nam" required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">No.of MV pole Replaced</label>
											<input type="number" class="form-control" name="pole" id="pole"  required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">No.of MV wooden Pole Uprooted</label>
											<input type="number" class="form-control" name="woodPole" id="woodPole" required>
										</div>
										<div class="col-md-6">
											<label for="input1" class="form-label">No Insulator replaced</label>
											<select class="form-select" name="ins" id="ins" required>
												<option selected>Choose...</option>
												<option value="Polymeric">Polymeric</option>
												<option value="Strain">Strain</option>
												<option value="Pin">Pin</option>
											</select>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">Tree Cutting span</label>
											<input type="text" class="form-control" name="tree" id="tree" required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">Supervisor Name</label>
											<input type="text" class="form-control" name="super" id="super" required>
										</div>
										<div class="col-md-6">
											<label for="input2" class="form-label">Engineer Name</label>
											<input type="text" class="form-control" name="eng" id="eng" required>
										</div>
										<div class="col-md-12">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Submit</button>
												<a type="button" href="index.php?p=maintenance" class="btn btn-light px-4">Cancel</a>
											</div>
										</div>
									</form>

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