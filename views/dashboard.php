<?php 
session_start();

include "../classes/user.php";

$user = new User;
$user_list = $user->getAllUsers();
//$user_list = $result
//




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body>
    <?php  include "main-menu.php"; ?>
   <main class="container" style="padding-top: 80px">
        <h2 class="text-muted display-6">USER LIST</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="lead">
                <?php
                    while($user = $user_list->fetch_assoc()) {

                  

                ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td> <!--same meaning --> 
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td>
                    <a href="edit-user.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                    <a href="delete-user.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
               
            </tr>
            <?php
              }
            ?>
            </tbody>
        </table>
</main>
</body>
</html>