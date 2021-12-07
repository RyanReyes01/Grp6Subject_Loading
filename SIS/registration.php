<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/reg_style.css">
    
    
</head>
<body>
<div class="slider">
    <div class="load">

    </div>
    <div>
        <?php
        if(isset($_POST['create'])){
            $firstname      = $_POST['firstname'];
            $middlename     = $_POST['middlename'];
            $lastname       = $_POST['lastname'];
            $phone          = $_POST['phone'];
            $email          = $_POST['email'];
            $address 		= $_POST['address'];
            $civilstatus 	= $_POST['civilstatus'];
            $password       = $_POST['password'];

            $sql = "INSERT INTO student (F_name, M_name, L_name, Phone, Email, Address, Civil_status, Password) VALUES(?,?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $middlename, $lastname, $phone, $email, $address, $civilstatus, $password]);
            if($result){
                header("location: index.php");
            }else{
                echo "error";
            }
        }
        ?>
    </div>
    <div>
        <form action="registration.php" method="post">
            <div class="reg_cont">
                <div class="row">   
                    <div class="col-sm-12">
                        <h1>Registration</h1>
                        <p>Fill up the form</p>
                        <hr class="mb-3">
                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" id="firstname" type="text" name="firstname" required>

                        <label for="middlename"><b>Middle Name</b></label>
                        <input class="form-control" id="middlename" type="text" name="middlename" required>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" id="lastname" type="text" name="lastname" required>

                        <label for="phone"><b>Phone Number</b></label>
                        <input class="form-control" id="phone" type="text" name="phone" required>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" id="email" type="text" name="email" required>

                        <label for="address"><b>Address</b></label>
                        <input class="form-control" id="address" type="text" name="address" required>

                        <label for="civilstatus"><b>Civil Status</b></label>
                        <input class="form-control" id="civilstatus" type="text" name="civilstatus" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password" type="password" name="password" required>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){

          $('#register').click(function(e){

            var valid = this.form.checkValidity();
            if(valid){

                var firstname   = $('#firstname').val();
                var middlename  = $('#middlename').val();
                var lastname    = $('#lastname').val();
                var phone       = $('#phone').val();
                var email       = $('#email').val();
                var address     = $('#address').val();
                var civilstatus = $('#civilstatus').val();
                var password    = $('#password').val();

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {firstname: firstname, middlename: middlename, lastname: lastname, phone: phone, email: email, address:address, civilstatus:civilstatus, password: password},
                    success: function(data){
                        Swal.fire({
                            'title': 'Sign Up Successful',
                            'text': 'User added to the system' ,
                            'type': 'success'
                        })
                    },
                    error: function(data){
                        Swal.fire({
                            'title': 'Failed',
                            'text': 'An Error has Occured' ,
                            'type': 'error'
                        })
                    }
                });
            }
         
    });

</script>
</body>
</html>