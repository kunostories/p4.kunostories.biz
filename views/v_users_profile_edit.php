<div class="row">

	<div class="col-sm-6 col-sm-offset-3 well">
		<h1>Edit Profile of <?=$user->alias?></h1>

		<!-- show error message if set -->
		<?php if(isset($error)): ?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-danger">
				<?=$error ?>
			</p>
		</div>
		<?php endif; ?>

		<!-- show success message if set -->
		<?php if(isset($success)): ?>
		<div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-success">
				<?=$success ?>
			</p>
		</div>
		<?php endif; ?>

		<form method="POST" action="/users/p_edit" role="form">
			<div class="form-group">
				<label for="alias">Alias:</label>
				<input type="text" name="alias" class="form-control" value="<?=$user->alias?>" required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control" value="<?=$user->email?>" required>
			</div>

			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" class="form-control" value="<?=$user->first_name?>">
			</div>

			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" class="form-control" value="<?=$user->last_name?>">
			</div>

			<div class="form-group">
				<label for="location">Location:</label>
				<input type="text" name="location" class="form-control" value="<?=$user->location?>">
			</div>

			<div class="form-group">
				<label for="age">Age:</label>
				<input type="number" min="5" max="109" step="1" name="age" class="form-control" value="<?=$user->age?>">
			</div>

			<input class="btn btn-lg btn-warning" type="submit" value="Edit Profile">
		</form>
		<br>
	</div> <!--/.well-->
</div> <!--/.row-->