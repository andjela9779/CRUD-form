<?php

// first we want to connect to our database
include 'connect.php';

// if it's clicked then we want to store the data
if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    //insert query
    // first create a variable sql and then inside store the insert query
    // insert into `table_name`(column names in the table) values()

    $sql ="insert into `crud` (name,email,mobile,password) values('$name','$email','$mobile','$password')";

    // to execute this query, we will need one variable - result, inside this one we will pass our mysqli_query method(connection variable,query var)
    // if our query(result) has executed successfully - then show "data inserted" 
    // else - error

    $result=mysqli_query($con,$sql);
    if($result) {
        //echo "Data inserted successfully";
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
                    placeholder="Enter your name:" autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter your email:" autocomplete="off">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter your mobile:" autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label>Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>