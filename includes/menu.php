

<nav class="navbar navbar-expand-lg navbar-light bg-light container">
	    <a class="navbar-brand" href="index.php">Accueil</a>
		<a class="navbar-brand" href="addons.php">Stock</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


	        <ul class="navbar-nav ml-md-auto">
        	    <?php
                	if(!isset($_SESSION['id'])){
						?>	
							<li class="nav-item">
        	                    <a class="nav-link" href="login.php">Connexion</a>
                	        </li>
	                    <?php
        	        }else{
                	    ?>
                        	<li class="nav-item">
	                            <a class="nav-link" href="logout.php">Déconnexion</a>
        	                </li>
                	    <?php
	                } 
        	    ?>
	        </ul>
	    </div>
	</nav>
