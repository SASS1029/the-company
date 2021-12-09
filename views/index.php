


<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      
  <div class="container-fluid">
      
  </div>

  <div class="container mt-5">
    <div class="card mt-5 mx-auto w-25">
        <h1 class="card-header text-center display-5 ">LOGIN</h1>

        <div class="card-body">
         <form action="../actions/login.php" method="post">
             <input type="text" name="username" placeholder="Username" id="" class="form-control mt-3"  required autofocus>
             <input type="password" name="password" placeholder="Password" id="" class="form-control mt-1" required>
             <div class="d-grid mt-5">
                 <button type="submit" class="btn btn-primary" name="login">LOG IN</button>
             </div>
         </form>
        </div>
        <div class="card-footer text-center">
            <a href="register.php">Create Account</a>
        </div>
    </div>
  </div>

  
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>