<?php

session_start();
// Fichier PHP contenant la connexion à votre BDD
include('configuration/include.php'); 

if (isset($_POST['submit'])) {

  $profile = htmlspecialchars($_POST['profile']);
  $marque = htmlspecialchars($_POST['marque']);
  $saison = htmlspecialchars($_POST['saison']);
  $ref = htmlspecialchars($_POST['ref']);
  $quant = htmlspecialchars($_POST['quant']);
  $indice = htmlspecialchars($_POST['indice']);


  $insertpneu = $bdd->prepare("INSERT INTO stock_pneus(ref, saison, marque, quant) VALUES(?, ?, ?, ?)");
  $insertpneu->execute(array($profile." ".$ref." ".$indice, $saison, $marque, $quant));

  header("Location: pneus.php");
}

if(isset($_GET['delete']) AND !empty($_GET['delete'])){
  $delete = (int) $_GET['delete'];

  $req = $bdd->prepare('DELETE FROM stock_pneus WHERE id = ?');
  $req->execute(array($delete));

  header("Location: pneus.php");
}

if(isset($_GET['action']) AND !empty($_GET['action'])){
    
  $action = (int) $_GET['action'];
  $quant = (int) $_GET['quant'];
  $aid = (int) $_GET['id'];

  if(($action) == 1){
      $fquant = $quant+1;
      $req = $bdd->prepare('UPDATE stock_pneus SET quant = ? WHERE id = ?');
      $req->execute(array($fquant, $aid));
      header("Location: pneus.php");
  }

  if(($action) == 2){
      $fquant = $quant-1;
      $req = $bdd->prepare('UPDATE stock_pneus SET quant = ? WHERE id = ?');
      $req->execute(array($fquant, $aid));
      header("Location: pneus.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pneus | StockSystem</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Liste des pneus en stock</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item avtive"><a href="pneus.php">Stock de pneus</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button data-toggle="modal" data-target="#addPneu" class="btn btn-sm btn-neutral">Ajouter un nouveau modele</button>
            </div>
            <div class="modal fade" id="addPneu">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ajouter un Pneu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <form method="POST">
                    <div class="form-group">
                      <label for="ins-name">Profile</label>
                      <input autocomplete="OFF" type="text" name="profile" class="form-control" id="ins-name" placeholder="W810"  onkeyup="this.value=this.value.toUpperCase()">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Référence</label>
                      <input autocomplete="OFF" name="ref" type="text" class="form-control" id="ins-desc" placeholder="195 85 12"  onkeyup="this.value=this.value.toUpperCase()">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Indice</label>
                      <input autocomplete="OFF" name="indice" type="text" class="form-control" id="ins-desc" placeholder="91H"  onkeyup="this.value=this.value.toUpperCase()">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Saison</label>
                      <select class="form-control" name="saison">
                        <option value="Hiver">Hiver</option>
                        <option value="Ete">Été</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Marque</label>
                      <select class="form-control" name="marque">
                        <option value="Bridgestone">Bridgestone</option>
                        <option value="Nexen">Nexen</option>
                        <option value="Michelin">Michelin</option>
                        <option value="Continental">Continental</option>
                        <option value="Nokian">Nokian</option>
                        <option value="Dunlop">Dunlop</option>
                        <option value="Pirelli">Pirelli</option>
                        <option value="Firestone">Firestone</option>
                        <option value="Goodyear">Goodyear</option>
                        <option value="Vredestein">Vredestein</option>
                        <option value="BF Goodrich">BF Goodrich</option>
                        <option value="SEM Perit">SEM Perit</option>
                        <option value="UNI Royal">UNI Royal</option>
                        <option value="General">General</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="ins-desc">Quantité</label>
                      <input autocomplete="OFF" name="quant" type="number" class="form-control" placeholder="5">
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
              <h3 class="text-white mb-0">Pneus en stock</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Référence</th>
                    <th scope="col">Saison</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Quantité</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                
                <tbody class="list">
                  <?php
                  
                  
                  if(isset($_GET['search']) AND !empty($_GET['search'])) {
                    $search = htmlspecialchars($_GET['search']);
                
                    $pneus = $bdd->query('SELECT * FROM stock_pneus WHERE ref LIKE "%'.$search.'%"');
                    $pneus = $pneus->fetchAll(); 
                
                    if (empty($pneus))  {
                        
                        echo('<h3 style="color: white;">&nbsp;&nbsp;Aucun résultats trouvé</h3>');
                
                    }
                
                    }else{
                      $pneus = $bdd->query('SELECT * FROM stock_pneus ORDER BY marque');
                      $pneus = $pneus->fetchAll(); 
                    }
                  
                  foreach($pneus as $p){
                  ?>
                <tr>
                
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="" class="avatar mr-3">
                          <img alt="Image pneu" src="img/tire.png">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?= $p['ref'] ?></span>
                        </div>
                      </div>
                    </th>
                    
                    <td>
                      <?= $p['saison'] ?>
                    </td>
                    <td>
                      <span><?= $p['marque'] ?></span>
                    </td>
                    <td>
                      <span><?php if(($p['quant']) == 0){ echo '<span style="color: red;" >Plus de stock</span>'; }else{ echo $p['quant']." en stock"; } ?></span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="pneus.php?id=<?= $p['id'] ?>&action=2&quant=<?= $p['quant'] ?>"><i class="fa fa-minus"></i> Enlever</a>
                          <a class="dropdown-item" href="pneus.php?id=<?= $p['id'] ?>&action=1&quant=<?= $p['quant'] ?>"><i class="fa fa-plus"></i> Rajouter</a>
                          <a class="dropdown-item" target="_blank" href="qrview.php?id=<?= $p['id'] ?>"><i class="fal fa-qrcode"></i> Obtenir le QRCode</a>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <a href="?delete=<?= $p['id'] ?>"><i class="fas fa-trash"></i></a>
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

  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>