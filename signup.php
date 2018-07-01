<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		header('Location: http://ovs-core.zaidimarvels.co.ke/students/home.php', true, 301);
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>O.V.S Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
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
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup-main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #999999;">

	<div class="limiter">
		<div class="container-signup100">
			<div class="signup100-more" style="background-image: url('images/main_background.jpg');"></div>

			<div class="wrap-signup100 p-l-50 p-r-50 p-t-20 p-b-50">
				<form class="signup100-form validate-form" id="signup_form">
					<span class="signup100-form-title p-b-40">
						Sign Up
					</span>
					<div style="flex-direction:row; display:flex;">
						<div class="wrap-input100 validate-input" style="flex:1; margin-right:10px;" data-validate="Name is required">

							<span class="label-input100">First Name</span>
							<input class="input" type="text" name="first_name" id="first_name" placeholder="My First Name" value="" onchange="javascript:setVars(this.id,this.value)">
							<span class="focus-input100"></span>

						</div>

						<div class="wrap-input100 validate-input" style="flex:1;" data-validate="Name is required">

							<span class="label-input100">Last Name</span>
							<input class="input" type="text" name="last_name" id="last_name" placeholder="My Last Name" value="" onchange="javascript:setVars(this.id,this.value)">
							<span class="focus-input100"></span>

						</div>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Registration Number</span>
						<input class="input" type="text" name="reg_number" id="reg_number" placeholder="Reg. Number..." value="" onchange="javascript:setVars(this.id,this.value)">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input101 validate-input" data-validate="You must select a school...">
						<label class="label-input100 " style="float:left; margin-top:10px;">School </label>
						<select class="form-input schoolSelect" style="float:right" name="school" id="school" value="" onchange="javascript:setVars(this.id,this.value)">
							<option value="" disabled selected>Choose Your School</option>
							<option value="School of Pure and Applied Sciences">School of Pure and Applied Sciences</option>
							<option value="School of Health Sciences">School of Health Sciences</option>
							<option value="School of Business Economics">School of Business Economics</option>
							<option value="School of Hospitality and Textile Technology">School of Hospitality and Textile Technology</option>
							<option value="School of Engineering and Built Environment">School of Engineering and Built Environment</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input" type="text" name="email" id="email" placeholder="Email addess..." value="" onchange="javascript:setVars(this.id,this.value)">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Create A Password</span>
						<input class="input" type="password" name="pass" id="pass" placeholder="*************" value="" onchange="javascript:setVars(this.id,this.value)">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input" type="password" name="confirm_password" id="confirm_password" placeholder="*************" value="" onchange="javascript:confirmPass(this.id,this.value)">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" name="terms_checkbox" id="terms_checkbox" type="checkbox" value="false" onclick="javascript:setVars(this.id,this.value)">
							<label class="label-checkbox100" for="terms_checkbox">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>
					</div>

				</form>
				<div class="container-signup100-form-btn">
					<div class="wrap-signup100-form-btn">
						<div class="signup100-form-bgbtn"></div>
						<button class="signup100-form-btn" onclick="javascript:signupUser()">
							Sign Up
						</button>
					</div>

					<a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
						Sign in
						<i class="fa fa-long-arrow-right m-l-5"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script>
		'use-strict'

		let valuesArr = {};

		function confirmPass(elem, val) {
			// console.log(val)
			if (val != valuesArr.pass) {
				document.getElementById(elem).style.border = 'orange 2px solid'
			}
		}

		function setVars(elem, val) {
			if (elem == 'terms_checkbox') {
				let key = 'agree_to_terms'
				let value = document.getElementById(elem).checked
				let chkbox = document.getElementById(elem)
				chkbox.setAttribute('value', value)
				valuesArr[key] = value
				// console.log(value)
			} else {
				valuesArr[elem] = val
				// console.log(valuesArr)
			}

		}


	</script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/bootstrap-notify.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="js/ajax_handler.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
