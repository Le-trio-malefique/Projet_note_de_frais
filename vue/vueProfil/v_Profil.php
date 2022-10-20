
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 81vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3">Profil</h4>
        </div>
        <!-- TEXTE -->
        
        <div class="row text-center" style="min-height : 30vh!important;">
            <div class="my-auto mx-5">
                <div class="row">
                    <i style="font-size : 3em; color: #1A4087;" class="bi bi-person-circle"></i>
                </div>
                <div class="row">
                    <h4 class="my-4">Nom : <?php echo $_SESSION['nom'] ?></h4>
                </div>
                <div class="row">
                    <h4 class="my-4">Prénom : <?php echo $_SESSION['prenom'] ?></h4>
                </div>
                <div class="row">
                    <h4 class="my-4">Matricule : <?php echo $_SESSION['matricule'] ?></h4>
                </div>
                <?php if(isset($_SESSION['vehicule'])){ ?>
                <div class="row">
                    <h4 class="my-4">Véhicule : <?php echo $_SESSION['vehicule'] ?></h4>
                </div>
                <?php } else {?>
                <form class="fluid-form">
                    <input type="submit" value="Saisir véhicule">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>