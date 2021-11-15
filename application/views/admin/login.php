<?php include('header.php'); ?>
<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">Log in</div>
      <div class="panel-body"> <?php echo form_open('admin/login') ?>
        <fieldset>
        <div class="form-group">
          <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus="">
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="Password" name="password" type="password" value="">
        </div>
        <div class="checkbox">
          <label>
          <input name="remember" type="checkbox" value="Remember Me">
          Remember Me </label>
        </div>
        <input class="btn btn-primary" type="submit" value="Login"/>
        <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
        <input type="hidden" value="submitted" name="submitted"/>
        </fieldset>
        <?php echo  form_close(); ?> </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row -->
<?php include('footer.php'); ?>
