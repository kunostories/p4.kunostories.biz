<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<h2>My Courses In Progress</h2>
		<? foreach($courses as $course): ?>
		<div class="well">
			<h4><?= $course["title"]; ?></h4>
			<div class="pull-left">
				<a href="/study/<?= $course["url"]; ?>">
					<img src="/img/<?= $course["logo"]; ?>">
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
				<a href="/courses/study/<?= $course["url"]; ?>" class="btn btn-primary">Continue this Course</a>
			</p>
		</div>
		<? endforeach; ?>

	</div>

</div> <!--/.row-->