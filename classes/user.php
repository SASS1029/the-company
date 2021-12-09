<?php

include "database.php";

class User extends Database {

    public function createUser($first_name,$last_name,$username,$password) {
        $password = password_hash($password, PASSWORD_DEFAULT);     

        //SQL
        $sql = "INSERT INTO users(first_name,last_name,username,`password`) VALUES ('$first_name','$last_name','$username' ,'$password')";
                                                                //shift + @ バッククォート
        //Excution -> Redirection
        if($this->conn->query($sql)) {
            header('location: ../views');
            exit;
        }else{
            die("Error createing user" . $this->conn->error);
        }
    }

    public function login($username, $password) {
        $sql = "SELECT id, username, `password` FROM users WHERE username ='$username' ";

        if($result = $this->conn->query($sql)) {
            //$result holds the id username password from the database
            //Check if the username exists
            if($result->num_rows == 1) {
                //Check if the password is correct
                $user_details = $result->fetch_assoc();

                if(password_verify($password, $user_details['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];

                    header("location: ../views/dashboard.php" );
                    exit;


                }else{
                    die("Password is incorrect.");
                }

            }else {
               die("Username not found" );
            }
        }else{
            die("Error:" . $this->conn->error);
        }
    }

    public function getAllUsers() {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT id, first_name, last_name ,username FROM users WhERE id != $user_id " ;
        //get all users EXCEPT for this id

        if($result = $this->conn->query($sql)) {
            return $result;
        }else{
            die("Error retrieving all users:" . $this->conn->error);
        }
    }

    public function getUser($user_id) {
        $sql = "SELECT * FROM users  WHERE id = $user_id";

        if($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
            //Since we're expecting 1 row of result only, transform
            //the result to ASSOCIATIVE array right away
        }else {
            die("Error retrieving the user: " . $this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name,$last_name,$username) {
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

        if($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
        }else {
            die("Errorupdating user:" . $this->conn->error);
        }
    }

    public function deleteUser($user_id) {
        $sql = "DELETE FROM users WHERE id = $user_id";

        if($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit;
        }else {
            die("Error deleting user:" . $this->conn->error);
        }
    }
}


?>