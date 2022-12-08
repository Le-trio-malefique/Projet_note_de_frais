<?php
if($_GET['action'] == 'lister'){

    echo '
    <!-- CARD NEW NOTE DE FRAIS -->
    <div class="row w-100 mx-auto d-flex justify-content-center mt-3" style="min-height : 100vh!important;">
        <!-- CARD BOX -->
        <div class="col-md-7 border rounded shadow my-md-5">
            <!-- TITRE -->
            <div class="row border" style="min-height : 11vh!important;">
                <h4 class="text-left my-auto p-2 ml-3">Historique</h4>
            </div>
            <!-- TEXTE -->
            <div class="row text-center" style="min-height : 70vh!important;">
                <div class="mt-5 mx-5 w-100">';
            
                if(isset($valid_ndf)){
                    echo "<table class='table-striped w-100'>";
                    foreach ($valid_ndf as $id_ndf){
                        $ndf = get_info_ndf($id_ndf);
                        echo "<tr>
                                    <td class='p-3'>
                                        ".$ndf['Mission']."
                                    </td>
                                    <td class='p-3'>
                                        ".$ndf['Date']."
                                    </td>
                                    <td class='p-3 d-flex-lg justify-content-center'>
                                        <a class='btn btn-primary mx-auto w-100' style='max-width : 200px!important;' href='index.php?vue=1&ctl=notedefrais&action=listeFrais&Id_ndf=".$ndf['Id_ndf']."'>Consulter</a>
                                    </td>
                                </tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo '<h1>
                            Aucun historique...
                        </h1>';
                }
            echo'
                </div>
            </div>
        </div>
    </div>';
}

if($_GET['action'] == 'lister'){
    
}

?>