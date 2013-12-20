<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<h2><?= $contents["title"]; ?></h2>
		
		<video width="540" controls>
			<source src="/vids/<?= $contents["url"]; ?>.m4v" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		<p>
			<a href="/courses/study/<?= $course["url"]; ?>" class="btn btn-primary btn-lg">Back to Course Contents <span class="glyphicon glyphicon-list-alt"></span></a>
			<a href="/courses/study/<?= $course["url"]; ?>/<?= $contents["next"]; ?>" class="btn btn-success btn-lg">Next Lesson <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
		</p>

	</div>

</div> <!--/.row-->