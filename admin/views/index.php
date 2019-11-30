<?php fnGetHeader(array("title"=>"Login"),null,null,false,"bg-dark"); ?>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xxl"> <a class="navbar-brand block" href="<?php echo URL; ?>"><?php echo SITENAME; ?></a>
    <section class="panel panel-default bg-white m-t-lg">
      <header class="panel-heading text-center"> <strong>Sign in</strong> </header>
      
      <?php echo @$this->noti; ?>
      
      <form action="<?php echo URL; ?>" class="panel-body wrapper-lg" method="post">
        <div class="form-group">
          <label class="control-label">Username</label>
          <input type="test" name="username" placeholder="Username" class="form-control input-lg">
        </div>
        <div class="form-group">
          <label class="control-label">Password</label>
          <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
        </div>
        
        <button type="submit" name="Login" class="btn btn-primary">Sign in</button>
      </form>
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p> <small><?php echo SITENAME; ?><br>
      &copy; <?php echo date('Y'); ?></small> </p>
  </div>
</footer>
<!-- / footer --> <script src="<?php echo URL.VIEW ?>js/app.v2.js"></script> 
</body>
</html>