<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Shawn Roe" />

		<title><?php if(isset($title)) echo $title; ?></title>

		<link href="/libraries/bootstrap/css/bootstrap-united.css" rel="stylesheet"/>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/p4-css.css" type="text/css">
		
	</head>

	<body>
		<div class="header">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				      <span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				    <!-- logo and title link back to homepage -->
					<a class="navbar-brand" href="/">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-level-up fa-stack-1x"></i>
						  <i class="fa fa-comment-o fa-stack-2x"></i>
						</span>
						<span id="nav-title">YourESL.com</span>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav pull-right">

						<!-- user not logged in-->
						<? if(!$user): ?>
						
						<li><a href="/users/signup">Sign up</a></li>
						<li class="dropdown">
			                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><strong>Log In <b class="caret"></b></strong></a>
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
										<label class="col-sm-4 control-label">Nickname</label>
										<div class="col-sm-8">
											<input type="text" name="alias" class="form-control" placeholder="nickname" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Password</label>
										<div class="col-sm-8">
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

						<li><a href="/courses">Browse Lessons</a></li>
						<li><a href="/">My Lessons</a></li>
						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$user->alias; ?>  <span class="caret"></span></a>
							<ul id="nav-dropdown" class="dropdown-menu">
								<li><a href="/users/profile/<?=$user->alias ?>">Profile</a></li>
								<li><a href="/">My Lessons</a></li>
								<li class="divider"></li>
								<li><a href="/users/logout"><i class="icon-off"></i> Logout</a></li>
							</ul>
						</li>
						
						<? endif; ?>
					
					</ul>
				</div>
			</nav>

		</div><!--/.header-->
		<div class="container">
			<div class="clearfix"></div>

			<div class="main-content row">

				<?php if(isset($content)) echo $content; ?>
				<?php if(isset($client_files_body)) echo $client_files_body; ?>
			
			</div> <!--/#main-content-->

			<div id="footer" class="row">
				<p>&copy; YourESL.com 2014</p>
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
		<script src="/js/jquery.validate.min.js"></script>
		<script src="/js/additional-methods.min.js"></script>
		<script src="/js/p4-js.js"></script>

		<!-- Controller Specific JS/CSS -->
		<?php if(isset($client_files_head)) echo $client_files_head; ?>

	</body>
</html>