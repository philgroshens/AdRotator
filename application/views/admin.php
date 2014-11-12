<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
form input[type="text"], form input[type="email"], form input[type="password"] { 
display: block;
width: 50%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
-webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
} 
.chzn-single, .chzn-default, .chzn-container {
height: 30px !important;
line-height: 30px !important; }
.chzn-drop, .chzn-single-with-drop { width: auto !important; }
.chzn-container-single .chzn-single abbr { display: none; }
#field_weight_chzn .chzn-drop { width: 50px !important; }
</style>
</head>
<body>
<!-- Beginning header -->
<nav class="navbar navbar-default navbar-static-top navbar-inverted" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">adrotator</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href='<?php echo site_url('admin/rotators')?>'>Ad Rotators</a></li>
        <li><a href='<?php echo site_url('admin/links')?>'>Links</a></li>
    <li class="pull-right"><a href="<?php echo site_url('admin/logout')?>">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>


<!-- End of header-->
    <div style='height:20px;'></div>  
    <div class="container">
    
        
 
        <?php echo $output; ?>
 
    </div>
<!-- Beginning footer -->
<footer class="footer">
      <div class="container">
        <p class="text-muted">Node IP: <?php echo $_SERVER['X_REAL_IP']; ?> | Powered by the AdCloud Platform. | ©2014 All Rights Reserved.</p>
      </div>
    </footer>
<!-- End of Footer -->
</body>
</html>