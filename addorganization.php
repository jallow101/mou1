<?php
       // include Database connection file
    require 'connection/connection.php';

        $rowNo = $_POST['number'];

        $organization_name = $_POST['organization_nane'];
        $ag_registration_no = $_POST['ag_registration_no'];
        $office_space_address = $_POST['office_space_address'];
        $previous_activities = $_POST['previous_activities'];

        for ($i=1; $i <= $rowNo; $i++) {
          // code...
          $name[] = $_POST['name'.$i.''];
          $surname[] = $_POST['surname'.$i.''];
          $position[] = $_POST['position'.$i.''];

        }

        //echo  print_r($name);


        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO organization ( organization_name, ag_registration_no, office_space_address, previous_activities)
         VALUES ('$organization_name','$ag_registration_no','$office_space_address','$previous_activities')";

       $result = mysqli_query($conn, $sql);




        if ($result )
        {

          $sqlid = "SELECT id FROM organization ORDER BY id ASC";

          $result3 = mysqli_query($conn, $sqlid);

          while($row=mysqli_fetch_assoc($result3)){
           $id = $row['id'];
            }

          $orgid = $id;

          for ($i=0; $i < count($name); $i++) {
            // code...
            $sql2 = "INSERT INTO person (org_id, name, surname, position)
             VALUES ('$orgid','$name[$i]','$surname[$i]','$position[$i]')";

            $result2 = mysqli_query($conn, $sql2);
            //   print_r($result2);
          }

          // $sql2 = "INSERT INTO person (org_id, name, surname, position) VALUES ('$orgid','$name','$surname','$position')";


          //$result2 = mysqli_query($conn, $sql2);

          if($result2){

            echo '<script>alert("Data Saved")</script>';
            header('Location:organization.php');

          }
          else
          echo '<script>alert("Person Data Not Saved")</script>';

        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }
        //// for loop for input

























?>
