<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

		<!-- show courses enrolled in -->
		<? if($enrolled != NULL) { ?>
		<h2>My Courses</h2>
		<? foreach($enrolled as $enroll): ?>
		<div class="well">
			<h4><?= $enroll["title"]; ?></h4>
			<div class="pull-left">
				<a href="/courses/view/<?= $enroll["url"]; ?>">
					<img src="/img/<?= $enroll["logo"]; ?>">
				</a>
			</div>
			<p>
				<?= $enroll["about"]; ?>
			</p>
			<div class="clearfix"></div>

			<!-- show button to continue studying the course -->
			<p>
				<a href="/courses/study/<?= $enroll["url"]; ?>" class="btn btn-success">Continue Course</a>
			</p>
		</div>
		<? endforeach;
			} ?>

		<!-- show error message if user not enrolled in any courses -->
		<?php if(isset($error)): ?>
		<div class="alert alert-warning fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p class="text-warning">
				<strong>Hey there!</strong> <?=$error ?>
			</p>
		</div>
		<?php endif; ?>

		<!-- next show courses not enrolled in -->
		<? if($courses != NULL) { ?>
		<h2>Enroll in a Course</h2>
		<? foreach($courses as $course): ?>
		<div class="well">
			<h4><?= $course["title"]; ?></h4>
			<div class="pull-left">
				<a href="/courses/view/<?= $course["url"]; ?>">
					<img src="/img/<?= $course["logo"]; ?>">
				</a>
			</div>
			<p>
				<?= $course["about"]; ?>
			</p>
			<div class="clearfix"></div>

			<!-- button to preview course and to enroll in course -->
			<p>
				<a href="/courses/view/<?= $course["url"]; ?>" class="btn btn-primary">View Course Page</a>
				<a href="/courses/enroll/<?= $course["url"]; ?>" class="btn btn-success">Enroll in Course</a>
			</p>
		</div>
		<? endforeach; 
			} ?>
	</div>

	<!-- right column-->
	<div id="profile" class="col-sm-4">
        <h1><? echo $user->alias; ?></h1>
        <div class="well">
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
          </p>
        </div>
	</div>

</div> <!--/.row-->