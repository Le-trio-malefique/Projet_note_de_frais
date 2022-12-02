<!-- CARD NEW NOTE DE FRAIS -->
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3"><?php if($_GET['action'] == 'listeFrais'){ echo'Note de frais';} if($_GET['action'] == 'lister'){ echo '';}?></h4>
        </div>

        
<?php

//Liste frais

if($_GET['action'] == 'listeFrais'){
    echo'<div class="row text-center" style="min-height : 70vh!important;">
        <div class="mt-5 mx-5 w-100">';

            if(isset($result)){
                echo "<table class='table-striped w-100'>";
                foreach ($result as $row){
                    echo "<tr>
                                <td class='p-3'>
                                    <p>".$row['Statut']."</p>
                                </td>
                                <td class='p-3 d-flex-lg justify-content-center'>";
                    if($row['Statut'] == 'En attente'){
                            echo "<a class='btn btn-primary mx-auto w-100' style='max-width : 200px!important;' href='index.php?ctl=notedefrais&action=afficherModifierFrais&id=".$row['Id']."'>Modifier</a>
                                    <form class='mt-2 p-0' action='index.php?ctl=notedefrais&action=supprimerFrais&Id_ndf=".$_GET['Id_ndf']."' method='post'>
                                        <input type='hidden' name='Id' value='".$row['Id']."'>
                                        <input type='submit' class='btn btn-danger mx-auto w-100' value='Suprimer' style='max-width : 200px!important;'>
                                    </form>
                                </td>
                            </tr>";
                    }
                    else{
                        echo"<form class='mt-2 p-0' action='#' method='post'>
                                    <input type='hidden' name='Id' value='".$row['Id']."'>
                                    <input type='submit' class='btn btn-primary mx-auto w-100' value='Consulter' style='max-width : 200px!important;'>
                                </form>
                            </td>
                        </tr>";
                    }
                }
                echo "</table>";
            }
            else{
                echo '<h1>
                        Aucune note de frais enregistré
                    </h1>';
            } 
            echo'
                </div>
            </div>
            <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
                <a class="p-3 my-auto" href="index.php?ctl=notedefrais&action=saisie_fc&Id_ndf="'.$_GET["Id_ndf"].'"><button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Crée un frais classique</button></a>
                <a class="p-3 my-auto" href="index.php?ctl=notedefrais&action=newNote"><button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Crée un frais kilométrique</button></a>
            </div>
        </div>
    </div>';
}

//Liste note de frais

