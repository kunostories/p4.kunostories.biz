<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">
		<h2><?= $course["title"]; ?></h2>
		<div class="pull-left">
			<a href="/courses/enroll/<?= $course["url"]; ?>">
				<img src="/img/<?= $course["logo"]; ?>">
			</a>
		</div>
		<p>
			<?= $course["about"]; ?>
		</p>
		<div class="clearfix"></div>
		<p>
			<a href="/courses/enroll/<?= $course["url"]; ?>" class="btn btn-success">Enroll in Course</a>
		</p>
	</div>
</div> <!--/.row-->