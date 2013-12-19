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

	    # Build query to find courses not enrolled in by user
	    $q = "SELECT * FROM courses c
	    WHERE c.course_id NOT IN
	    	(SELECT course_id FROM users_courses uc
	    		WHERE uc.user_id = ".$this->user->user_id.")";

	    # Run the query
	    $courses = DB::instance(DB_NAME)->select_rows($q);

	    # Build query to find courses user enrolled in
	    $q2 = "SELECT * FROM courses
	    	INNER JOIN users_courses
	    	ON courses.course_id = users_courses.course_id
	    	WHERE users_courses.user_id = ". $this->user->user_id;

	    # Run the query
	    $enrolled = DB::instance(DB_NAME)->select_rows($q2);

	    if(empty($enrolled)) {
	    	# Not enrolled in any courses, let them know
        	$error = "You are not enrolled in any courses yet.";
	    }
	    else {
	    	$error = NULL;
	    }

	    # Pass data to the View
	    $this->template->content->courses = $courses;
	    
	    # Pass data to the View
	    $this->template->content->enrolled = $enrolled;

	    # Pass data to the View
	    $this->template->content->error = $error;

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

	    	# Check if this is a first enrolled success
	    	if($success != NULL) {
	    		$success = "You have successfully enrolled!";
	    	}

	    	$this->template->content = View::instance('v_courses_study');
	    	$this->template->title   = $course["title"];
	    	$this->template->content->course = $course;
	    	$this->template->content->contents = $contents;
	    	$this->template->content->success = $success;

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