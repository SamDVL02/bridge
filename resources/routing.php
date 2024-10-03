<?php 
	
	if(isset($_GET["p"]))
	{
		$page=$_GET["p"];

			if($page=="signup"){
				$main_page="pages/signup.php";			
	 		
	 		}elseif ($page=="home") {
	 			$main_page="pages/home.php";

	 		}elseif ($page=="price") {
	 			$main_page="pages/price.php"; 

	 		}elseif ($page=="viewPrice") {
	 			$main_page="pages/viewPrice.php";

	 		}elseif ($page=="maintenance") {
	 			$main_page="pages/maintenance.php";

	 		}elseif ($page=="asset") {
	 			$main_page="pages/asset-register.php";

	 		}elseif ($page=="graph") {
	 			$main_page="pages/graph.php";

	 		}elseif ($page=="resource") {
	 			$main_page="pages/resource.php";

	 		}elseif ($page=="addMainStrat") {
	 			$main_page="pages/addMaint.php";

	 		}elseif ($page=="sub") {
	 			$main_page="pages/sub.php";

	 		}elseif ($page=="workorder") {
	 			$main_page="pages/workorder.php";

	 		}elseif ($page=="operation") {
	 			$main_page="pages/operation.php";

	 		}elseif ($page=="subOption") {
	 			$main_page="pages/subOption.php";

	 		}elseif ($page=="addShift") {
	 			$main_page="pages/shift.php";

	 		}elseif ($page=="outage") {
	 			$main_page="pages/outage.php";

	 		}elseif ($page=="mainReport") {
	 			$main_page="pages/mainReport.php"; 

	 		}elseif ($page=="subReport") {
	 			$main_page="pages/subReport.php";

	 	 	}elseif ($page=="lvReport") {
	 			$main_page="pages/lvMainReport.php";

	 	 	}elseif ($page=="viewAsset") {
	 			$main_page="pages/viewAsset.php";

	 		}elseif ($page=="viewOrder") {
	 			$main_page="pages/viewWorkorder.php";

	 		}elseif ($page=="viewShift") {
	 			$main_page="pages/viewShift.php";

	 		}elseif ($page=="viewOutage") {
	 			$main_page="pages/viewOutage.php";

	 		}elseif ($page=="viewMainstrat") {
	 			$main_page="pages/viewMainstrat.php";

	 		}elseif ($page=="viewResource") {
	 			$main_page="pages/viewResource.php";

	 		}elseif ($page=="viewSub") {
	 			$main_page="pages/viewSub.php";

	 		}elseif ($page=="alarm") {
	 			$main_page="pages/alarm.php";

	 		}elseif ($page=="viewMainReport") {
	 			$main_page="pages/viewMainReport.php";


	 		}elseif ($page=="viewLvReport") {
	 			$main_page="pages/viewLvReport.php";

	 		}elseif ($page=="register") {

 					$Username = $_POST["inputUsername"];
					$Email = $_POST["inputEmailAddress"];
					$Password = $_POST["inputChoosePassword"];
					$Cpassword = $_POST["inputConfirmPassword"];

					if($Password == $Cpassword){

						$Fpassword = md5($Password);
		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");
						$sql = "INSERT INTO users (user_id, username, email, password) VALUES(null,'".$Username."','".$Email."','".$Fpassword."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php';</script>";
								
						}//end of result

					}else{

						print "<script>alert('The password are not matched');location.href='index.php?p=signup';</script>";

					}//end of else of register 

	 		}elseif ($page=="login") {
	 			
	 			// $Email = $_POST["inputEmailAddress"];
				$Email = "fred@gmail.com";
				$Password = '$2y$10$jYk13cluQor4wcGMiBmgo.onkGpIxcmtoF00sV.2iE5vLboqil6ai';

	 			$conn = new mysqli($servername, $username, $password);	
				mysqli_select_db($conn,"maintenance_db");
				$sql = "SELECT * FROM users WHERE email='$Email' AND  password='$Password' ";
				$result = mysqli_query($conn, $sql);
				$nr = mysqli_num_rows($result);
						
				if($nr == 1){
							
					print "<script>alert('Successfully Login');location.href='index.php?p=home';</script>";
								
				}// end of result
				else{

					print "<script>alert('Your Email or Password is incorrect');location.href='index.php';</script>";
				}
				//end of else of authentication

	 		}elseif ($page=="insertMainStartegy") {

	 					$mainstrat = $_POST["mainstrat"];
						$feeder = $_POST["feeder"];
						$task = $_POST["task"];
						$reason = $_POST["reason"];
						$tarehe = $_POST["tarehe"];
						$assign = $_POST["assign"];

		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");
						$sql = "INSERT INTO maintenance_strategy (main_id, main_strategy, feeder, task, reason, tarehe, assign) VALUES(null,'".$mainstrat."','".$feeder."','".$task."','".$reason."','".$tarehe."','".$assign."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully');location.href='index.php?p=addMainStrat';</script>";
								
						}else{

							print "<script>alert('Not Successfully');location.href='index.php?p=addMainStrat';</script>";

						}//end of else of result  

	 		}elseif ($page=="insertAsset") {
				
						$equipment = $_POST["equipment"];
						$asset = $_POST["asset"];
						$sn = $_POST["sn"];
						$pole = $_POST["pole"];
						$Location = $_POST["Location"];
						$tarehe = $_POST["tarehe"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO assets (asset_id, name	, serial_no, pole_type, equipment, specific_name, location, tarehe) VALUES(null,'".$asset."','".$sn."','".$pole."', '".$equipment."','".$specific."','".$Location."','".$tarehe."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=asset';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}

	 		}elseif ($page=="insertResource") {
				
						$name = $_POST["name"];
						$personel = $_POST["personel"];
						$experience = $_POST["experience"];
						$phone = $_POST["phone"];
						$mail = $_POST["mail"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO resource (resource_id, name	, technical_personel, experience, phone, email) VALUES(null,'".$name."','".$personel."','".$experience."', '".$phone."','".$mail."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=resource';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}

	 		}elseif ($page=="insertOrder") {
				
						$worderType = $_POST["worderType"];
						$desc = $_POST["desc"];
						$date = $_POST["date"];
						$start = $_POST["start"];
						$end = $_POST["end"];
						$assign = $_POST["assign"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO workorder (	order_id, orderType	, task, tarehe, start, endTime, assign) VALUES(null,'".$worderType."','".$desc."','".$date."', '".$start."','".$end."', '".$assign."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=workorder';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}

	 		}elseif ($page=="insertShift") {
				
						// $month = $_POST["month"];
						$shift = $_POST["shift"];
						$Starting = $_POST["Starting"];
						$endtime = $_POST["endtime"];
						$type = $_POST["type"];
						$name = $_POST["name"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO shift (shift_id, shift, Start, endtime, type, name) VALUES(null,'".$shift."','".$Starting."', '".$endtime."','".$type."','".$name."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=addShift';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}

	 		}elseif ($page=="insertOutage") {
				
						$Feeder = $_POST["Feeder"];
						$tarehe = $_POST["tarehe"];
						$timeout = $_POST["timeout"];
						$timein = $_POST["timein"];
						$duration = $_POST["duration"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO outage (out_id, feeder, tarehe, timeout, timein, duration) VALUES(null,'".$Feeder."','".$tarehe."','".$timeout."', '".$timein."','".$duration."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=outage';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}

	 		}elseif ($page=="insertMainReport") {
				
						$feeder = $_POST["feeder"];
						$tarehe = $_POST["tarehe"];
						$area = $_POST["area"];
						$pole = $_POST["pole"];
						$woodPole = $_POST["woodPole"];
						$ins = $_POST["ins"];
						$tree = $_POST["tree"];
						$super = $_POST["super"];
						$eng = $_POST["eng"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO  mv_maintenance (mv_id, feeder, tarehe, area, mv_pole, mv_wood, insulator, tree, supervisor, engineer) VALUES(null,'".$feeder."','".$tarehe."','".$area."', '".$pole."','".$woodPole."','".$ins."','".$tree."', '".$super."','".$eng."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=mainReport';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}


	 		}elseif ($page=="insertSubReport") {
				
						$trans = $_POST["trans"];
						$tarehe = $_POST["tarehe"];
						$area = $_POST["area"];
						$circuit = $_POST["circuit"];
						$cutout = $_POST["cutout"];
						$fuse = $_POST["fuse"];
						$arester = $_POST["arester"];
						$wire = $_POST["wire"];
						$super = $_POST["super"];
						$eng = $_POST["eng"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO  substantion_main (sub_id, transformer, tarehe, area, circuit, cutout, dropout, arester, earth, supervisor, engineer) VALUES(null,'".$trans."','".$tarehe."','".$area."', '".$circuit."','".$cutout."','".$fuse."','".$arester."', '".$wire."','".$super."', '".$eng."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=mainReport';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}



	 		}elseif ($page=="insertLvReport") {
				
						$trans = $_POST["trans"];
						$tarehe = $_POST["tarehe"];
						$area = $_POST["area"];
						$lvpole = $_POST["lvpole"];
						$span = $_POST["span"];
						$up = $_POST["up"];
						$serviceline = $_POST["serviceline"];
						$pg = $_POST["pg"];
						$super = $_POST["super"];
						$eng = $_POST["eng"];


		 				$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");						
						$sql = "INSERT INTO  lv_maintenance (lv_id , transformer, tarehe, area, lvpole, span, uprooted, Serviceline, pg, supervisor, engineer) VALUES(null,'".$trans."','".$tarehe."','".$area."', '".$lvpole."','".$span."','".$up."','".$serviceline."', '".$pg."','".$super."', '".$eng."')";

						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Registered');location.href='index.php?p=mainReport';</script>";
								
						}else{

							print "<script>alert('Not Registered Successfully');location.href='index.php?p=home';</script>";
						}



	 		}elseif ($page=="delAsset") {

	 					$id = $_GET['id'];
	 			
	 					$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");				
						$sql = "DELETE FROM assets WHERE asset_id = '$id' ";


						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Deleted');location.href='index.php?p=viewAsset';</script>";
								
						}else{

							print "<script>alert('Not Deleted');location.href='index.php?p=viewAsset';</script>";
						}
	 		}elseif ($page=="delResource") {

	 					$id = $_GET['id'];
	 			
	 					$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");				
						$sql = "DELETE FROM resource WHERE resource_id = '$id' ";


						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Deleted');location.href='index.php?p=viewResource';</script>";
								
						}else{

							print "<script>alert('Not Deleted');location.href='index.php?p=viewResource';</script>";
						}
	 		}elseif ($page=="delMainstrat") {

	 					$id = $_GET['id'];
	 			
	 					$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");				
						$sql = "DELETE FROM maintenance_strategy WHERE main_id = '$id' ";


						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Deleted');location.href='index.php?p=viewMainstrat';</script>";
								
						}else{

							print "<script>alert('Not Deleted');location.href='index.php?p=viewMainstrat';</script>";
						}
	 		}elseif ($page=="delWorkOrder") {

	 					$id = $_GET['id'];
	 			
	 					$conn = new mysqli($servername, $username, $password);					
						mysqli_select_db($conn,"maintenance_db");				
						$sql = "DELETE FROM workorder WHERE order_id = '$id' ";


						$result = mysqli_query($conn, $sql);
						
						if($result){
							
							print "<script>alert('Successfully Deleted');location.href='index.php?p=viewOrder';</script>";
								
						}else{

							print "<script>alert('Not Deleted');location.href='index.php?p=viewOrder';</script>";
						}
	 		}


	
	}// end of first if statement
	else {
	
	  	$main_page="pages/signin.php";
	 	
	}
	

?>