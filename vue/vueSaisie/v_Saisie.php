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
            <form class="row justify-content-center d-flex" action="index.php?ctl=notedefrais&action=saisie">

                <div class="col-lg">
                    <div class="row d-flex form-control mx-auto">
                        <label class="text-left col-lg p-0" for="type">Type </label>
                        <select class="ml-auto col-lg" name="type">
                            <option value="">Restaurant</option>
                            <option value="">Titre de transport</option>
                            <option value="">Parking</option>
                            <option value="">Péage</option>
                            <option value="">autres</option>
                        </select>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto">
                        <label class="text-left col-lg p-0" for="date">Date </label>
                        <input class="ml-auto col-lg" type="date" name="date" required>
                    </div>
                    <div class="row d-flex form-control mt-5 mx-auto mb-5">
                        <label class="text-left col-lg p-0" for="montant">Montant </label>
                        <input class="ml-auto col-lg" type="number" name="montant" placeholder="€" required>
                    </div>
                </div>

                <div class="col-lg border" style="min-height : 11vh!important;">
                    <input class="text-left" type="file" name="file" required>
                </div>
            
        </div>
        <div class="row border d-flex justify-content-around text-center" style="min-height : 11vh!important;">
            <button type="submit" class="btn btn-primary my-auto w-50">Envoyé</button>
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