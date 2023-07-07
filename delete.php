<?php

include 'connect.php';
// we use get bc then we can access the info through the url
if(isset($_GET['deleteid'])) {
    // getting the id from the url and storing it
    $id=$_GET['deleteid'];

    // query for deleting

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con,$sql);

    if($result) {
        // we don't want to just get this message but we want to be redirected back to the display site that is now refreshed
        //echo "Deleted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>