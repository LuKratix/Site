<!-- Barre de navigation -->
<header>
  <div class="navbar-fixed">
      <ul id="notifications-dropdown" class="dropdown-content">
        <li>
          <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
          <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
        </li>
        <li>
          <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
          <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
        </li>
      </ul>
    <nav class="topNav">
      <div class="nav-wrapper">
        <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right">
        <?php if ($this->session->userdata('logged_in') == true): ?>
          <li><a href="<?php echo site_url('utilisateurs/log_out') ?>">déconexion</a></li>
        <?php else: ?>
          <li><a href="<?php echo site_url('utilisateurs') ?>">conexion</a></li>
        <?php endif; ?>
          <li>
            <a href="#" class="dropdown-button" style="display: flex;" data-activates="notifications-dropdown">
              <i class="material-icons">notifications</i>
              <span class="btn-floating center notification"><small>2</small></span>
            </a>
          </li>
          <li>
            <a href="#" class="dropdown-button small" style="display: flex;" data-activates="notifications-dropdown">
              <i class="material-icons">mail</i>
              <span class="btn-floating center notification"><small>127</small></span>
            </a>
          </li>
        </ul>
        <ul class="hide-on-med-and-down">
          <li class="blue-grey darken-4" ><a href="#"><i class="material-icons">home</i></a></li>
          <li><a href="#"><i class="material-icons left">public</i>Actualité</a></li>
          <li><a href="#"><i class="material-icons left">account_circle</i>Mon compte</a></li>
          <li><a href="#"><i class="material-icons left">forum</i>Forum</a></li>
        </ul>
        <ul id="mobile" class="side-nav">
          <li><a href="#">Home</a></li>
          <li><a href="#">Actualité</a></li>
          <li><a href="#">Mon compte</a></li>
          <li><a href="#">Forum</a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<main>
