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
		<ol>
			<? foreach($contents as $content): ?>
			<li>
				<h4>
					<?= $content["title"]; ?>
				</h4>
			</li>
			<? endforeach; ?>
		</ol>
		<p>
			<a href="/courses/enroll/<?= $course["url"]; ?>" class="btn btn-success btn-lg">Enroll in Course</a>
		</p>
	</div>
</div> <!--/.row-->