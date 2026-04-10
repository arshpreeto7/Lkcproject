<?php

    $id=$_REQUEST['id'];

    include("../config.php");

  $query = "DELETE FROM `category` WHERE id='$id'";

   $result = mysqli_query($db, $query);

     if ($result) {

        echo "<script>window.location.assign('manageCategory.php?msg=Category Delete Successfull')</script>";
    } else {
        echo "<script>window.location.assign('manageCategory.php?msg=Category Not Delete')</script>";
    }


?>