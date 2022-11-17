<!-- CARD NEW NOTE DE FRAIS -->
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3">Note de frais</h4>
        </div>
        <!-- TEXTE -->
        <div class="container-fluid text-center mt-5" style="min-height : 70vh!important;">
        <?PHP 
            if (isset($result))
            {
                echo "<form class='row justify-content-center d-flex' action='index.php?ctl=notedefrais&action=modifierFrais&Id_ligne=".$result[0]['Id']."' method='post' enctype='multipart/form-data'>";
            }
            else {
                echo "<form class='row justify-content-center d-flex' action='index.php?ctl=notedefrais&action=newFrais&Id_ndf=".$_GET['Id_ndf']."' method='post' enctype='multipart/form-data'>";
            }
             
        ?>

                <div class="col-lg">
                    <div class="row d-flex form-control mx-auto">
                        <label class="text-left col-lg p-0" for="type">Type </label>
                        <input type="hidden" name="Statut" value="En attente">
                        <input type="hidden" name="Type" value="FC">
                        <select class="ml-auto col-lg" name="Detail">
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Restaurant'){echo"selected";}} ?> value="Restaurant">Restaurant</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Titre de transport'){echo"selected";}} ?> value="Titre de transport">Titre de transport</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Parking'){echo"selected";}} ?> value="Parking">Parking</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] == 'Péage'){echo"selected";}} ?> value="Péage">Péage</option>
                            <option <?php if(isset($result)){ if($result[0]['Detail'] != 'Restaurant' && $result[0]['Detail'] != 'Titre de transport' && $result[0]['Detail'] != 'Parking' && $result[0]['Detail'] != 'Péage'){echo"selected";}} ?> value="<?php $result[0]['Detail'] ?>"><?php echo $result[0]['Detail']?></option>
                        </select>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto">
                        <label class="text-left col-lg p-0" for="date">Date</label>
                        <input class="ml-auto col-lg" type="date" name="Date" value="<?php if(isset($result)){ echo $result[0]['Date'];} ?>" required>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto mb-5">
                        <label class="text-left col-lg p-0" for="montant">Montant </label>
                        <input class="ml-auto col-lg" type="number" name="Montant" placeholder="€" value="<?php if(isset($result)){ echo $result[0]['Montant'];} ?>" required>
                    </div>
                </div>

                <div class="col-lg border" style="min-height : 11vh!important;">
                    <input class="text-left" type="file" name="Justificatif" onchange="previewPicture(this)" value="<?php if(isset($result)){ echo "uploads/".$result[0]['Justificatif'];}?>">
                    <img src="<?php if(isset($result)){echo "uploads/".$result[0]['Justificatif'];}else{echo"#";} ?>" id="image" class="my-3 img-fluid">

                    <script type="text/javascript" >
                        // L'image img#image
                        var image = document.getElementById("image");
                        
                        // La fonction previewPicture
                        var previewPicture  = function (e) {

                            // e.files contient un objet FileList
                            const [picture] = e.files

                            // "picture" est un objet File
                            if (picture) {
                                // On change l'URL de l'image
                                image.src = URL.createObjectURL(picture)
                            }
                        } 
                    </script>
                </div>
            
        </div>
        <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
            <button type="submit" class="btn btn-primary my-auto w-50"><?php if(isset($result)){ echo "Modifié";} else { echo"Envoyé";} ?></button>
            </form>
        </div>
        <!-- BUTTONS 
        <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
            <div class="col-lg-6 p-3 my-auto"> 
                <button type="button" class="btn btn-primary" href="https://google.fr"><i class="bi bi-plus-circle"></i> &nbsp Nouvelle note de frais 1</button>
            </div>
            <div class="col-lg-6 p-3 my-auto">
                <button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Nouvelle note de frais 2</button>
            </div>
        </div>-->
    </div>
</div>