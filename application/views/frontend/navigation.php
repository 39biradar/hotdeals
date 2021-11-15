<nav>
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-custom">
          <?php foreach($categories as $row) { if($row['is_menu']==1) { ?>   
                  
            <li><a  href="<?php echo site_url(); ?>submitdeal/category/<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
            <?php }} ?>
          </ul>
          
        </div>
      </nav>
    </div>
  </div>
</nav>
</header>
