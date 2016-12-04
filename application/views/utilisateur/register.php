<?php echo validation_errors(); ?>
<div class="container">
  <h1 class="center">Inscription</h1>
  <?php echo form_open('Utilisateurs/verify_register'); ?>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="username1" pattern=".{3,}" type="text" name="username1" required title="Au moins 3 caractère.">
      <label for="username1" data-error="Déja utilisé !">Username :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="email" type="email" name="email" required>
      <label id="email_label" for="email" data-error="Déja utilisé !" data-success="">Email :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="password1" type="password" name="password1" required>
      <label for="password1">Mot de passe :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="password_confirmation" type="password" name="password_confirmation" required>
      <label for="password_confirmation" data-error="Les mots de passe ne sont pas identique !" data-success="Les mots de passe sont identique !">Confirmation du mot de passe :</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <select id="question" name="question" required class="validate">
      <option value="" disabled selected>Question secrete</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Choisissez une question secrète</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4 offset-s4">
      <input id="answer" type="text" name="answer" required>
      <label for="answer">Réponse :</label>
    </div>
  </div>
  <div class="row">
    <div class="center">
      <input class="btn redtype test" id="submit" type="submit" value="Inscription"/>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>
