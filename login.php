<?php
include "koneksi.php";
  session_start();
if(isset($_SESSION['user'])) {
    header('location: index.php');
}
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $exec = mysqli_query($conn,$query);
    if(mysqli_num_rows($exec) !== 0){
        $result = mysqli_fetch_assoc($exec);
        if($result['password'] == $pass) {
            $_SESSION['level'] = $result['level'];
            $_SESSION['user'] = $result['username'];
            if($result['level'] == 'user') {
                header('location: pegawai/index.php');
            }else{
                header('location: index.php');
            }
            
        }else{
            echo "<script>alert('Password Yang Anda Masukan Salah');
            document.location = 'login.php';
            </script>";
        }
    }else {
      echo "<script>alert('Password Yang Anda Masukan Salah');
            document.location = 'login.php';
            </script>";
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - SPK WEIGHTED PRODUCT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
<!--===============================================================================================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic">
					<img src="./assets/img/bpbd.jpeg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title" style="margin-bottom: -20px; letter-spacing: 2px;">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<div id="layoutAuthentication_footer" style="margin-top: 30px;">
		<footer class="py-4 bg-dark mt-auto">
			<div class="container-fluid px-4">
				<div class="d-flex align-items-center justify-content-between small">
					<div style="color: #fafafa;">Project Kuliah Praktik M Rifqi S dan Ilham Adhitya</div>
					
				</div>
			</div>
		</footer>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>