<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo site_url();?>admin/login"><span>HotDeals</span>Admin</a>
      <ul class="user-menu">
        <li><a href="<?php echo site_url();?>admin/login/logout">
          <svg class="glyph stroked cancel">
            <use xlink:href="#stroked-cancel"></use>
          </svg>
          Logout</a></li>
      </ul>
    </div>
  </div>
  <!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <ul class="nav menu">
    <li <?php echo $active_menu=='dashboard' ? 'class="active"' : 'class=""' ?> ><a href="<?php echo site_url();?>admin/dashboard">
      <svg class="glyph stroked dashboard-dial">
        <use xlink:href="#stroked-dashboard-dial"></use>
      </svg>
      Dashboard</a></li>
      <li <?php echo $active_menu=='deals' ? 'class="active"' : 'class=""' ?> ><a href="<?php echo site_url();?>admin/dashboard/deal_listing">
      <svg class="glyph stroked dashboard-dial">
        <use xlink:href="#stroked-dashboard-dial"></use>
      </svg>
      Deals</a></li>
    <li <?php echo $active_menu=='users' ? 'class="active"' : 'class=""' ?>><a href="<?php echo site_url();?>admin/dashboard/userListing">
      <svg class="glyph stroked app-window">
        <use xlink:href="#stroked-app-window"></use>
      </svg>
      Users</a></li>
   
    <li <?php echo $active_menu=='category' ? 'class="active"' : 'class=""' ?>><a href="<?php echo site_url();?>admin/dashboard/categoryListing">
      <svg class="glyph stroked star">
        <use xlink:href="#stroked-star"></use>
      </svg>
      Category</a></li>
    
   
    
  </ul>
</div>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
  <ol class="breadcrumb">
    <li><a href="#">
      <svg class="glyph stroked home">
        <use xlink:href="#stroked-home"></use>
      </svg>
      </a></li>
    <li class="active">Icons</li>
  </ol>
</div>
<!--/.row-->
