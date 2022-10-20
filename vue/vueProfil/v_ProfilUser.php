<?php
session_start();

require "../enTete.php";
require "../menu.php";

?>
<br>
<br>
<div class="container">
    <!-- Div du background -->
    <div class="row rounded" style="background-color: #FFF7F0;">
        <!-- Div du tableau 1 -->
        <div class="col-sm-12 p-5">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <!-- Title board -->
                        <thead>
                            <tr>
                                <th scope="col">CHECKBOX</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">État</th>
                                <th scope="col">Total de la note</th>
                                <th scope="col">Total règlé</th>
                                <th scope="col">Reste dû</th>
                                <th scope="col">BUTTON</th>
                            </tr>
                        </thead>
                        <!-- End title board -->

                        <!-- Second table User -->
                        <div class="row ">
                            <div class="mx-auto bg-info w-75">
                                <tbody>
                                    <tr>
                                        <table class="table table-hover">
                                            <thead>
                                                <!-- Name User is la bro ! 👍 -->
                                                <tr>
                                                    <td colspan="7">Name User </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">First</th>
                                                    <th scope="col">Last</th>
                                                    <th scope="col">Handle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td colspan="2">Larry the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                            </div>
                        </div>
                        <!-- End second table -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include '../pied.php';
?>