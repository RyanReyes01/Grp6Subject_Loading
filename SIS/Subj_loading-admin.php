<?php
require_once 'config.php';
session_start();
  if(!isset($_SESSION['userlogin'])){
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
    <title>Subject Loading</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e1d473941a.js" crossorigin="anonymous"></script> <!-- go to a fontawesome.com for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
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
        <li><a href="dashboard.php"><i class="far fa-calendar"></i>Schedule</a></li>
        <li><a href="dashboard.php"><i class="far fa-file-alt"></i>Grading</a></li>
        <li><a href="#"><i class="fas fa-book"></i>Subject Loading</a></li>
        <li><a href="dashboard.php"><i class="fas fa-user-graduate"></i>Library</a></li>
      </ul>
    </div>
    <br />

  <div class="main_content">
      <div>
          <h2 class="heading">Subject Load Assigning Management</h2>
          <br />
      </div>

      <hr>
      
      <form class = "form_bar" action="assign_load_data.php" method="POST">
        <div class="panel panel-default panel-subject-loading-admin">
            <div class="panel-body">

              <div class="form-group">
                <label>Faculty</label>
                <select name="faculty" id="faculty" class="form-control input-lg" data-live-search="true" title="Select faculty">
                </select>
              </div>
              <div class="form-group">
                <label>Subject</label>
                <select name="subject" id="subject" class="form-control input-lg" data-live-search="true" title="Select Subject"></select>
              </div>
              <div>
                <button class="btn button" type="submit">Assign</button>
              </div>
            </div>
          </div>
        </div>
      </form>

        <div class="table-wrap">
          <table class="list_table" id="subjectList" >
            <thead>
              <tr>
                <th>Subject Load ID</th>
                <th>Faculty ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Subject Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
          <?php
              $res=mysqli_query($conn, "SELECT s_l.SubjLoad_ID, fac.Fac_ID, fac.Fac_Fname, fac.Fac_Lname, s.Subj_name
              FROM `subject_loading` s_l 
                INNER JOIN `faculty` fac ON s_l.Fac_ID = fac.Fac_ID 
                INNER JOIN `subjects` s ON s_l.Subj_ID = s.Subj_ID");      // merging table through inner join
              while($row=mysqli_fetch_array($res))
              {
                echo "<tr>";
                echo "<td> $row[SubjLoad_ID] </td>";
                echo "<td> $row[Fac_ID] </td>";
                echo "<td> $row[Fac_Fname] </td>";
                echo "<td> $row[Fac_Lname] </td>";
                echo "<td> $row[Subj_name] </td>";
                echo "<td> <a href =\"del_load_data.php?id=$row[SubjLoad_ID]\" ><button type=\"button\" class=\"btn btn-success\">Unassign </button> </td>";
                echo "</tr>";
                //<a href=\"delete.php?id=$subject_load[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
              }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
$(document).ready(function(){

    $('#faculty').selectpicker();

    $('#subject').selectpicker();

    load_data('faculty_data');

    function load_data(type, id = ''){
      let data = {type:type};
      if (type === 'faculty_data') {
        data.faculty_id = id;
      } else if (type === 'subject_data') {
        data.subject_id = id;
      }
      $.ajax({
          url:"load_data.php",
          method:"POST",
          data: data,	// -G: moved object declaration to top of function block
          dataType:"json",
         success:function(data){
          var html = '';
            for(var count = 0; count < data.length; count++){
                html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
            }
            if(type == 'faculty_data') {
                $('#faculty').html(html);
                $('#faculty').selectpicker('refresh');
            }
            else if (type == 'subject_data') {
              $('#subject').html(html);
               $('#subject').selectpicker('refresh');
        }
          }
      })
    }

  $(document).on('change', '#faculty', function(){
      var category_id = $('#faculty').val();
      // ('subject', faculty_id);
      console.log(category_id);
    });

    load_data('subject_data');

  $(document).on('change', '#subject', function(){
    var category_id = $('#subject').val();
    // ('faculty', subject_id);
    console.log(category_id);
  });

});


</script>
