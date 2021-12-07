<?php
include("config.php");

$sql = "INSERT INTO subject_loading (Fac_ID,Subj_ID) VALUES(?,?)";      //merging of tables
$stmtinsert = $conn->prepare($sql);                                     //connecting to DB
$stmtinsert->bind_param("ii", $_POST['faculty'], $_POST['subject']);    //bind data from POST to prepared statement
$result = $stmtinsert->execute();  //sending data to post method

if($result){
    header("Location: Subj_loading-admin.php");
}else{
    echo "error";
}



 ?>
