<?php
class courses_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            # redirect to login with error messeage
        	Router::redirect("/index/index/login");
        }
    }

    public function index() {

	    $this->template->content = View::instance('v_courses_index');
	    $this->template->title   = "All Free Lessons";

	    # Build query to find courses not enrolled in by user
	    $q = "SELECT * FROM courses c
	    WHERE c.published = true AND 
	    	c.course_id NOT IN
	    	(SELECT course_id FROM users_courses uc
	    		WHERE uc.user_id = ".$this->user->user_id.")";

	    # Run the query
	    $courses = DB::instance(DB_NAME)->select_rows($q);

	    # If no courses, give error
	    if(empty($courses)) {
	    	$error = "Sorry, no new lessons today. We'll upload some soon! In the meantime, you can review <a href='/'>your lessons</a>.";
	    }

	    # Pass data to the View
	    $this->template->content->courses = $courses;
	    $this->template->content->error = $error;

	    # Render the View
	    echo $this->template;

	} # End of method

	public function view($course = NULL) {
		# Set up the View
	    if($course != NULL) {

	    	# Build query to select course information
	    	$q = "SELECT * FROM courses 
	    		WHERE url = '".$course."'";
	    	$course = DB::instance(DB_NAME)->select_rows($q);
	    	$course = $course[0];

	    	if(empty($course)) {
	    		# No course found, return error
	    		$error = "No course found of this name";
	    	}
	    	else {
	    		$error = NULL;
	    	}

	    	# Query to select contents related to course
	    	$q2 = "SELECT * FROM contents 
	    		WHERE course_id = ".$course["course_id"];
	    	$contents = DB::instance(DB_NAME)->select_rows($q2);

	    	$this->template->content = View::instance('v_courses_view');
	    	$this->template->title   = $course["title"];
	    	$this->template->content->course = $course;
	    	$this->template->content->contents = $contents;

	    	# Render the view
	    	echo $this->template;
	    }
	    else {
	    	# Send them home
	    	Router::redirect("/");
	    }
	} # End of method

	public function enroll($course = NULL) {
		# Set up the View
	    if($course != NULL) {

	    	# Build query to select course information
	    	$q = "SELECT course_id FROM courses WHERE url = '".$course."'";

	    	# Execute query
	    	$enroll = DB::instance(DB_NAME)->select_row($q);

	    	if(empty($enroll)) {
	    		# No course found, return error
	    		$error = "No course found of this name";
	    	}
	    	else {
	    		$error = NULL;
	    	}

	    	# Insert user_id into the $course array
	    	$enroll["user_id"] = $this->user->user_id;

	    	# Set progress to 1 to show that user will start from 1st content
	    	$enroll["progress"] = 1;

	        # Insert
	        DB::instance(DB_NAME)->insert('users_courses', $enroll);

	        # Success page
	        Router::redirect("/courses/study/".$course."/success");

	    }
	    else {
	    	# Send them home
	    	Router::redirect("/");
	    }
	} # End of method

	public function study($course = NULL, $success = NULL) {
		# Set up the View
	    if($course != NULL) {

	    	# Load study view first
	    	$this->template->content = View::instance('v_courses_study');

	    	# Query to select course data
	    	$q = "SELECT * FROM courses
		    	INNER JOIN users_courses
		    	ON courses.course_id = users_courses.course_id
		    	WHERE courses.url = '".$course."' AND 
		    		users_courses.user_id = ". $this->user->user_id;
	    	$course = DB::instance(DB_NAME)->select_rows($q);
	    	$course = $course[0];

	    	if(empty($course)) {
	    		# No course of that name
	        	Router::redirect("/index/index/missing");
	    	}

	    	# Query to select contents related to course
	    	$q2 = "SELECT * FROM contents 
	    		WHERE course_id = ".$course["course_id"];
	    	$contents = DB::instance(DB_NAME)->select_rows($q2);

	    	# Check if this is a first enrolled success
	    	if($success == 'missing') {
	    		$error = "That content is missing or doesn't exist.";
	    		$success = NULL;
	    	}
	    	elseif($success == 'success') {
	    		$success = "You have successfully enrolled!";
	    		$error = NULL;
	    	}
	    	elseif($success != NULL) {
	    		$error = NULL;

	    		# Query to get content data
	    		$q3 = "SELECT * FROM contents
	    			WHERE url = '".$success."'";
			    $currentContents = DB::instance(DB_NAME)->select_row($q3);

			    if(empty($currentContents)) {
			    	# No content of that name
		        	Router::redirect("/courses/study/".$course["url"]."/missing");
			    }

			    # Set it to null so as not to display it
			    $success = NULL;

			    # Get user's progress
			    $q4 = "SELECT progress FROM users_courses
			    	WHERE user_id = ".$this->user->user_id." AND
			    	course_id = ".$course["course_id"];
		    	$user_progress = DB::instance(DB_NAME)->select_row($q4);

		    	# TODO Only update if $user_progress is less than position
	    		# Update user's progress
			    $data = Array("progress" => $currentContents['position']);
			    DB::instance(DB_NAME)->update("users_courses", $data, "WHERE user_id = ".$this->user->user_id." AND course_id = ".$course['course_id']);

			    # Find url of next content (position +1) and store in variable to be used in the 'Next Lesson' button in the view
			    $next_url = $currentContents['position'] + 1;
			    $q5 = "SELECT url FROM contents
			    	WHERE position = ".$next_url;
		    	$next_url = DB::instance(DB_NAME)->select_field($q5);
		    	$currentContents["next"] = $next_url;

		    	# Find url of next content (position +1) and store in variable to be used in the 'Next Lesson' button in the view
			    $previous_url = $currentContents['position'] - 1;
			    $q6 = "SELECT url FROM contents
			    	WHERE position = ".$previous_url;
		    	$previous_url = DB::instance(DB_NAME)->select_field($q6);
		    	$currentContents["previous"] = $previous_url;

		    	if($currentContents["type"] == 'video') {
		    		# Load video view
	    			$this->template->content = View::instance('v_courses_video');
		    	}
		    	elseif($currentContents["type"] == 'text') {
		    		# Load text view
	    			$this->template->content = View::instance('v_courses_text');
		    	}

	    		$this->template->content->currentContents = $currentContents;

	    	}

	    	$this->template->title   = $course["title"];
	    	$this->template->content->course = $course;
	    	$this->template->content->contents = $contents;
	    	$this->template->content->success = $success;
	    	$this->template->content->error = $error;

	    	# Render the view
	    	echo $this->template;
	    }
	    else {
	    	# Send them home
	    	Router::redirect("/index/index/missing");
	    }
	} # End of method

} # End of controller

?>