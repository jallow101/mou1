<?php
  require 'connection/connection.php';

 $id = $_REQUEST['schid'];

 // echo $id;
  $name=$_POST['name'];
  $sch_code=$_POST['sch_code'];
  $district= $_POST['district'];
  $cluster=$_POST['cluster'];
  $region=$_POST['region'];

 /* mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");
  header('location:index.php');*/
   $sql = "UPDATE school SET name = '$name', sch_code = '$sch_code',
   district = '$district', cluster = '$cluster', region= '$region' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Updated")</script>';
          header('Location:school.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }

?>
