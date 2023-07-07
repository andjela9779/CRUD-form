<?php

// when we click update, we want a form and an update button, copy th entire code from our user.php



// first we want to connect to our database
include 'connect.php';
//access the id from url after the button is clicked
$id=$_GET['updateid'];

$sql="Select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
// to make the placeholders be the current data inserted in a table row that we chose to update
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

// if it's clicked then we want to store the data
if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    // but here we dont want to insert data like in user.php, instead, we want to update it
    // we dont put id in single quotes bc it is an int, but the rest yes since they are all varchars
    $sql ="update `crud` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";

    // to execute this query, we will need one variable - result, inside this one we will pass our mysqli_query method(connection variable,query var)
    // if our query(result) has executed successfully - then show "data inserted" 
    // else - error

    $result=mysqli_query($con,$sql);
    if($result) {
        //echo "Updated successfully";
        // here we want it to redirect us to the display.php page and not just display that it is added successfully
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }


}



?>









<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">-->
</head>

<body>
    <div class="container">
        <!-- bootstrap class container will divide the width equally between left and right-->
        <br>
        <br>
        <br>
        <br>
        <form method="post">
            <!-- we will not add action because we want to perform that in the same file user.php -->

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter your name:" autocomplete="off" value=<?php echo $name ?>>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter your email:" autocomplete="off" value=<?php echo $email ?>>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter your mobile:" autocomplete="off" value=<?php echo $mobile ?>>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Enter your password" autocomplete="off" value=<?php echo $password ?>>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label>Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

    </div>

</body>

</html>

?>