<br>
<br>
<div class="container-fluid" style="min-height : 71vh!important;">
    <div class="row">
        <table class="table table-striped table-responsive-sm my-5 mx-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col" colspan="3">Prénoms</th>
                    <th scope="col-5">Total note</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php foreach ($AllUsers as $key => $Users) { ?>
                <thead>
                    <!-- Nom et donner note de frais user -->
                    <tr style="background-color: #7a7a7a ;">
                        <th scope="row">
                            <button class="btn btn-primary rounded-circle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $Users['Id'] ?>" aria-expanded="false" aria-controls="collapseExample<?= $Users['Id'] ?>">
                                <i class="bi bi-arrow-down-circle"></i>
                            </button>
                        </th>
                        <th class="text-white"><?= $Users['Nom'] ?></th>
                        <th class="text-white" colspan="3"><?= $Users['Prenom'] ?></th>
                        <th class="text-white"></th>
                        <th class="text-white"></th>
                        <th class="text-white"></th>
                        <!-- Button SUPP and ACCP -->
                        <th class="text-center">
                            <button type="button" class="btn btn-dange"></button>
                            <button type="button" class="btn btn-succes"></button>
                        </th>
                    </tr>
                </thead>

                <!-- Mission Users -->
                <?php foreach ($All_data_ndf as $key => $AlldataNDF) { ?>
                    <?php if ($AlldataNDF['Id_Utilisateur'] === $Users['Id']) { ?>
                        <thead class="collapse" id="collapseExample<?= $Users['Id'] ?>">
                            <!-- Nom et donner note de frais user -->
                            <tr style="background-color: #0066ff ;">
                                <th>
                                    <button class="btn btn-primary rounded-circle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2<?= $AlldataNDF['Id_ndf'] ?>" aria-expanded="false" aria-controls="collapseExample2<?= $AlldataNDF['Id_ndf'] ?>">
                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                </th>
                                <th class="text-white"></th>
                                <th class="text-white" colspan="3"><?= $AlldataNDF['Mission'] ?></th>
                                <th class="text-white"><?= $AlldataNDF['Date'] ?></th>
                                <th class="text-white"></th>
                                <th class="text-white"></th>
                                <!-- Button SUPP and ACCP -->
                                <th class="text-center">
                                    <button type="button" class="btn btn-danger">Refuser tout</button>
                                    <button type="button" class="btn btn-success">Accepter tout</button>
                                </th>
                            </tr>
                        </thead>

                        <!-- start second partie table -->
                        <!-- Deuxième tableau pour détail note de frais User -->
                        <thead class="collapse" id="collapseExample2<?= $AlldataNDF['Id_ndf'] ?>">
                            <tr>
                                <td scope="row"></td>
                                <td class="font-weight-light font-italic"></td>
                                <td class="font-weight-light font-italic">Libélé</td>
                                <td class="font-weight-light font-italic"></td>
                                <td class="font-weight-light font-italic">Date</td>
                                <td class="font-weight-light font-italic">Total réglé</td>
                                <td class="font-weight-light font-italic">Justificatif</td>
                                <td class="font-weight-light font-italic"></td>
                                <td></td>
                            </tr>
                        </thead>

                        <!-- Ligne de note de frais -->
                        <?php foreach ($all_ligne as $key => $ligne) { ?>
                            <?php if ($AlldataNDF['Id_ndf'] === $ligne['Id_ndf']) { ?>
                                <tbody class="collapse" id="collapseExample2<?= $ligne['Id_ndf'] ?>">
                                    <tr>
                                        <td scope="row"></td>
                                        <td></td>
                                        <td>
                                            <!-- Libélé du User -->
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?= $ligne['Detail'] ?></p>
                                                <p class="text-muted mb-0"></p>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td><?= $ligne['Date'] ?></td>
                                        <td><?= $ligne['Montant'] ?></td>
                                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $ligne['Id'] ?>">
                                                Voir le justificatif
                                            </button></td>
                                        <td></td>
                                        <td class="text-center">
                                            <button class="btn-sm btn-danger" id="BtnAccepted" data-statut="Accepté" data-id-ndf="<?= $ligne['Id_ndf'] ?>" data-id-ligne="<?= $ligne['Id'] ?>">Accepter</button>
                                            <button class="btn-sm btn-primary" id="BtnRefused" data-statut="Refusé" data-id-ndf="<?= $ligne['Id_ndf'] ?>" data-id-ligne="<?= $ligne['Id'] ?>">Refuser</button>
                                            <p id="resultatDecision"></p>
                                        </td>
                                    </tr>
                                </tbody>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter<?= $ligne['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Justificatif</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row justify-content-center">
                                                        <img src="uploads/<?= $ligne['Justificatif'] ?>" width="300" height="300" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                                <button type="button" class="btn btn-primary"><a href="uploads/<?= $ligne['Justificatif'] ?>" target="_blank" class="text-decoration-none" style="color: #fff;">Voir</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- End table -->
        </table>
    </div>
</div>
<!-- js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#BtnAccepted, #BtnRefused').on('click', function() {
            let id_ndf = $(this).data('id-ndf');
            let id_ligne = $(this).data('id-ligne');
            let statut = $(this).data('statut');

            $.ajax({
                url: 'vue/Accueil/model.php',
                method: 'POST',
                data: {
                    id_ndf: id_ndf,
                    id_ligne: id_ligne,
                    statut: statut
                },
                dataType: 'json',
                success: function(result) {
                    console.log('Valeurs envoyées : ', {
                        id_ndf: id_ndf,
                        id_ligne: id_ligne,
                        statut: statut
                    });
                    $('#BtnAccepted, #BtnRefused').remove();
                    $('#resultatDecision').text(result);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<br>
<br>