<?php

include('configuration/include.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $id = (int) $_GET['id'];

    $req = $bdd->prepare('SELECT * FROM stock_pneus WHERE id = ?');
    $req->execute(array($id));
    $pneus = $req->fetch();

}

if(isset($_GET['action']) AND !empty($_GET['action'])){
    
    $action = (int) $_GET['action'];
    $quant = (int) $_GET['quant'];
    $aid = (int) $_GET['id'];

    if(($action) == 1){
        $fquant = $quant+1;
        $req = $bdd->prepare('UPDATE stock_pneus SET quant = ? WHERE id = ?');
        $req->execute(array($fquant, $aid));
        header("Location: qrpneu.php?id=".$aid);
    }

    if(($action) == 2){
        $fquant = $quant-1;
        $req = $bdd->prepare('UPDATE stock_pneus SET quant = ? WHERE id = ?');
        $req->execute(array($fquant, $aid));
        header("Location: qrpneu.php?id=".$aid);
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pneu QRCode | StockSystem</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
<br><br><br><br><br>
    <center>
        <img src="img/ban.png" alt="" width="80%">
        <h1>QRCodeSystem</h1>
        <br>
        <h1>Il reste <?= $pneus['quant'] ?> pneus</h1>
        <h1><?= $pneus['marque'] ?></h1>
        <h1><?= $pneus['ref'] ?></h1>
        <br>
        <a href="qrpneu.php?id=<?= $pneus['id'] ?>&action=1&quant=<?= $pneus['quant'] ?>" class="btn btn-primary">Ajouter</a>
        <a href="qrpneu.php?id=<?= $pneus['id'] ?>&action=2&quant=<?= $pneus['quant'] ?>" class="btn btn-danger">Enlever</a>
    
    <br><br><br><br><br>
    <footer class="footer pt-0" >
        <div class="row align-items-center justify-content-lg-between" >
            <div class="col-lg-6" >
            <div class="copyright text-center text-muted">
                &copy; 2020 - 2021 Réalisé par Ilhann Musitelli avec le ❤️
            </div>
            </div>
        </div>
        </footer>
        </center>
</body>

</html>