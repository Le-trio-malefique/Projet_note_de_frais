<div class="row h-100 mx-3">
   <div class="col-lg-4 mx-auto mb-auto rounded border shadow p-3 align-middle" style="color: #1A4087; margin-top : 15vh!important;">
      <h1 class="text-center mt-3">CONNEXION</h1>
      <form class="fluid-form text-center" action="index.php?ctl=connection&action=connect" method="post">
         <input class="form-control mt-5 shadow" type="email" name="email" placeholder="Email" required style="color: #1A4087;">
         <input class="form-control mt-2 shadow" type="password" name="password" placeholder="Mot de passe" required style="color: #1A4087;">
         <input class="form-control btn btn-light mt-5 border w-75 shadow" type="submit" style="color: #1A4087;" name="validate">
      </form>
   </div>
</div>
<?php
// if (isset($_GET['msg'])) {
//    echo "<h4 class='text-center mt-5 text-danger'>" . $_GET['msg'] . "<h4>";
//


if (isset($Msgerrors)) {
   echo '<h6 class="alert alert-danger">' . $Msgerrors . '</h6';
}
?>