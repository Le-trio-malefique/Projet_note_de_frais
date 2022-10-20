<!-- CARD NEW NOTE DE FRAIS -->
<div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
    <!-- CARD BOX -->
    <div class="col-md-7 border rounded shadow my-md-5">
        <!-- TITRE -->
        <div class="row border" style="min-height : 11vh!important;">
            <h4 class="text-left my-auto p-2 ml-3">Note de frais</h4>
        </div>
        <!-- TEXTE -->
        <div class="row text-center" style="min-height : 70vh!important;">
            <div class="mt-5 mx-5 w-100">
        <?php
            if(isset($result)){
                echo "<table class='table-striped w-100'>";
                foreach ($result as $row){
                    echo "<tr>
                                <td class='p-3'>
                                    ".$row['Date']."
                                </td>
                                <td class='p-3'>
                                    <a class='btn btn-primary' href='#'>Saisir des frais</a>
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
        ?>
            </div>
        </div>
        <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
            <a class='p-3 my-auto' href="index.php?ctl=notedefrais&action=newNote"><button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> &nbsp Crée une nouvelle note de frais</button></a>
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