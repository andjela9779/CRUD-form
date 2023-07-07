<?php

$con= new mysqli('localhost', 'root', '', 'crudoperation');

// first we just used this to check the connection and now since it is checked and we saw that we have a successful connection, we want to check only if there is no connection, and if so , display an error

/*if($con)  {
    echo "Connection successful";
} else {
    die(mysqli_error($con));
}
*/

if(!$con)  {
    die(mysqli_error($con));
};

// now if there is no error, we will get a blank page when we open connect.php

?>