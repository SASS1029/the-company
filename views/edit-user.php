<?php

session_start();

include "../classes/user.php";

$user_obj = new User;
//get the user id from the URL
$user_id = $_GET['user_id'];
//$user_id = 4; example
$user = $user_obj->getUser($user_id);
//$user contains the information of user # 4
//$user is an associative array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <?php include "main-menu.php"; ?>
    <main class="container" style="padding-top: 80px">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">EDIT USER</h2>
            </div>
          <div class="card-body">
              <form action="../actions/edit-user.php" method="post">
                <input type="hidden" name="user_id" value="<?= $user['id']?>">

                
                <label for="first-name">First Name</label>
                <input type="text" name="first_name"  id="first-name" class="form-control mb-2" value="<?= $user['first_name'] ?>" required>

                <label for="last-name">Last Name</label>
                <input type="text" name="last_name" id="last-name" class="form-control mb-2"  value="<?= $user['last_name'] ?>"required>
                
                <label for="username">Username</label>
                <input type="text" name="username"  id="username" class="form-control mb-2"  value="<?= $user['username'] ?>" maxlength="15" required>

                <div class="text-end">
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                </div>
              </form>
          </div>
        </div>

    </main>
</body>
</html>