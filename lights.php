<?php

session_start();
// Fichier PHP contenant la connexion à votre BDD
include('configuration/include.php'); 

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ampoules | StockSystem</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Liste des ampoules en stock</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item avtive"><a href="#">Stock d'ampoules</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button data-toggle="modal" data-target="#addLight" class="btn btn-sm btn-neutral">Ajouter un nouveau modele</button>
            </div>
            <div class="modal fade" id="addLight">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ajouter une Ampoule</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <form method="POST">
                    <div class="form-group">
                      <label for="ins-desc">Référence</label>
                      <input name="ref" type="text" class="form-control" id="ins-desc" placeholder="Ampoules PHILIPS 12V 55W H7 Longli...">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Quantité</label>
                      <input name="img" type="text" class="form-control" id="ins-desc" placeholder="5">
                    </div>
                  </div>
                <div class="modal-footer container">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                  </div>
                </form>
                </div>
              </div>
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
              <h3 class="text-white mb-0">Ampoules en stock</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Référence</th>
                    <th scope="col">Quantité</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                
                <tbody class="list">
                  <?php
                  
                  

                  if(isset($_GET['search']) AND !empty($_GET['search'])) {
                    $search = htmlspecialchars($_GET['search']);
                
                    $lights = $bdd->query('SELECT * FROM stock_lights WHERE ref LIKE "%'.$search.'%"');
                    $lights = $lights->fetchAll(); 
                
                    $lightscount = count($lights);
                
                    if ($lightscount == 0)  {
                        
                        $erreur = '<h3 style="color: white;">&nbsp;&nbsp;Aucun résultats trouvé</h3>';
                
                    }
                
                    }else{
                      $lights = $bdd->query('SELECT * FROM stock_lights');
                      $lights = $lights->fetchAll(); 
                    }
                  
                  foreach($lights as $l){
                  ?>
                <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="" class="avatar rounded-circle mr-3">
                          <img alt="Image pneu" src="img/light.png">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?= $l['ref'] ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <span><?php if(($l['quant']) == 0){ echo '<span style="color: red;" >Plus de stock</span>'; }else{ echo $l['quant']." en stock"; } ?></span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Enlever</a>
                          <a class="dropdown-item" href="#">Rajouter</a>
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
</body>

</html>