<?php
    session_start();
    if(isset($_SESSION['userlogin'])){
		if($_SESSION['role'] != 'admin'){
            if($_SESSION['role'] == 's_admin'){
                header("location: dashboard-s_admin.php");
            }else{
                header("location: dashboard-user.php");
            }
        }else{
			header("location: dashboard-admin.php");
		}
	} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daraga Community College</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <script src="https://kit.fontawesome.com/e1d473941a.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="slider">
        <div class="load">
        </div>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="logo_container">
                            <img src="img/DCOMC_logo.png" class="logo" alt="DCOMC Logo">

                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" id="username" class="form-control input_user" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInLine">
                                    <label class="custom-control-label" for="customControlInLine">Remember Me</label>

                                </div>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button"  class="btn login_btn" value="Login">Login</button>
                    </div>
                    </form>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Create an Account? <a href="registration.php" class="ml-2"> Sign Up</a> 
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#">Forgot your Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
-->
<script type="text/javascript" src="js.jquery.min.js"></script>
<script type="text/javascript" src="js.bootstrap.min.js"></script>
<script type="text/javascript" src="js.popper.min.js"></script>
<!-- 
<script>
    $(function(){
        $('#login').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){
                var username = $('#username').val();
                var password = $('#password').val();
            }

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'jslogin.php',
                data: {username: username, password: password},
                success: function(data){
                    if($.trim(data) === "1"){
                        setTimeout(' window.location.href = "dashboard.php"', 1000);
                    }
                },
                error: function(data){
                    alert('There were errors upon submitting.');
                }
            });
        });
    });
</script> 
-->
</div>
</body>
</html>