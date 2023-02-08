

    <button class="navbar-toggler" style="border-color: #1A4087;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: #1A4087;"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php
            if(isset($_SESSION['login'])){
        ?>
        <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['Admin'] == 0) {
            ?>
                <li class="nav-item ml-auto active">
                    <a href="index.php?ctl=utilisateur&action=profil" class="nav-link p-3" style="color: #1A4087;">
                        <h3>Profil</h3><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a href="index.php?ctl=notedefrais&action=lister&vue=saisie" class="nav-link p-3" style="color: #1A4087;">
                        <h3>Saisie</h3>
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a href="index.php?ctl=notedefrais&action=lister&vue=historique" class="nav-link p-3" style="color: #1A4087;">
                        <h3>Historique</h3>
                    </a>
                </li>
            <?php
            } elseif(isset($_SESSION['login']) && $_SESSION['Admin'] == 1) { ?>
                <!-- <li class="nav-item ml-auto">
                    <a href="index.php?ctl=notedefrais&action=lister" class="nav-link p-3" style="color: #1A4087;">
                        <h3>Historique</h3>
                    </a>
                </li> -->
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="row ml-auto mr-3">


        <div class="mr-0">
            <div class="dropdown">
                <a class="col d-flex justify-content-end" style="margin-right: 0px;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i style="font-size : 3em; color: #1A4087;" class="bi bi-person-circle"></i>
                </a>
            </li>
            <li class="nav-item ml-auto">
                <a href="index.php?ctl=notedefrais&action=lister&vue=saisie" class="nav-link p-3" style="color: #1A4087;">
                    <h3>Saisie</h3>
                </a>
            </li>
            <li class="nav-item ml-auto">
                <a href="index.php?ctl=notedefrais&action=lister&vue=historique" class="nav-link p-3" style="color: #1A4087;">
                    <h3>Historique</h3>
                </a>
            </li>
        </ul>
        <?php
            }
        ?>

        <ul class="navbar-nav ml-auto">
            <div>
                <?php
                    if(isset($_SESSION['login'])){
                        echo'
                        <li class="nav-item ml-auto">
                            <a class="nav-link p-3 text-right" href="index.php?ctl=connection&action=formDeconnect">
                            <h3 class="text-danger">Deconnexion</h3>
                            </a>
                        </li>';
                    }
                    if(!isset($_SESSION['login'])){
                        echo'
                        <li class="nav-item ml-auto">
                            <a class="nav-link p-3 text-right" href="index.php?ctl=connection&action=formConnect">
                            <h3 class="text-success">Connexion</h3>
                            </a>
                        </li>';
                    }
                ?>
                
            </div>
        </ul>

    </div>
</nav>



