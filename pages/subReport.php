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
									<h5>Maintenance Management</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
							<hr/>

							<div class="btn">
							  <a href="#" id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle active" data-bs-toggle="dropdown" aria-expanded="false">
      							Personnel
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      	<li><a class="dropdown-item" href="index.php?p=resource">Add</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewResource">View</a></li>
						      </ul>
						      <a href="#" id="btnGroupDrop3" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      							Equipments & Tools
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop3">
						      	<li><a class="dropdown-item" href="index.php?p=asset">Add</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewAsset">view</a></li>
						      </ul>
							  <a href="#" id="btnGroupDrop4" type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
      							Bridges
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						      	<li><a class="dropdown-item" href="index.php?p=workorder">add </a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewOrder">View</a></li>
						      </ul>
						      <!--
							  <a href="#" id="btnGroupDrop4" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      							Resource Management
      						  </a>
							  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop4">
						      	<li><a class="dropdown-item" href="index.php?p=resource">Add Person</a></li>
						      	<li><a class="dropdown-item" href="index.php?p=viewResource">View Person</a></li>
						      </ul> -->
							  <a href="index.php?p=subReport" id="btnReport" type="button" class="btn btn-warning">
      							Performance Monitoring
      						  </a>
							</div>
							<hr/>

							
						<!-------------------------------------------------------------------->
						 <section class="section">
						      <div class="row">

						        <div class="col-lg-6">
						          <div class="card">
						            <div class="card-body">
						              <h5 class="card-title">Personnel</h5>

						              <!-- Line Chart -->
						              <canvas id="lineChart" style="max-height: 400px;"></canvas>
						              <script>
						                document.addEventListener("DOMContentLoaded", () => {
						                  new Chart(document.querySelector('#lineChart'), {
						                    type: 'line',
						                    data: {
						                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
						                      datasets: [{
						                        label: 'Labours',
						                        data: [65, 59, 80, 81, 56, 55, 40],
						                        fill: false,
						                        borderColor: 'rgb(75, 192, 192)',
						                        tension: 0.1
						                      }]
						                    },
						                    options: {
						                      scales: {
						                        y: {
						                          beginAtZero: true
						                        }
						                      }
						                    }
						                  });
						                });
						              </script>
						              <!-- End Line CHart -->

						            </div>
						          </div>
						        </div>

						        <div class="col-lg-6">
						          <div class="card">
						            <div class="card-body">
						              <h5 class="card-title">Equipment & Tools</h5>

						              <!-- Bar Chart -->
						              <canvas id="barChart" style="max-height: 400px;"></canvas>
						              <script>
						                document.addEventListener("DOMContentLoaded", () => {
						                  new Chart(document.querySelector('#barChart'), {
						                    type: 'bar',
						                    data: {
						                      labels: ['Excavator', 'Bulldozers', 'Skid loaders', 'Backhoes', 'Cranes', 'Aerial lifts', 'Beam launchers'],
						                      datasets: [{
						                        label: 'Equipment & Tools',
						                        data: [65, 59, 80, 81, 56, 55, 40],
						                        backgroundColor: [
						                          'rgba(255, 99, 132, 0.2)',
						                          'rgba(255, 159, 64, 0.2)',
						                          'rgba(255, 205, 86, 0.2)',
						                          'rgba(75, 192, 192, 0.2)',
						                          'rgba(54, 162, 235, 0.2)',
						                          'rgba(153, 102, 255, 0.2)',
						                          'rgba(201, 203, 207, 0.2)'
						                        ],
						                        borderColor: [
						                          'rgb(255, 99, 132)',
						                          'rgb(255, 159, 64)',
						                          'rgb(255, 205, 86)',
						                          'rgb(75, 192, 192)',
						                          'rgb(54, 162, 235)',
						                          'rgb(153, 102, 255)',
						                          'rgb(201, 203, 207)'
						                        ],
						                        borderWidth: 1
						                      }]
						                    },
						                    options: {
						                      scales: {
						                        y: {
						                          beginAtZero: true
						                        }
						                      }
						                    }
						                  });
						                });
						              </script>
						              <!-- End Bar CHart -->

						            </div>
						          </div>
						        </div>
						     </div>

						</section>


						<!----------------------------------------------------------------------->


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