<!-- CARD NEW NOTE DE FRAIS -->
<div class="row h-100 w-100 mx-auto d-flex justify-content-center">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row h-25 border">
            <h4 class="text-left my-auto p-2 ml-3">Historique</h4>
        </div>
        <!-- TEXTE -->
        <?php
            if(isset($_SESSION['demande'])){
        ?>
        <div>
            Demande 1
        </div>
        <?php
            }else{
        ?>
        <div class="row h-50 text-center">
            <div class="my-auto mx-5">
                <h2>Aucun historique pour le moment...</h2>
            </div>
        </div>
        <?php } ?>
    </div>
</div>