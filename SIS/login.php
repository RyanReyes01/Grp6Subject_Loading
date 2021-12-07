<?php
session_start();
require_once('config.php');

$message = " ";
if(isset($_POST["button"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row["Role"] == "admin"){
                $_SESSION['userlogin'] = $row["Username"];
                $_SESSION['role'] = $row["Role"];
                header("Location: dashboard-admin.php");
            }else{
                if($row["Role"] == "s_admin"){
                    $_SESSION['userlogin'] = $row["Username"];
                    $_SESSION['role'] = $row["Role"];
                    header("Location: dashboard-s_admin.php");
                }else{
                    if($row["Role"] == "user"){
                        $_SESSION['userlogin'] = $row["Username"];
                        header("Location: dashboard-user.php");
                    }
                } 
            }    
        }
    }else{
        header('Location: index.php');
    }
}