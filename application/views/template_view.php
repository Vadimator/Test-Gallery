<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Gallery</title>


	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/lightcase.css">
	<!-- Bootstrap -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST'] . '/'; ?>">Gallery</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/add'; ?>">Добавить новую картинку</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


	<div class="container">
		<?php include 'application/views/'.$content_view; ?>
	</div>	






	<div id="footer">
		<div class="container text-center">
			<p class="text-muted">&copy; <?=date('Y');?> Gallery, Inc.
				<a href="https://github.com/Vadimator/Test-Gallery" title="github">
					<i class="fa fa-github fa-2x" aria-hidden="true"></i>
				</a>
			</p>
		</div>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../js/jquery-1.12.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/lightcase.js"></script>
<script src="../../js/getAjax.js"></script>
<script src="../../js/editTitle.js"></script>
</body>
</html>