
<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-center">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item my-auto active">
        <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link" href="#">Profil</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link" href="#">Note de frais</a>
      </li>
      <li class="nav-item">  
        <div class="dropdown my-auto">
            <a role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i style="font-size : 3em;" class="bi bi-person-circle ml-5"></i>
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                <?php
                    if(isset($_SESSION['login'])){
                ?>
                    <li><a class="dropdown-item" href="index.php?ctl=utilisateur&action=formDeconnect">Deconnexion</a></li>
                <?php
                    }
                    else{
                ?>
                    <li><a class="dropdown-item" href="index.php?ctl=utilisateur&action=formConnect">Connexion</a></li>
                <?php
                    }
                ?>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="index.php?ctl=utilisateur&action=formNew">Inscription</a></li>
            </ul>
        </div>
      </li>
    </ul>
    
  </div>
</nav>