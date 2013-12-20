<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<!-- show error message -->
		<?php if(isset($error)): ?>
		<div class="alert alert-warning fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-warning">
				<strong>Whoops!</strong> <?=$error ?>
			</p>
		</div>
		<?php endif; ?>

		<h2>My Courses</h2>
		<? foreach($courses as $course): ?>
		<div class="well">
			<h3><?= $course["title"]; ?></h3>
			<div class="pull-left">
				<a href="/study/<?= $course["url"]; ?>">
					<img alt="Course logo" src="/img/<?= $course["logo"]; ?>">
				</a>
			</div>
			<p>
				<?= $course["about"]; ?>
			</p>
			<div class="clearfix"></div>
			<div class="progress progress-striped">
			  <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?= ($course["progress"]/$course["length"])*100; ?>%">
			  </div>
			</div>
			<p>
				<a href="/courses/study/<?= $course["url"]; ?>" class="btn btn-primary">Continue Course</a>
			</p>
		</div>
		<? endforeach; ?>

	</div>

</div> <!--/.row-->