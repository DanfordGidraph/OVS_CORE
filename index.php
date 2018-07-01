<?php
session_start();
if(isset($_SESSION['student_id'])){
	header('Location: http://ovs-core.zaidimarvels.co.ke/students/home.php', true, 301);
	exit();
}else if(isset($_SESSION['candidate_id'])){
	header('Location: http://ovs-core.zaidimarvels.co.ke/candidates/home.php', true, 301);
	exit();
}else if(isset($_SESSION['delegate_id'])){
	header('Location: http://ovs-core.zaidimarvels.co.ke/delegates/home.php', true, 301);
	exit();
}

include_once('php/db_connection.php');

if(isset($_POST['reg_number_tr']) && isset($_POST['passWd_tr'])){
	$destination = '';
	$fb_pass = strtoupper($_POST['passWd_tr']);
	$new_fb_pass = sha1($fb_pass);
	$reg =  mysqli_real_escape_string($con,$_POST['reg_number_tr']);
	$newReg = strtoupper($reg);

	$sql_str_std = "SELECT * FROM student_details WHERE reg_number = '$newReg' AND firebase_pass = '$new_fb_pass'";
	$sql_str_del = "SELECT * FROM delegate_details WHERE reg_number = '$newReg' AND firebase_pass = '$new_fb_pass'";
	$sql_str_cand = "SELECT * FROM candidate_details WHERE reg_number = '$newReg' AND firebase_pass = '$new_fb_pass'";

	$sql_str_del_voting = "SELECT status FROM voting_manager WHERE vote_type = 'delegate_voting' ";
	$sql_str_cand_voting = "SELECT status FROM voting_manager WHERE vote_type = 'candidate_voting' ";

	$result_std = mysqli_query($con,$sql_str_std);
	$result_del = mysqli_query($con,$sql_str_del);
	$result_cand = mysqli_query($con,$sql_str_cand);

	$result_cand_voting = mysqli_query($con,$sql_str_cand_voting);
	$result_del_voting = mysqli_query($con,$sql_str_del_voting);

	$row_std = mysqli_fetch_assoc($result_std);
	$row_del = mysqli_fetch_assoc($result_del);
	$row_cand = mysqli_fetch_assoc($result_cand);

	$row_cand_voting = mysqli_fetch_assoc($result_cand_voting);
	$row_del_voting = mysqli_fetch_assoc($result_del_voting);


	if($row_std) {
		$_SESSION['student_id'] = $row_std["firebase_id"];
		$_SESSION['student_email'] = $row_std["email"];
		$_SESSION['student_reg'] = $row_std["reg_number"];
		$_SESSION['student_school'] = $row_std["school"];
		$_SESSION['student_name'] = str_ireplace('_',' ',$row_std["user_name"]);
		$_SESSION['firebase_pass'] = $fb_pass;
		$_SESSION['voting_status'] = $row_del_voting['status'];
		$destination = 'http://ovs-core.zaidimarvels.co.ke/students/home.php';
		header('Location: '. $destination , true, 301);
		die();

	}else if($row_del) {
		$_SESSION['delegate_id'] = $row_del["firebase_id"];
		$_SESSION['delegate_email'] = $row_del["email"];
		$_SESSION['delegate_reg'] = $row_del["reg_number"];
		$_SESSION['delegate_school'] = $row_del["school"];
		$_SESSION['delegate_name'] = str_ireplace('_',' ',$row_del["user_name"]);
		$_SESSION['firebase_pass'] = $fb_pass;
		$_SESSION['profile'] = $row_del["profile_status"];
		$_SESSION['voting_status'] = $row_cand_voting['status'];
		$destination = 'http://ovs-core.zaidimarvels.co.ke/delegates/home.php';
		header('Location: '. $destination , true, 301);
		die();

	}else if($row_cand) {
		$_SESSION['candidate_id'] = $row_cand["firebase_id"];
		$_SESSION['candidate_email'] = $row_cand["email"];
		$_SESSION['candidate_reg'] = $row_cand["reg_number"];
		$_SESSION['candidate_school'] = $row_cand["school"];
		$_SESSION['profile'] = $row_cand["profile_status"];
		$_SESSION['candidate_name'] = str_ireplace('_',' ',$row_cand["user_name"]);
		$_SESSION['firebase_pass'] = $fb_pass;
		$destination = 'http://ovs-core.zaidimarvels.co.ke/candidates/home.php';
		header('Location: '. $destination , true, 301);
		die();

	}

}else

?>
<!DOCTYPE html >
<html lang="en">
<head>
	<title>O.V.S Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login-main.css">
	<!--===============================================================================================-->
</head>
<body style="background-image: url('images/main_background.jpg')">

	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<div class="login-form">
					<form class=" validate-form" method="post" action="index.php">
						<span class="login-form-title p-b-43">
							Login to continue
						</span>

						<div class="wrap-input-login validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input-login" type="text" name="reg_number" id="reg_number" value="" onchange="javascript:removePlaceholder('reg_num_ph')" >
							<span class="focus-input-login"></span>
							<span id="reg_num_ph" class="label-input-login">Registration Number</span>
						</div>


						<div class="wrap-input-login validate-input" data-validate="Password is required">
							<input class="input-login" type="password" name="passWd" id="pass" onchange="javascript:removePlaceholder('password_ph')">
							<span class="focus-input-login"></span>
							<span id="password_ph" class="label-input-login">Password</span>
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact-form-checkbox">
								<input class="input-checkbox" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox" for="ckb1">
									Remember me
								</label>
							</div>

							<div>
								<a href="#" class="txt1">
									Forgot Password?
								</a>
							</div>
						</div>
					</form>
					<div class="row">
						<div class="container-login-form-btn col-sm-12 col-md-6" style="padding-top:20px">
							<button class="login-form-btn" onclick="javascript:login()" tabIndex="0">
								Login
							</button>
						</div>

						<div class="container-login-form-btn col-sm-12 col-md-6">
							<small>Dont have account Yet?</small>
							<button class="login-form-btn" onclick="javascript:signup()" >
								Signup Instead
							</button>
						</div>
					</div>
				</div>
				<div class="login-more" style="background-image: url('images/main_background.jpg')">
				</div>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" >
	function removePlaceholder(elem_id){
		var elem = document.getElementById(elem_id)
		if(elem.value != ''){
			elem.style.display = 'none'
		}else{
			elem.style.display = 'block'
		}
	}
	function signup(){
		window.location.href = 'http://ovs-core.zaidimarvels.co.ke/signup.php'
	}
	function post_to_url(path, params, method) {
		method = method || "post";

		var form = document.createElement("form");

		//Move the submit function to another variable
		//so that it doesn't get overwritten.
		form._submit_function_ = form.submit;

		form.setAttribute("method", method);
		form.setAttribute("action", path);

		for(var key in params) {
			var hiddenField = document.createElement("input");
			hiddenField.setAttribute("type", "hidden");
			hiddenField.setAttribute("name", key);
			hiddenField.setAttribute("value", params[key]);

			form.appendChild(hiddenField);
		}

		document.body.appendChild(form);
		console.log('posting to Index')
		form.submit(); //Call the renamed function.
	}
	function login() {
		let regNumber = document.getElementById('reg_number').value
		let pass = document.getElementById('pass').value
		let remember = document.getElementById('ckb1').checked

		let serializedData = {reg_number_tr:regNumber , passWd_tr:pass}
		// console.log(serializedData)

		post_to_url("http://ovs-core.zaidimarvels.co.ke/index.php", serializedData ,'POST' );

	}
	</script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script type="text/javascript" src="js/index-loader.js" ></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
