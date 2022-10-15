<div class="col-lg-4 mx-auto rounded border my-auto w-25 shadow" style="color: #1A4087;">
   <h1 class="text-center mt-3">CONNEXION</h1>
   <form class="fluid-form text-center" action="index.php?ctl=utilisateur&action=connect" method="post">
      <!--<input type="hidden" name="ctl" value="utilisateur">
      <input type="hidden" name="action" value="connect">-->
      <input class="form-control mt-5 shadow" type="email" name="email" placeholder="Email" required style="color: #1A4087;">
      <input class="form-control mt-2 shadow" type="password" name="password"  placeholder="Mot de passe" required style="color: #1A4087;">
      <input class="form-control btn btn-light mt-5 border w-75 shadow" type="submit" style="color: #1A4087;">
   </form>
</div>
<?php
if(isset($_GET['msg'])){
   echo "<h4 class='text-center mt-5 text-danger'>".$_GET['msg']."<h4>";
}
?>