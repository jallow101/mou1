<?php
  require 'connection/connection.php';
  
  $id=$_GET['id'];
  
  $name=$_POST['name'];
  $surname=$_POST['surname'];
  $dob= $_POST['dob'];
  $address=$_POST['address'];
  
 /* mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");
  header('location:index.php');*/
   $sql = "UPDATE person SET name = '$name', surname = '$surname', dob = '$dob', address = '$address' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Updated")</script>';
          header('Location:person.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }

?>