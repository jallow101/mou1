<?php
       // include Database connection file
    require 'connection/connection.php';


        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];

        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO person (name, surname, dob, address) VALUES ('$name','$surname','$dob','$address')";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Saved")</script>';
          header('Location:person.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }


?>
