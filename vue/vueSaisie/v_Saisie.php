<!-- CARD NEW NOTE DE FRAIS -->
<div class="row h-100 w-100 mx-auto d-flex justify-content-center">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row h-25 border">
            <h4 class="text-left my-auto p-2 ml-3">Note de frais</h4>
        </div>
        <!-- TEXTE -->
        <?php
            if(isset($_SESSION['demande'])){
        ?>
        <div>
            Demande 1 en cours
        </div>
        <?php
            }else{
        ?>
        <div class="row h-50 text-center">
            <div class="my-auto mx-5">
                <h2>Aucune dépense en attente</h2>
            </div>
        </div>
        <?php } ?>

        <!-- BUTTONS -->
        <div class="row border h-25 d-flex justify-content-around text-center">
            <div class="col-lg-6 p-3 my-auto"> 
                <button type="button" class="btn btn-primary" href="https://google.fr"><i class="bi bi-plus-circle"></i> &nbsp Nouvelle note de frais 1</button>
            </div>
            <div class="col-lg-6 p-3 my-auto">
                <button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Nouvelle note de frais 2</button>
            </div>
        </div>
    </div>
</div>