<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index($error = NULL) {
		
		# Direct to landing page to register or log in if not logged in
        if(!$this->user) {

			# Load signup and login page
				$this->template->content = View::instance('v_index_index');
				
			# Set the <title> tag
				$this->template->title = "English Courses: Improve your English with online courses.";

	    	# Pass in the signup module
				$this->template->content->signup_module = View::instance('v_signup_module');

			# Pass in the login module
				$this->template->content->login_module = View::instance('v_login_module');

			if($error == 'login'){
				$error = "You must sign up and log in to view that content.";
			}
			elseif($error == 'missing'){
				$error = "That content is missing or doesn't exist. Try again.";
			}
			elseif($error != NULL){
				$error = "Whatchu talkin' about ".$error."?";
			}

			# Pass in error data
				$this->template->content->error = $error;

			# Render the view
				echo $this->template;
		}

		else {

			# Check if logged in user has enrolled in any courses
			    $q = "SELECT * FROM courses
			    	INNER JOIN users_courses
			    		ON courses.course_id = users_courses.course_id
		    		WHERE users_courses.user_id = ".$this->user->user_id.
		    		" ORDER BY courses.course_id";

		    # Run the query
			    $courses = DB::instance(DB_NAME)->select_rows($q);

			    if(empty($courses)) {
			    	# No courses in progress, so direct to all courses page
			    	$error = "Why don't you enroll in a course?";
		        	Router::redirect("/courses");
			    }

		    	if($error == 'missing'){
					$error = "That content is missing or doesn't exist. Try again.";
				}

		    	# Load signup and login page
					$this->template->content = View::instance('v_index_mycourses');
					
				# Set the <title> tag
					$this->template->title = "My English Courses";

				# Pass data of user's enrolled courses to the View
		    		$this->template->content->courses = $courses;
				
				# Render the view
					echo $this->template;
		}

	} # End of method
	
	
} # End of class
