<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">

		<!-- sign up form -->
		<form method="POST" action="/users/p_signup" role="form">
			<h2>Sign up</h2>
			
			<!-- error message -->
			<?php if(isset($error)): ?>
			
			<div>
				<p class="text-danger">
					<?=$error ?>
				</p>
			</div>
			
			<br>

			<?php endif; ?>
			
			<!-- alias, email, and password to sign up -->
			<div class="form-group">
				<label for="alias">Alias</label>
				<input type="text" name="alias" class="form-control" placeholder="alias name" required>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" placeholder="your@email.com" required>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" placeholder="password" required>
			</div>

			<input class="btn btn-lg btn-success" type="submit" value="Sign up">
		</form>
		
	</div>
</div> <!--/.row-->