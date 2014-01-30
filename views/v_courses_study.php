<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<!-- show success message if set -->
		<?php if(isset($success)): ?>
		<div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-success">
				<?=$success ?>
			</p>
		</div>
		<?php endif; ?>
		<!-- show error message if set -->
		<?php if(isset($error)): ?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-danger">
				<strong>Whoops!</strong> <?=$error ?>
			</p>
		</div>
		<?php endif; ?>

		<h2><?= $course["title"]; ?></h2>
		<div class="pull-left">
			<img alt="Course logo" class="course-logo" src="/img/<?= $course["logo"]; ?>">
		</div>
		<p>
			<?= $course["about"]; ?>
		</p>
		<div class="clearfix"></div>
			<div class="progress progress-striped">
			  <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?= ($course["progress"]/$course["length"])*100; ?>%">
			  	<?= ($course["progress"]/$course["length"])*100; ?>%
			  </div>
			</div>
		<ol>
			<? foreach($contents as $content): ?>
			<li>
				<h4>
					<a href="/courses/study/<?= $course["url"]; ?>/<?= $content["url"]; ?>">
						<?= $content["title"]; ?>
					</a>
				</h4>
			</li>
			<? endforeach; ?>
		</ol>

	</div>

</div> <!--/.row-->