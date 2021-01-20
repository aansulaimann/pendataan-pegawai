<?php session_start(); require 'functions.php';

   if(isset($_SESSION["login"])) {
      header("Location: http://localhost/pendataan-pegawai/");
      exit;
   }

   if(isset($_POST["login"])) {
      if(login($_POST) > 0) {
         $_SESSION["login"] = true;
         header("Location: home.php");
         exit;
      } else {
         flash(false, "Username atau Password anda salah");
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Aplikasi pendataan kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="public/img/favicon.ico">
</head>
<body>
    
<main>
   <section>
      <div class="container d-flex justify-content-center mt-5">
         <div class="row">
            <div class="col">
               <div class="card">
                  <div class="row">
                     <div class="col">
                        <img src="https://picsum.photos/seed/picsum/800/500" class="card-img-top img-fluid" alt="404">
                     </div>
                     <div class="col me-2">
                        <h5 class="text-info mt-3">Login Page</h5>
                        <p class="text-muted">Untuk Kamu petugas pendataan silahkan login</p>
                        <form action="" method="post">
                           <div class="mt-3">
                              <label for="email" class="form-label">Email : </label>
                              <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                           </div>
                           <div class="mt-3">
                              <label for="password" class="form-label">Password : </label>
                              <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                           </div>
                           <button type="submit" class="btn btn-primary mt-3" name="login">Log in</button>
                           <!-- <button type="button" class="btn btn-outline-primary ms-2 mt-3" name="register">Register</button> -->
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>