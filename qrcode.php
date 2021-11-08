<?php
include('lib/phpqrcode/qrlib.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $id = (int) $_GET['id'];


}

QRcode::png('http://192.168.1.111/stocksystem/qrpneu.php?id='.$id);



?>