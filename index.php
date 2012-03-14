<!DOCTYPE html>
<html lang="en">
<?php
    //require "db_connect.php";
?>

<head>
    <meta charset="utf-8">
    <title>College Accreditation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav
        {
            padding: 9px 0;
        }
    </style>
    <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>
    <div class="navbar navbar-fixed-top tabbable tabs-left">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a><a class="brand" href="#">College Accreditation</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="./index.php"><i class="icon-list-alt icon-white"></i> Reports</a></li>
                        <li><a href="./SearchStudent.php"><i class="icon-user icon-white"></i> Student</a></li>
                        <li><a href="./SearchCourse.php"><i class="icon-book icon-white"></i> Course</a></li>
                        <li><a href="./SearchTrack.php"><i class="icon-bookmark icon-white"></i> Academic Track</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
		    <li class="active"><a href="#1W" data-toggle="tab">
		        <h4><i class="icon-list-alt"></i> College Accreditation Reports</h4>
		    </a></li>
                    <li class=""><a href="#lA" data-toggle="tab">Completed Percentage</a></li>
                    <li class=""><a href="#lB" data-toggle="tab">Average Time</a></li>
                    <li class=""><a href="#lC" data-toggle="tab">Statistics</a></li>
                    <li class=""><a href="#lD" data-toggle="tab">Completed courses</a></li>
                    <li class=""><a href="#lE" data-toggle="tab">Required courses</a></li>
                </ul>
                <div class="tab-content">
		    <div class="tab-pane active" id="1W">
			<div class="hero-unit">
 			     	<h2>Welcome to the College Accreditation Reports Web Application</h2>
  				<p>	This Web Application is used by Colleges seeking accreditation from an official accreditation bodies.
				   	Colleges have the ability to generate reports regarding academic tracks, courses, and students during 
					specific time periods.</p>
				<p>	Obtaining accreditation is very important because it demonstrates a College 
					meets a high standard in teaching and research. Being accredited will also draw prestigious faculty 
					and promising students to the College. </p>
  			        <p>If you are a College Administrators please use this Application.</p>
				<h3>Get Accredited. Win!</h3>
			</div>
		    </div>
                    <div class="tab-pane" id="lA">
                        <h3>Number of Students Completing Percentage of Courses by Track</h3>
			<?php include "percent_completion_student_track_report.php"; ?>
                    </div>
                    <div class="tab-pane" id="lB">
                        <h3>Average Time to Complete a Track</h3>
						<!--form name = "Dates" class="well form-inline" action = "http://people.oregonstate.edu/~leweyk/">-->
							<input type="text" name = "startDate" id = "startDate" class="input-small" placeholder="Start Year">
							<input type="text" name = "endDate" id = "endDate" class="input-small" placeholder="End Year">
							<button id = "UpdateDate" type = "submit" class="btn">Go</button>
							<div id = "percentCompleteContent"></div>
						<!--</form>-->

			<!--<?php include "average_completion_student_track_report.php"; ?>-->
                    </div>
                    <div class="tab-pane" id="lC">
                        <h3>Statistics</h3>
                    	<?php include "student_statistics_report.php"; ?>
		    </div>
                    <div class="tab-pane" id="lD">
                        <h3>Completed courses</h3>
                    	<?php include "completion_course_report.php"; ?>
		    </div>
                    <div class="tab-pane" id="lE">
                        <h3 id="requiredCoursesHeader">Required courses for Computer Systems Option Track</h3>
			<?php include 'required_courses_for_track.php'; ?> 
		    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr>
        <footer>
            <p>&copy; Dwight Trahin, Ryan Brim and Karen Lewey 2012</p>
        </footer>
    </div>
    <!--/.fluid-container-->
    <!-- Le javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap-transition.js"></script>
    <script src="./assets/js/bootstrap-alert.js"></script>
    <script src="./assets/js/bootstrap-modal.js"></script>
    <script src="./assets/js/bootstrap-dropdown.js"></script>
    <script src="./assets/js/bootstrap-scrollspy.js"></script>
    <script src="./assets/js/bootstrap-tab.js"></script>
    <script src="./assets/js/bootstrap-tooltip.js"></script>
    <script src="./assets/js/bootstrap-popover.js"></script>
    <script src="./assets/js/bootstrap-button.js"></script>
    <script src="./assets/js/bootstrap-collapse.js"></script>
    <script src="./assets/js/bootstrap-carousel.js"></script>
    <script src="./assets/js/bootstrap-typeahead.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
		$("#requiredCoursesHeader").text( "Required Courses for " + $("#requiredCoursesSelect").val() );
		$("#requiredCourses").load( "required_courses_for_track_report.php", {"track": $("#requiredCoursesSelect").val()} );

        $("#requiredCoursesSelect").change( function() {
			$("#requiredCoursesHeader").text( "Required Courses for " + $(this).val() );
			$("#requiredCourses").load( "required_courses_for_track_report.php", {"track": $(this).val()} );
                });
		startDate = $("#startDate").val();
		endDate = $("#endDate").val();
		$("#percentCompleteContent").load( "average_completion_student_track_report.php", {"startDate": startDate, "endDate": endDate});
		$("#UpdateDate").click( function() {
				//$("#requiredCoursesHeader").text( "Required Courses for " + $(this).val() );
				//alert("here");
				startDate = $("#startDate").val();
				endDate = $("#endDate").val();
				$("#percentCompleteContent").load( "average_completion_student_track_report.php", {"startDate": startDate, "endDate": endDate});
                });
        $("#studentStatistics").load( "student_statistics_report.php");
        $("#courseCompletion").load("completion_course_report.php");
        });
    </script>
</body>
</html>
