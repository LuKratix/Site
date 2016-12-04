</main>
<!--Pied de page -->
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2016 Copyright Arslak.fr
    </div>
  </div>
</footer>
<!-- script -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>>
<script type="text/javascript" src="<?php echo site_url().'js/materialize.js'?>"></script>
<script type="text/javascript" src="<?php echo site_url().'js/myjs.js'?>"></script>
<script type="text/javascript">
  var CFG = {
    token : '<?php echo $this->security->get_csrf_hash(); ?>',
    url : '<?php echo base_url(); ?>',
  };

</script>
</body>
</html>
