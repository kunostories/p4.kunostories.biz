<div class="row">
	<div class="col-sm-12">

		<!-- begin error if clause -->
		<? if(isset($error)): ?>

			<!-- only show large error message, no profile -->
			<h2>
				<span class='text-danger'><?=$error;?></span>
			</h2>
		<? else: ?>

		<!-- if no error, show alias' name and profile in an uneditable form -->
		<h1>Profile of <?=$alias['alias']?></h1>

		<form>
			<div class="form-group">
				<label for="email">Email:</label>
				<?=$alias['email']?>
			</div>

			<div class="form-group">
				<label for="first_name">First Name:</label>
				<?=$alias['first_name']?>
			</div>

			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<?=$alias['last_name']?>
			</div>

			<div class="form-group">
				<label for="Location">Location:</label>
				<?=$alias['location']?>
			</div>

			<div class="form-group">
				<label for="age">Age:</label>
				<?=$alias['age']?>
			</div>
		</form>

		<!-- If there exists a connection with this user, show an unfollow link -->
		    <?php if(isset($connections[$alias['user_id']])): ?>
		    
		        <a href='/posts/unfollow/<?=$alias['user_id']?>' class="btn btn-warning">
		        	Unfollow
		        </a>

		    <!-- Otherwise, show the follow link -->
		    <?php else: ?>
		    
		        <a href='/posts/follow/<?=$alias['user_id']?>' class="btn btn-success">
		        	Follow
		        </a>
		    
		    <?php endif; ?>

		<? endif; ?><!-- end of error if clause -->

		<br>

	</div>
</div><!--/.row-->