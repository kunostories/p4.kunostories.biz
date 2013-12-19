<?php
class courses_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            # redirect to login with error messeage
        	Router::redirect("/");
        }

    }

    public function index() {

	    $this->template->content = View::instance('v_courses_index');
	    $this->template->title   = "All Courses";

	    # Build the query
	    $q = "SELECT * FROM courses";

	    # Run the query
	    $courses = DB::instance(DB_NAME)->select_rows($q);

	    if(empty($courses)) {
	    	# No courses, so direct to home
        	Router::redirect("/");
	    }

	    # Pass data to the View
	    $this->template->content->courses = $courses;

	    # Render the View
	    echo $this->template;

	} # End of method

	public function view($course = NULL) {
		# Set up the View
	    if($course != NULL) {

	    	# Build query to select course information
	    	$q = "SELECT * FROM courses WHERE url = '".$course."'";

	    	# Execute query
	    	$course = DB::instance(DB_NAME)->select_rows($q);
	    	$course = $course[0];

	    	if(empty($course)) {
	    		# No course found, return error
	    		$error = "No course found of this name";
	    	}
	    	else {
	    		$error = NULL;
	    	}

	    	$this->template->content = View::instance('v_courses_view');
	    	$this->template->title   = $course["title"];
	    	$this->template->content->course = $course;

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
	    	$course = DB::instance(DB_NAME)->select_row($q);

	    	# Insert user_id into the $course array
	    	$course["user_id"] = $this->user->user_id;

	    	# Set progress to 1 to show that user will start from 1st content
	    	$course["progress"] = 1;

	    	if(empty($course)) {
	    		# No course found, return error
	    		$error = "No course found of this name";
	    	}
	    	else {
	    		$error = NULL;
	    	}

	        # Insert
	        DB::instance(DB_NAME)->insert('users_courses', $course);

	        # Success page
	        Router::redirect("/course/enroll/success");

	    	$this->template->content = View::instance('v_courses_template');
	    	$this->template->title   = $course->title;
	    	$this->template->content->course = $course;

	    	# Render the view
	    	echo $this->template;
	    }
	    else {
	    	# Send them home
	    	Router::redirect("/");
	    }
	} # End of method

	public function study($course = NULL) {
		# Set up the View
	    if($course != NULL) {

	    	# Build query to select course information
	    	$q = "SELECT * FROM courses WHERE url = '".$course."'";

	    	# Execute query
	    	$course = DB::instance(DB_NAME)->select_rows($q);
	    	$course = $course[0];

	    	if(empty($course)) {
	    		# No course found, return error
	    		$error = "No course found of this name";
	    	}
	    	else {
	    		$error = NULL;
	    	}

	    	# Build query to select course content
	    	$q2 = "SELECT * FROM contents WHERE course_id = ".$course["course_id"];

	    	# Execute query
	    	$contents = DB::instance(DB_NAME)->select_rows($q2);

	    	$this->template->content = View::instance('v_courses_study');
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

} # End of controller

?>