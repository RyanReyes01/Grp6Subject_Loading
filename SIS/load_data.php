<?php
    $connect = new PDO("mysql:host=localhost;dbname=sis_data", "root", "");

    if(isset($_POST["type"])){
        if($_POST["type"] == "faculty_data"){
            $query = "
                SELECT * FROM faculty
                ORDER BY Fac_Fname ASC
                ";

                $statement = $connect->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll();
                $output = array();

                foreach($data as $row){
                    $output[] = array(
                    'id'  => $row["Fac_ID"],
                    'name'  => "$row[Fac_Lname], $row[Fac_Fname]"
                    );
                }
            echo json_encode($output);
        }
        elseif ($_POST["type"] == "subject_data"){
            $query = "
                SELECT * FROM subjects
                ORDER BY Subj_name ASC
                ";
                $output = array();
                $statement = $connect->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll();
                $output = array();

                foreach($data as $row){
                    $output[] = array(
                    'id'  => $row["Subj_ID"],
                    'name'  => $row["Subj_name"]
                    );
                }
            echo json_encode($output);
        }
        else {
            echo json_encode("invalid argument");
        }
    }

?>
