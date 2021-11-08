<?php
session_start();
if(  isset($_SESSION['username']) )
{
  header("location: dashboard.php");
  die();
}
//connect to database
$db=mysqli_connect("localhost","root","vanille1","stocksystem");
if($db)
{
  if(isset($_POST['login_btn']))
  {
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $password=md5($password); //Remember we hashed password before storing last time
      $sql="SELECT * FROM users WHERE  username='$username' AND password='$password'";
      $result=mysqli_query($db,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['username']=$username;
            header("location:dashboard.php");
        }
       else
       {
              $_SESSION['message']="Username and Password combiation incorrect";
       }
      }
  }
}
?>
<html>
    <head>
    <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Connexion | StockSystem</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
	    <link rel="icon" type="image/png" href="img/logo.png"/>
        <link rel="icon" href="img/logo.png" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    </head>
    <body>
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">

              <div class="btn-wrapper text-center">

              </div>
            </div>
            
            <div class="card-body px-lg-5 py-lg-5">
            <br><br><br><br><br><br><br><br><br>
              <div class="text-center text-muted mb-4">
                  <center>
                  <img src="img/ban.png" alt="" width="320px">
                  </center>
                <h1>Connexion StockSystem</h1>
                <br>
              </div>
              <form role="form" method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Identifiant" type="text" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Mot de passe" type="password" name="password">
                  </div>
                </div>
                <div class="text-center">
                <input type="submit" id="submit" name="login_btn" class="btn btn-primary my-4" value="Se connecter" >
                </div>
              </form>                
            </div>
          </div>
          <center>
                
          <div class="copyright text-center text-muted">
        &copy; 2020 - 2021 Réalisé par Ilhann Musitelli avec le ❤️
      </div>
            
            </center>   
        </div>
      </div>
    </div>
  </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script data-ad-client="ca-pub-2523161469929132" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </body>
</html>