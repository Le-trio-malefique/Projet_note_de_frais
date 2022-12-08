<!-- CARD NEW NOTE DE FRAIS -->
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3">Note de frais / Frais / Détails</h4>
        </div>
        <!-- TEXTE -->
        <div class="container-fluid text-center mt-5" style="min-height : 70vh!important;">

        <form class='row justify-content-center d-flex'>
                <div class="col-lg">
                    <div class="row d-flex form-control mx-auto">
                        <label class="text-left col-lg p-0" for="type">Type </label>
                        <input type="hidden" name="Statut" value="En attente">
                        <input type="hidden" name="Type" value="FC">
                        <select class="ml-auto col-lg" name="Detail" disabled>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Restaurant'){echo"selected";}} ?> value="Restaurant">Restaurant</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Titre de transport'){echo"selected";}} ?> value="Titre de transport">Titre de transport</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Parking'){echo"selected";}} ?> value="Parking">Parking</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Péage'){echo"selected";}} ?> value="Péage">Péage</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] != 'Restaurant' && $result[0]['Detail'] != 'Titre de transport' && $result[0]['Detail'] != 'Parking' && $result[0]['Detail'] != 'Péage'){echo"selected";}} ?> value="<?php $result[0]['Detail'] ?>"><?php echo $result[0]['Detail']?></option>
                        </select>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto">
                        <label class="text-left col-lg p-0" for="date">Date</label>
                        <input class="ml-auto col-lg" type="date" name="Date" value="<?php if(isset($result)){ echo $result[0]['Date'];} ?>" required disabled>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto mb-5">
                        <label class="text-left col-lg p-0" for="montant">Montant </label>
                        <input class="ml-auto col-lg" type="number" name="Montant" placeholder="€" value="<?php if(isset($result)){ echo $result[0]['Montant'];} ?>" required disabled>
                    </div>
                </div>

                <div class="col-lg border" style="min-height : 11vh!important;" >
                    <div class="row justify-content-center">
                        <div class="col-lg-4 my-auto"><p class="m-0" id="nomFichier"><?php if (isset($result)){ echo $result[0]['Justificatif']; }?></p></div>
                    </div>
                    <div id="fichier"><?php 
                    if(isset($result)){
                        $res = substr($result[0]['Justificatif'], -3);
                        if($res == "pdf"){
                            echo "<iframe src='uploads/".$result[0]['Justificatif']."' style='min-height: 400px;'></iframe>";
                        }
                        else{
                            echo "<img src='uploads/".$result[0]['Justificatif']."' class='img-fluid py-3'></img>";
                        }
                    }
                    ?></div>