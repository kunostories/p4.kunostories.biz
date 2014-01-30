		<!-- begin sign up module form -->
		<form method="POST" id="signup-form" class="form-horizontal" action="/users/p_signup" role="form">
			<h3>Sign up</h3>

			<!-- sign up with alias, email, and password -->
			<div class="form-group">
				<label for="alias" class="col-sm-4 control-label">Nickname</label>
				<div class="col-sm-8">
					<input type="text" name="alias" class="form-control" placeholder="nickname" required>
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-4 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" name="email" class="form-control" placeholder="your@email.com" required>
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password</label>
				<div class="col-sm-8">
					<input type="password" name="password" class="form-control" placeholder="password" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-success pull-right" type="submit">Sign up</button>
				</div>
			</div>
		</form>