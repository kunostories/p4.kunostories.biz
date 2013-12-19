<div class="row">
	<div class="col-sm-6 col-sm-offset-3 well">
		<form method="POST" action="/users/p_login" role="form">
			<h2>Log in</h2>
			
			<!-- show error message if set -->
			<?php if(isset($error)): ?>
			
			<div>
				<p class="text-danger">
					<?=$error ?>
				</p>
			</div>
			
			<br>
			
			<?php endif; ?>

			<!-- only need alias and password to log in -->
			<div class="form-group">
			    <label for="alias">Alias</label>
			    <input type="text" name="alias" class="form-control" placeholder="alias name" required>
			</div>

			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" name="password" class="form-control" placeholder="password" required>
			</div>

			<input class="btn btn-lg btn-primary" type="submit" value="Log in">
		</form>
	</div>
</div><!--/.row-->