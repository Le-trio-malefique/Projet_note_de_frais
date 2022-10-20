<div class="row h-100 mx-3">
   <div class="col-lg-4 mx-auto mb-auto rounded border shadow p-3 align-middle" style="color: #1A4087; margin-top : 15vh!important;">
        <div class="ml-5">
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
            <form action="index.php?ctl=utilisateur&action=formvehicule" method="POST" class="fluid-form">
                <input type="submit" value="Saisir véhicule">
            </div>
            <?php } ?>
        </div>
    </div>
</div>