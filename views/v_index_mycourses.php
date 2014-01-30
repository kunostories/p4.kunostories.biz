<div class="row">

	<!-- left column-->
	<div class="col-sm-8">

		<!-- show error message -->
		<?php if(isset($error)): ?>
		<div class="alert alert-warning fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-warning">
				<strong>Whoops!</strong> <?=$error ?>
			</p>
		</div>
		<?php endif; ?>

		<h1>My Lessons</h1>
		<? foreach($courses as $course): ?>
		<div class="well">
			<h2><?= $course["title"]; ?></h2>
			<div class="pull-left">
				<a href="/study/<?= $course["url"]; ?>">
					<img alt="Course logo" class="course-logo" src="/img/<?= $course["logo"]; ?>">
				</a>
			</div>
			<p>
				<?= $course["about"]; ?>
			</p>
			<div class="clearfix"></div>
			<div class="progress progress-striped">
			  <div class="progress-bar progress-bar-primary" role="progressbar" style="width: <?= ($course["progress"]/$course["length"])*100; ?>%">
			  	<?= ($course["progress"]/$course["length"])*100; ?>%
			  </div>
			</div>
			<p>
				<a href="/courses/study/<?= $course["url"]; ?>" class="btn btn-success btn-lg">Continue Course</a>
			</p>
		</div>
		<? endforeach; ?>

	</div>

	<!-- right column-->
	<div id="profile" class="col-sm-4">
		
    	<h1><? echo $user->alias; ?></h1>
        <div class="well">
        	<?php if(!empty($user->logo)): ?>
			<img src="/uploads/avatars/<?=$user->logo; ?>" class="img-circle" alt="user logo">
			<?php endif; ?>
          <p>
            <strong>Name: </strong> <? echo $user->first_name . " " . $user->last_name; ?>
          </p>
          <p>
            <strong>Email: </strong> <? echo $user->email; ?>
          </p>
          <p>
            <strong>Location: </strong> <? echo $user->location; ?>
          </p>
          <p>
            <strong>Age: </strong> <? echo $user->age; ?>
          <p>
            <strong>User since: </strong> <? echo date('M d, Y', $user->created); ?>
          </p>
          </p>
        </div>
	</div>


</div> <!--/.row-->