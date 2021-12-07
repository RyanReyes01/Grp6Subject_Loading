<?php
session_start();

	if(isset($_SESSION['userlogin'])){
		if($_SESSION['role'] != 'admin'){
            if($_SESSION['role'] == 's_admin'){
                header("location: dashboard-s_admin.php");
            }else{
                header("location: dashboard-user.php");
            }
        }else{}
	}else{
        header("location: index.php");
    }

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content = "with=device-width, initial-scale=1.0" >
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/e1d473941a.js" crossorigin="anonymous"></script> <!-- go to a fontawesome.com for icons -->
</head>
<body>
	<div class="header">
		<img src="img\DCOMC_logo.png" alt="DCOMC">
		<a class="home" href="">Daraga Community College - Admin</a>
		<a href=""><i class="fas fa-search"></i></a>
		<a class="notif" href=""><i class="fas fa-bell"></i></a>
		<a href="dashboard.php?logout=true"><i class="fa fa-sign-out"></i></a>


	</div>
	<div class="wrapper">
		<div class="sidebar">
			<h2>Dashboard</h2>
			<ul>  <!-- put the site links to href="" -->
				<li><a href="template.php"><i class="fas fa-child"></i>Student Info</a></li>
				<li><a href="template.php"><i class="fas fa-chalkboard-teacher"></i>Faculty</a></li>
				<li><a href="template.php"><i class="far fa-calendar"></i>Schedule</a></li>
				<li><a href="template.php"><i class="far fa-file-alt"></i>Grading</a></li>
				<li><a href="Subj_loading-admin.php"><i class="fas fa-book"></i>Subject Loading</a></li>
				<li><a href="template.php"><i class="fas fa-user-graduate"></i>Library</a></li>
			</ul>

		</div>
		<div class="main_content">
			<div class="info" id="Admin_id">
                <h2>This is Admin</h2
            ></div>
		</div>
	</div>



</body>
</html>
