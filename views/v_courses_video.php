<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<h2><?= $contents["title"]; ?></h2>
		
		<video width="100%" controls>
			<source src="/vids/<?= $contents["url"]; ?>.m4v" type="video/mp4">
			Your browser does not support the video tag.
		</video>
		<div id="controls">
			<?php if(isset($contents["previous"])): ?>
			<a href="/courses/study/<?= $course["url"]; ?>/<?= $contents["previous"]; ?>" class="btn btn-success btn-lg pull-left"><span class="glyphicon glyphicon-circle-arrow-left"></span> Previous Lesson</a>
			<?php endif; ?>
			<?php if(isset($contents["next"])): ?>
			<a href="/courses/study/<?= $course["url"]; ?>/<?= $contents["next"]; ?>" class="btn btn-success btn-lg pull-right">Next Lesson <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
			<?php endif; ?>
		</div>

	</div>

	<div class="col-sm-4">
		<a href="/courses/study/<?= $course["url"]; ?>">Back to Course Contents <span class="glyphicon glyphicon-list-alt"></span></a>
	</div>

</div> <!--/.row-->