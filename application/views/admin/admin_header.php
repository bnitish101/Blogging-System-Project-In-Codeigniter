<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>Admin Panel</title>
	<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <!--form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        <li>
			<!--a href=" <!--?= /**base_url('login/logout')*/ ?> ">Logout</a-->
			<?= anchor('login/logout', 'Logout') ?>
			<!--?= anchor('login/logout', 'Logout', ['class'=>'btn btn-primary'])?-->
		</li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>