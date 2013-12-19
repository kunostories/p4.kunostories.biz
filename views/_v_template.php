<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Shawn Roe" />

		<title><?php if(isset($title)) echo $title; ?></title>

		<link href="/libraries/bootstrap/css/bootstrap.css" rel="stylesheet"/>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/p4-css.css" type="text/css">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="../../assets/js/html5shiv.js"></script>
		  <script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="/libraries/bootstrap/js/bootstrap.min.js"></script>
		<script src="/js/p4-js.js"></script>
		

		<!-- Controller Specific JS/CSS -->
		<?php if(isset($client_files_head)) echo $client_files_head; ?>
		
	</head>

	<body>
		<div class="container">

			<div class="header">
				<ul class="nav nav-pills pull-right">

					<!-- user not logged in-->
					<? if(!$user): ?>
					
					<li><a href="/users/signup">Sign up</a></li>
					<li><a href="/users/login">Log in</a></li>
					
					<!-- user logged in -->
					<? else: ?>

					<li><a href="/courses">All Courses</a></li>
					<li><a href="/">My Courses</a></li>
					<li><a href="/users/profile/<?=$user->alias ?>">Profile for <?=$user->alias; ?></a></li>
					<li><a href="/users/logout">Logout</a></li>
					
					<? endif; ?>
				
				</ul>
				
				<!-- logo and title link back to homepage -->
				<a class="navbar-brand" href="/">
					<img src="/img/SBE-logo-75.png" alt="SBE logo">
					<img src="/img/english-courses-title.png" alt="EC title">
				</a>

			</div><!--/.header-->

			<div class="clearfix"></div>

			<div class="main-content row">

				<?php if(isset($content)) echo $content; ?>
				<?php if(isset($client_files_body)) echo $client_files_body; ?>
			
			</div> <!--/#main-content-->

			<div id="footer" class="row">
				<p>&copy; SBE English Courses 2013</p>
			</div><!--/#footer-->

		</div> <!--/.container-->
	</body>
</html>