if($_GET['action'] == 'lister' || $_GET['action'] == "newNote" || $_GET['action'] == "supprimer"){
    echo '<div class="row text-center" style="min-height : 70vh!important;">
                <div class="mt-5 mx-5 w-100">';

                if(isset($result)){
                    echo "<table class='table-striped w-100'>";
                    foreach ($result as $row){
                        echo "<tr>
                                    <td class='p-3'>
                                        ".$row['Date']."
                                    </td>
                                    <td class='p-3 d-flex-lg justify-content-center'>
                                        <a class='btn btn-primary mx-auto w-100' style='max-width : 200px!important;' href='index.php?ctl=notedefrais&action=listeFrais&Id_ndf=".$row['Id_ndf']."'>Saisir des frais</a>
                                        <form class='mt-2 p-0' action='index.php?ctl=notedefrais&action=supprimer' method='post'>
                                            <input type='hidden' name='idNdf' value='".$row['Id_ndf']."'>
                                            <input type='submit' class='btn btn-danger mx-auto w-100' value='Suprimer' style='max-width : 200px!important;'>
                                        </form>
                                    </td>
                                </tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo '<h1>
                            Aucune note de frais enregistré
                        </h1>';
                } 
            echo'
                </div>
            </div>
            <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
                <a class="p-3 my-auto" href="index.php?ctl=notedefrais&action=newNote"><button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Crée une nouvelle note de frais</button></a>
            </div>
        </div>
    </div>';
}

//Saisie frais

if($_GET['action'] == 'saisie_fc' || $_GET['action'] == 'afficherModifierFrais'){
    echo'
    <div class="container-fluid text-center mt-5" style="min-height : 70vh!important;">';

                if (isset($result))
                {
                    echo "<form class='row justify-content-center d-flex' action='index.php?ctl=notedefrais&action=modifierFrais&Id_ligne=".$result[0]['Id']."' method='post' enctype='multipart/form-data'>";
                }
                else {
                    echo "<form class='row justify-content-center d-flex' action='index.php?ctl=notedefrais&action=newFrais&Id_ndf=".$_GET['Id_ndf']."' method='post' enctype='multipart/form-data'>";
                }

                if($_GET["action"] == "saisie_fc" || $_GET["action"] == "afficherModifierFrais"){
                    echo '
                    
                    <div class="col-lg">
                <div class="row d-flex form-control mx-auto">
                    <label class="text-left col-lg p-0" for="type">Type </label>
                    <input type="hidden" name="Statut" value="En attente">
                    <input type="hidden" name="Type" value="FC">
                    <select class="ml-auto col-lg" name="Detail">
                        <option'; if(isset($result)){ if($result[0]["Detail"] == "Restaurant"){echo"selected";}} echo' value="Restaurant">Restaurant</option>
                        <option'; if(isset($result)){ if($result[0]["Detail"] == "Titre de transport"){echo"selected";}} echo' value="Titre de transport">Titre de transport</option>
                        <option'; if(isset($result)){ if($result[0]["Detail"] == "Parking"){echo"selected";}} echo' value="Parking">Parking</option>
                        <option'; if(isset($result)){ if($result[0]["Detail"] == "Péage"){echo"selected";}} echo' value="Péage">Péage</option>
                        <option'; if(isset($result)){ if($result[0]["Detail"] != "Restaurant" && $result[0]["Detail"] != "Titre de transport" && $result[0]["Detail"] != "Parking" && $result[0]["Detail"] != "Péage"){echo"selected";}} ?> value="<?php if(isset($result[0]["Detail"])){$result[0]["Detail"];}else{"autre";} ?>"><?php if(isset($result[0]["Detail"])){echo $result[0]["Detail"];}else{echo "autre";} echo'</option>
                    </select>
                </div>
                <div class="row d-flex form-control mt-5 mx-auto">
                    <label class="text-left col-lg p-0" for="date">Date</label>
                    <input class="ml-auto col-lg" type="date" name="Date" value="'; if(isset($result)){ echo $result[0]["Date"];} echo'" required>
                </div>
                <div class="row d-flex form-control mt-5 mx-auto mb-5">
                    <label class="text-left col-lg p-0" for="montant">Montant </label>
                    <input class="ml-auto col-lg" type="number" name="Montant" placeholder="€" value="'; if(isset($result)){ echo $result[0]["Montant"];} echo '" required>
                </div>
            </div>

            <div class="col-lg border" style="min-height : 11vh!important;" >
                <div class="row justify-content-center">
                    <div class="col-lg-4"><label for="files" class="btn btn-primary mt-3">Select Files</label></div>
                    <div class="col-lg-4 my-auto"><p class="m-0" id="nomFichier">'; if (isset($result)){ echo $result[0]["Justificatif"]; } echo'</p></div>
                </div>
                <input id="files" class="text-left d-none" type="file" name="Justificatif" onchange="previewPicture(this)" value="'; if(isset($result)){ echo "uploads/".$result[0]["Justificatif"];} echo'" accept=".jpg, .png, .pdf , .PDF">
                <div id="fichier">
                    
                    ';
                }


             
                
                if(isset($result)){
                    $res = substr($result[0]['Justificatif'], -3);
                    if($res == "pdf" || $res == "PDF"){
                        echo "<iframe src='uploads/".$result[0]['Justificatif']."' style='min-height: 400px;'></iframe>";
                    }
                    else{
                        echo "<img src='uploads/".$result[0]['Justificatif']."' class='img-fluid py-3'></img>";
                    }
                }
                echo'</div>
                
                <script type="text/javascript" >

                    let previewPicture  = function (e) {

                        // e.files contient un objet FileList
                        const [file] = e.files

                        let extension = file.name.split(".").pop()
                        document.getElementById("nomFichier").innerHTML = file.name

                        if(extension != "pdf"){
                            let doc = document.createElement("img")
                            doc.classList.add("img-fluid")
                            doc.classList.add("my-3")
                            // "file" est un objet File
                            if (file) {

                                // On change l\'URL du fichier
                                doc.src = URL.createObjectURL(file)
                                let madiv = document.getElementById("fichier")
                                madiv.innerHTML=""
                                madiv.appendChild(doc)
                            }
                        }
                        else{
                            let doc = document.createElement("iframe")
                            // "file" est un objet File
                            if (file) {
                                doc.style.cssText += "min-height: 400px;"
                                // On change l\'URL du fichier
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
            <button type="submit" class="btn btn-primary my-auto w-50" onclick="loader()">'; if(isset($result)){ echo "Modifié";} else { echo"Envoyé";} echo'</button>
            </form>
        </div>
    </div>
</div>';
}