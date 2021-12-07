<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM `subject_loading` WHERE SubjLoad_ID=$id"); // table name then entity ID

//redirecting to the display page (index.php in our case)
header("Location:Subj_loading-admin.php");
?>
0
