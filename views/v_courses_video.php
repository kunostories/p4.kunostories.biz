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
		<br>
		<script type="text/javascript">
	        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	        var disqus_shortname = 'engcourses'; // required: replace example with your forum shortname

	        /* * * DON'T EDIT BELOW THIS LINE * * */
	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
	</div>

</div> <!--/.row-->