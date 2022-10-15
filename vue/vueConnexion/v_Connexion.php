<div class="col-lg-4 mx-auto rounded border border-secondary my-auto w-25" style="background-color : #fff7f0!important;">
   <h1 class="text-center mt-3">CONNEXION</h1>
   <form class="fluid-form" action="index.php?ctl=utilisateur&action=connect" method="post">
      <!--<input type="hidden" name="ctl" value="utilisateur">
      <input type="hidden" name="action" value="connect">-->
      <input class="form-control mt-5" type="email" name="email" placeholder="Email" required>
      <input class="form-control mt-2" type="password" name="password"  placeholder="Mot de passe" required>
      <input class="form-control bg-dark text-white mt-5" type="submit">
   </form>
</div>
<?php
if(isset($_GET['msg'])){
   echo "<h4 class='text-center mt-5 text-danger'>".$_GET['msg']."<h4>";
}
?>