<?php
include "../classes/user.php"; //" .." ×not spece

//Collect all data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];

//Create an instance of class User
$user = new User;


//Call the createUser method
$user->createUser($first_name,$last_name,$username,$password);

?>