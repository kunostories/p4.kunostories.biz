<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<h2><?= $currentContents["title"]; ?></h2>
		
		<div id="lesson-content">
			<?= $currentContents["content"]; ?>
		</div>
		<div id="controls">
			<?php if(isset($currentContents["previous"])): ?>
			<a href="/courses/study/<?= $course["url"]; ?>/<?= $currentContents["previous"]; ?>" class="btn btn-success btn-lg pull-left"><span class="glyphicon glyphicon-circle-arrow-left"></span> Previous Lesson</a>
			<?php endif; ?>
			<?php if(isset($currentContents["next"])): ?>
			<a href="/courses/study/<?= $course["url"]; ?>/<?= $currentContents["next"]; ?>" class="btn btn-success btn-lg pull-right">Next Lesson <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
			<?php endif; ?>
		</div>

	</div>

	<div class="col-sm-4">
		<a  data-toggle="collapse" href="#courseContents">
			View Course Contents <span class="glyphicon glyphicon-list-alt"></span>
		</a>
		<div id="courseContents" class="collapse">
			<ol>
				<? foreach($contents as $content): ?>
				<li>
					<h4>
						<? if($content["url"] == $currentContents["url"]): ?>
							<strong><?= $content["title"]; ?></strong>
						<? else:?>
						<a href="/courses/study/<?= $course["url"]; ?>/<?= $content["url"]; ?>">
							<?= $content["title"]; ?>
						</a>
						<? endif;?>
					</h4>
				</li>
				<? endforeach; ?>
			</ol>
		</div>
	</div>

</div> <!--/.row-->