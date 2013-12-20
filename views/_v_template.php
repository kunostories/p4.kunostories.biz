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
		
	</head>

	<body>
		<div class="container">

			<div class="header">
				<ul class="nav nav-pills pull-right">

					<!-- user not logged in-->
					<? if(!$user): ?>
					
					<li><a href="/users/signup">Sign up</a></li>
					<li class="dropdown">
		                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Log In <b class="caret"></b></a>
		                <div class="col-sm-4 dropdown-menu pull-right" style="width: 300px; padding: 15px; padding-bottom: 0px;">
		                	<form method="POST" class="form-horizontal" action="/users/p_login" role="form">			
								<!-- show error message if set -->
								<?php if(isset($error)): ?>
								<div>
									<p class="text-danger">
										<?=$error ?>
									</p>
								</div>
								<br>			
								<?php endif; ?>

								<!-- log in with alias and password -->
								<div class="form-group">
									<label class="col-sm-3 control-label">Alias</label>
									<div class="col-sm-9">
										<input type="text" name="alias" class="form-control" placeholder="alias name" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Pass</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="password" name="password" class="form-control" placeholder="password" required>
											<span class="input-group-btn">
												<input class="btn btn-primary pull-right" type="submit" value="Log in">
											</span>
										</div><!--/.input-group -->
									</div>
								</div>

							</form>
		                </div>
		            </li>

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

	</body>
</html>