<?php
print_r($_SESSION['ndf_valid']);
echo "<br>";

$liste_historique = array();
foreach($_SESSION['ndf_valid'] as $value){
    echo "<br>";
    print_r(DbProfil::lister_historique($value));
    $liste_historique[] += DbProfil::lister_historique($value);
}
print_r($liste_historique);

?>
<!-- CARD NEW NOTE DE FRAIS -->
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3">Historique</h4>
        </div>
        <!-- DEMANDES -->
        <?php
            if(isset($_SESSION['demande'])){
        ?>
        <div>
            Demande 1
        </div>
        <?php
            }else{
        ?>
        <div class="row text-center" style="min-height : 70vh!important;">
            <div class="my-auto mx-5">
                <h2>Aucun historique pour le moment...</h2>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
