<?php
session_start();

include('configuration/include.php');

if(isset($_GET['delete']) AND !empty($_GET['delete'])){
  $delete = (int) $_GET['delete'];

  $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
  $req->execute(array($delete));

  header("Location: user.php");
}

$db=mysqli_connect("localhost","root","vanille1","stocksystem");
if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $name=htmlspecialchars($_POST['name']);
    $surname=htmlspecialchars($_POST['surname']);
    $password=mysqli_real_escape_string($db,$_POST['password']);  
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Ce nom d\'utilisateur est déjà utilisé")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           
                $password=md5($password); 
                $sql="INSERT INTO users(name, surname, username, role, password ) VALUES('$name', '$surname', '$username', 0,'$password')";
                mysqli_query($db,$sql);
                header("Location: user.php");
                
            }
            else
            {
              echo '<script language="javascript">';
              echo 'alert("Les deux mot de passe ne correspondent pas")';
              echo '</script>';  
            }
          }
      }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Utilisateurs | StockSystem</title>
  <link rel="icon" href="img/logo.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
  <!-- Sidenav -->
  <?php include("includes/sidebar.php") ?>
    <?php include("includes/navbar.php") ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Liste des utilisateurs</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item avtive"><a href="#">Utilisateurs</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button data-toggle="modal" data-target="#adduser" class="btn btn-sm btn-neutral">Ajouter un nouveau utilisateur</button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Utilisateurs</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                
                <tbody class="list">
                  <?php
                  
                  

                  if(isset($_GET['search']) AND !empty($_GET['search'])) {
                    $search = htmlspecialchars($_GET['search']);
                
                    $users = $bdd->query('SELECT * FROM users WHERE name LIKE "%'.$search.'%"');
                    $users = $users->fetchAll(); 
                
                    $userscount = count($users);
                
                    if ($userscount == 0)  {
                        
                        $erreur = '<h3 style="color: white;">&nbsp;&nbsp;Aucun résultats trouvé</h3>';
                
                    }
                
                    }else{
                      $users = $bdd->query('SELECT * FROM users');
                      $users = $users->fetchAll(); 
                    }
                  
                  foreach($users as $u){
                  ?>
                <tr>
                    <td>
                      <?= $u['id'] ?>
                    </td>
                    <td>
                      <?= $u['username'] ?>
                    </td>
                    <td>
                      <?= $u['name'] ?>
                    </td>
                    <td>
                      <?= $u['surname'] ?>
                    </td>
                    <td>
                      <span><?php if(($u['role']) == 3) echo '<span style="color:red;">Administrateur</span>' ?><?php if(($u['role']) == 0) echo '<span style="color:green;">Utilisateur</span>' ?></span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#"><i class="fa fa-user-cog"></i>Modifier le role</a>
                          <a class="dropdown-item" href="user.php?delete=<?= $u['id'] ?>"><i class="fas fa-trash"></i>Supprimer</a>
                        </div>
                      </div>
                    </td>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include("includes/footer.php") ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>


  <div class="modal fade" id="adduser">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un utilisateur</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form method="post" action="user.php">
          <table>
            <tr>
                  <td>Nom d'utilisateur : </td>
                  <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                  <td>Prénom : </td>
                  <td><input type="text" name="name" class="textInput"></td>
            </tr>
            <tr>
                  <td>Nom : </td>
                  <td><input type="text" name="surname" class="textInput"></td>
            </tr>
              <tr>
                  <td>Mot de passe : </td>
                  <td><input type="password" name="password" class="textInput"></td>
            </tr>
              <tr>
                  <td>Répéter le mot de passe : </td>
                  <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            </table>
      <div class="modal-footer container">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
          <input type="submit" class="btn btn-primary" name="register_btn" class="Ajouter">
        </div>
      </form>
      </div>
    </div>
  </div>
</body>

</html>