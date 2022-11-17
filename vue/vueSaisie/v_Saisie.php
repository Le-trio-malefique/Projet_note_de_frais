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

                <div class="col-lg border" style="min-height : 11vh!important;" >
                    <div class="row justify-content-center">
                        <div class="col-lg-4"><label for="files" class="btn btn-primary mt-3">Select Files</label></div>
                        <div class="col-lg-4 my-auto"><p class="m-0" id="nomFichier"><?php if (isset($result)){ echo $result[0]['Justificatif']; }?></p></div>
                    </div>
                    <input id="files" class="text-left d-none" type="file" name="Justificatif" onchange="previewPicture(this)" value="<?php if(isset($result)){ echo "uploads/".$result[0]['Justificatif'];}?>" accept=".jpg, .png, .pdf">
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
                    
                    <script type="text/javascript" >
                        
                        let previewPicture  = function (e) {

                            // e.files contient un objet FileList
                            const [file] = e.files

                            let extension = file.name.split(".").pop()
                            document.getElementById("nomFichier").innerHTML = file.name

                            if(extension != "pdf"){
                                let doc = document.createElement('img')
                                doc.classList.add('img-fluid')
                                doc.classList.add('my-3')
                                // "file" est un objet File
                                if (file) {

                                    // On change l'URL du fichier
                                    doc.src = URL.createObjectURL(file)
                                    let madiv = document.getElementById("fichier")
                                    madiv.innerHTML=""
                                    madiv.appendChild(doc)
                                }
                            }
                            else{
                                let doc = document.createElement('iframe')
                                // "file" est un objet File
                                if (file) {
                                    doc.style.cssText += 'min-height: 400px;'
                                    // On change l'URL du fichier
                                    doc.src = URL.createObjectURL(file) + "#toolbar=0"
                                    let madiv = document.getElementById("fichier")
                                    madiv.innerHTML=""
                                    madiv.appendChild(doc)
                                }
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