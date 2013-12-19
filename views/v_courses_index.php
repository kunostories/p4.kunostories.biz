<div class="row">

	<!-- left column-->
	<div class="col-sm-8 well">

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
			<p>
				<a href="/courses/view/<?= $course["url"]; ?>" class="btn btn-primary">View Course Page</a>
				<a href="/courses/enroll/<?= $course["url"]; ?>" class="btn btn-success">Enroll in Course</a>
			</p>
		</div>
		<? endforeach; ?>

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