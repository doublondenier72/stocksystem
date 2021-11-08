<?php
  // Déclaration d'une nouvelle classe
  class connexionDB {
    private $host    = '127.0.0.1';   // nom de l'host
    private $name    = 'stocksystem';     // nom de la base de donnée
    private $user    = 'root';        // utilisateur
    private $pass    = '';        // mot de passe
    //private $pass    = '';          // Ne rien mettre si on est sous windows
    private $connexion;
                    
    function __construct($host = null, $name = null, $user = null, $pass = null){
      if($host != null){
        $this->host = $host;           
        $this->name = $name;           
        $this->user = $user;          
        $this->pass = $pass;
      }
      try{
        $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
          $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', 
          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
      }catch (PDOException $e){
        echo '<!DOCTYPE html>
        <html>
          <head>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/css/styles.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          </head>
          <body>
          </br>
            <div class="alert alert-danger container">
              <strong>Erreur!</strong> impossible de se connecter a la base de données.
            </div>
          </body>
        </html>';
        die();
      }
    }
    
    public function query($sql, $data = array()){
      $req = $this->connexion->prepare($sql);
      $req->execute($data);
      return $req;
    }
    
    public function insert($sql, $data = array()){
      $req = $this->connexion->prepare($sql);
      $req->execute($data);
    }
  }
  
  // Faire une connexion à votre fonction
  $DB = new connexionDB();

  $onglogo = "img/g.png";
?>
<?php
// Base de données
$servername = "127.0.0.1";
$username = "root";
$dbname = "stocksystem";
$password = 'vanille1';

try {
  $bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
?>