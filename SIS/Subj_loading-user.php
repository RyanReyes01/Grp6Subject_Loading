<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content = "with=device-width, initial-scale=1.0" >
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/sl_style.css?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/e1d473941a.js" crossorigin="anonymous"></script> <!-- go to a fontawesome.com for icons -->
</head>
<body>
<div class="header">
        <img src="img\DCOMC_logo.png" alt="DCOMC"> 
		<a class="home" href="">Daraga Community College </a>
		<a href=""><i class="fas fa-search"></i></a>
		<a class="notif" href=""><i class="fas fa-bell"></i></a>
		<a href="dashboard.php?logout=true"><i class="fa fa-sign-out"></i></a>
	</div>
	<div class="wrapper">
		<div class="sidebar">
			<h2>Dashboard</h2>
			<ul>  <!-- put the site links to href="" -->
				<li><a href="dashboard.php"><i class="fas fa-child"></i>Student Info</a></li>
				<li><a href="dashboard.php"><i class="fas fa-chalkboard-teacher"></i>Faculty</a></li>
				<li><a href="#"><i class="far fa-calendar"></i>Schedule</a></li>
				<li><a href="dashboard.php"><i class="far fa-file-alt"></i>Grading</a></li>
				<li><a href="dashboard.php"><i class="fas fa-book"></i>Subject Loading</a></li>
				<li><a href="dashboard.php"><i class="fas fa-user-graduate"></i>Library</a></li>
			</ul>
			
		</div> 
		<body>
		<div class="main_content">
			<div class="display">
                <h2>Subject Loads</h2>
				</div>
                        <table class="list">
							<thead>
                                <tr>
                                    <th>Load ID</th>
                                    <th>Subject</th>
                                    <th>Faculty</th> <br>
                                </tr>
                            </thead>
							<tbody> 

<?php
$sql = "SELECT subject_loading.SubjLoad_ID,  subjects.Subj_name FROM subject_loading, subjects WHERE subject_loading.Subj_Id = subjects.Subj_ID";
$sq1 = "SELECT subject_loading.Fac_ID, faculty.Fac_Fname, faculty.Fac_Lname FROM subject_loading, faculty WHERE subject_loading.Fac_ID = faculty.Fac_ID";
$result = $conn->query($sql);
$result1=$conn->query($sq1);

while ($rows = $result->fetch_assoc())
{
	echo 
	'<tr> <td>' . $rows["SubjLoad_ID"] . '</td>
		  <td>' . $rows["Subj_name"]   . '</td>';
	if ($rows = $result1->fetch_assoc())
	{
		echo
		  '<td>' . $rows["Fac_Fname"] . " " . $rows["Fac_Lname"]  . '</td>
	</tr>';
	}
}
?>
</tbody>
</table>
</div>
</body>
</div>
		<div>

		</div>	
		</div>
	</div>
</body>
</html>