<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <a class="navbar-brand" href="#">
        <h5><img class="img-fluid" src="vue/images/saintAspais.webp"></img></h5>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <?php
                    if (isset($_SESSION['login'])) {
                    ?>
                        <li>
                            <a class="dropdown-item" href="index.php?ctl=connection&action=formDeconnect">Deconnexion</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <a class="dropdown-item" href="index.php?ctl=connection&action=formConnect">Connexion</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php
        if (isset($_SESSION['login'])) {
        ?>

            <button class="navbar-toggler h-75 my-auto" style="border-color: #1A4087;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #1A4087;"></span>
            </button>

        <?php
        }
        ?>

    </div>

</nav>