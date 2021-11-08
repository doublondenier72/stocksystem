<?php

$config = $bdd->query('SELECT * FROM config');
$config = $config->fetchAll();

?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header">

          <img src="img/ban.png" class="" alt="..." width="88%">

      </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pneus.php">
                <i class="fal fa-tire"></i>
                <span class="nav-link-text">Pneus</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lights.php">
                <i class="fas fa-lightbulb"></i>
                <span class="nav-link-text">Ampoules</span>
              </a>
            </li>
          </ul>
      
          <hr class="my-3">

          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Administration</span>
          </h6>
          
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="user.php">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-text">Utilisateurs</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="config.php">
                <i class="fas fa-cog"></i>
                <span class="nav-link-text">Configuration</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>