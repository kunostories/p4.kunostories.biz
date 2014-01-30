		<!-- begin log in module form -->
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
				<label for="alias" class="col-sm-3 control-label">Nickname</label>
				<div class="col-sm-9">
					<input type="text" name="alias" class="form-control" placeholder="nickname" required>
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Password</label>
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
