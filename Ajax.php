<?php

  require 'connection/connection.php';
if (isset($_POST['name'])) {
    $qry = "select * from `school` where id=".$_POST['name'];
    $rec = mysqli_query($conn,$qry);

        while ($res = mysqli_fetch_array($rec)) {
            echo $res['sch_code']."|".$res['district']."|".$res['cluster']."|".$res['region'];

    }
}
die();
?>
