<?php echo validation_errors(); ?>
<div class="container">
  <h1 class="center">Connexion</h1>
  <?php echo form_open('utilisateurs/verify_login'); ?>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="username" type="text" name="username" required>
      <label for="username" data-error="Déja utilisé !" data-success="Correct !">Username :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="password" type="password" name="password" required>
      <label for="password">Password :</label>
    </div>
  </div>
  <div class="center">
    <input class="btn redtype" type="submit" value="Login"/><br>
    <b> OR </b><br>
    <a class="btn redtype" href="<?php echo base_url()?>utilisateurs/register">Inscription</a>
  </div>
  <?php echo form_close(); ?>
</div>
