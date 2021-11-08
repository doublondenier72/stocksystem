<?php
require('../src/insertperso/insertperso.php');

$perso = new Insertperso("doublon", 14);

$persovar = Insertperso::perssonage(string $prenom, int $age);

echo $persovar;

?>