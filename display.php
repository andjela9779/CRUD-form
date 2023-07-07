<?php
// include the database through connect

include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">

<!-- my-5 is the bootstrap margin-->
    <button class="btn btn-primary my-5"><a href="user.php" style="color:white; text-decoration:none;">Add user</a></button>

    <!-- here we have to display the table with our users
    the table is from bootstrap-->

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Serial number</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

  // we want to select all of our data
  // using an sql query - select all the data *

  $sql="Select * from  `crud`";

  // to execute this - variable result, passed the sqli into it, takes two parameters
  // if the result is true, we want to print all the data
  // $row = mysqli_fetch_assoc($result) - whatever is assigned to result, will be displayed

  $result=mysqli_query($con,$sql);
  if($result) {
    /*$row=mysqli_fetch_assoc($result);
    echo $row['name'] . " ";
    $row=mysqli_fetch_assoc($result);
    echo $row['name'] . " ";
    */
    // we will wrap this in a while loop so that it does this for all the table rows
    while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];

        echo  '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$password.'</td>
                <td>
                <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" style="color:white; text-decoration:none;">Update</a></button>
                <button class="btn btn-primary" style="background-color:red;"><a href="delete.php?deleteid='.$id.'" style="color:white; text-decoration:none;">Delete</a></button>
                </td>

              </tr>';




    }
 }


 ?>

 <td>
    <button class="btn btn-primary my-5"><a href="user.php" style="color:white; text-decoration:none;">Update</a></button>
    <button class="btn btn-primary my-5" style="background-color:red;"><a href="user.php" style="color:white; text-decoration:none;">Delete</a></button>

 </td>
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
    </tr>
-->
  </tbody>
</table>







</div>

    
</body>
</html>