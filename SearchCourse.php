<!DOCTYPE html>
<html lang="en">
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
    <link href="./assets/css/jquery.validity.css" rel="stylesheet">
    <link href="./assets/css/cupertino/jquery-ui-1.8.18.custom.css" rel="stylesheet">
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
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a><a class="brand" href="#">College Accreditation</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><a href="./index.php"><i class="icon-list-alt icon-white"></i> Reports</a></li>
                        <li><a href="./SearchStudent.php"><i class="icon-user icon-white"></i> Student</a></li>
                        <li class="active"><a href="./SearchCourse.php"><i class="icon-book icon-white"></i> Course</a></li>
                        <li><a href="./SearchTrack.php"><i class="icon-bookmark icon-white"></i> Academic Track</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Content
    ================================================== -->
     <div class="container-fluid">
        <div class="row-fluid">
            <div class="tabbable" style="margin-bottom: 9px;">
				<ul class="nav nav-tabs" data-bind="foreach: courseTabs" >
                    <li data-bind="attr: { id: tabID}">
						<a data-toggle="tab" data-bind="attr: { href: contentTag}">
							<i data-bind="attr: {class: icon}"></i> 
								<span data-bind="text: tabName"></span>  
						</a>
					</li>
                </ul>
                <div class="tab-content">
				
                    <div class="tab-pane active" id="SearchContent">
						<div class="row">
						
							<div class="span3 well">
								<fieldset>
									<legend>Course Search</legend>
									<label for="SearchNumber">Number:</label>
									<input type="text" class="input-xlarge" id="SearchNumber">
									<label for="SearchName">Name:</label>
									<input type="text" class="input-xlarge" id="SearchName">
									<label for="SearchDescription">Description:</label>
									<input type="text" class="input-xlarge" id="SearchDescription">
									<div class="form-actions">
										<button id="searchCourseBtn" class="btn btn-primary">Search</button>
									</div>
								</fieldset>
							</div> 
							<div id="displaySearchCourse" class="span8">
								<h3>Search Results</h3>
								<table class="table table-striped table-bordered table-condensed" >
								 <caption><h4>Click on course to view details...</h4></caption>
								<thead>
									<tr>
										<th>Number</th>
										<th>Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody data-bind="foreach: searchCoursesResults">
									<tr data-bind="click: $root.goToCourse">
										<td data-bind="text: Number"></td>
										<td data-bind="text: Name"></td>
										<td data-bind="text: Description"></td>
									</tr>    
								</tbody>
								</table>
							</div> 
						</div>
                    </div>
                    <div class="tab-pane" id="AddContent">
						<form class="form-horizontal" data-bind="with: courseToAdd"> 
						<fieldset>
                            <legend>Add Course</legend>
							<div class="control-group">
								<label class="control-label" for="AddNumber">Number:</label>
								<div class="controls">
									<input data-bind="value: Number" id="AddNumber"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="addName">Name:</label>
								<div class="controls">
									<input data-bind="value: Name" id="addName"/>
								</div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="addDescription">Description:</label>
								<div class="controls">
									<textarea class="input-xlarge span6" data-bind="value: Description" id="addDescription" rows="3"></textarea>
								</div>
							</div>
							
							<div class="form-actions">
                                <button id="addCourseBtn" class="btn btn-primary" data-bind="click: $root.addCourse">Add Course</button>
                            </div>
                        </fieldset>
						</form>
                    </div>
                    <div class="tab-pane" id="CourseContent" data-bind="with: chosenCourse">
						<div class="row">
							<div class="span6">
								<label>Number</label> 
								<input readonly="readonly" data-bind="value: Number" id="Number"/>
								<label>Name</label> 
								<input class="span5" readonly="readonly" data-bind="value: Name" id="Name"/>
								<label>Description</label> 
								<textarea readonly="readonly" class="input-xlarge span6" data-bind="value: Description" id="viewDescription" rows="3"></textarea>
								<br /><br />
								<button id="editCourseBtn" class="btn btn-warning" data-bind="click: $root.editCourse">Edit</button>
								<button id="deleteCourseBtn" class="btn btn-danger" data-bind="click: $root.deleteCourse">Delete</button>
							</div>
						</div>
					</div> 
                </div>
            </div> 
        </div>
        <hr>
        <footer>
            <p>&copy; Dwight Trahin, Ryan Brim and Karen Lewey 2012</p>
        </footer>
    </div>

	<div id="deleteCourse" class="modal hide fade in" data-bind="with: chosenCourse" >
		<div class="modal-body"> 
			<div class="alert alert-block alert-error">
				<h4 class="alert-heading">Delete Course</h4>
				<p>Are you sure you want to delete this Course?</p>
				<br />
				<button id="confirmedDeleteStudentBtn" class="btn btn-danger" data-bind="click: $root.confirmedDeleteCourse">YES</button>
				<button class="btn" data-dismiss="modal">NO</button>
			</div>		
		</div>
	</div>
		
	<div id="editCourse" class="modal hide fade in" data-bind="with: chosenCourse" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Edit Course</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="editNumber">Number:</label>
				<div class="controls">
					<input readonly="readonly" data-bind="value: Number" id="editNumber"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="editName">Name:</label>
				<div class="controls">
					<input data-bind="value: Name" id="editName"/>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label" for="editDescription">Description:</label>
				<div class="controls">
					<textarea class="input-xlarge" data-bind="value: Description" id="editDescription" rows="3"></textarea>
				</div>
			</div>
			</form>
		</div>
		<div class="modal-footer">
		  <a href="#" class="btn" data-dismiss="modal">Close</a>
		  <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
		</div>
	</div>	
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
		<script src='./assets/js/knockout-2.0.0.js'></script>
		<script src='./assets/js/jQuery.validity.min.js'></script>
		<script src='./assets/js/jquery-ui-1.8.18.custom.min.js'></script>
		<script type="text/javascript">
		$(document).ready( function() {
			(function(){
				// We'll decide to install our custom output mode under the name 'custom':
				$.validity.outputs.custom = {
					// In this case, the start function will just reset the inputs:
					start:function(){ 
						$('.control-group')
							.removeClass('error');
						$('.errorMsg')
							.remove();
					},
					
					end:function(results) { 
						// If not valid and scrollTo is enabled, scroll the page to the first error.
						if (!results.valid && $.validity.settings.scrollTo) {
							location.hash = $(".fail:eq(0)").attr('id')
						}
					},
					
					// Our raise function will display the error and animate the text-box:
					raise:function($obj, msg){
						// Animate the border of the text box:
						//alert( msg );
						
						$obj
							.parent().parent()
							.addClass('error');
							
						$obj
							.parent()
							.append('<span class="help-inline errorMsg">'+msg+'</span>');
					},
					
					// Our aggregate raise will just raise the error on the last input:
					raiseAggregate:function($obj, msg){ 
						this.raise($($obj.get($obj.length - 1)), msg); 
					}
				}
			})();
	
			$.validity.setup({ outputMode:"custom" });
		
			// This is the validation function:
			function validateMyAjaxInputs() {
				
				// Start validation:
				$.validity.start();
				
				$("#AddNumber").require("Course Number Required.").nonHtml( "Disallowed characters" ).maxLength( 40, "First Name must be less than 40 characters" );
				$("#AddName").require("Course Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "First Name must be less than 40 characters" );
				$("#AddDescription").nonHtml( "Disallowed characters" ).maxLength( 100, "Last Name must be less than 100 characters" );
				
				$("#editName").require("Course Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "Last Name must be less than 40 characters" );
				$("#editDescription").nonHtml( "Disallowed characters" ).maxLength( 100, "Last Name must be less than 100 characters" );
				
				var result = $.validity.end();
				//alert(result.valid);
				return result.valid;
			}

			// This is the function wired into the click event of some link or button:
			function addCourseClicked() {
				// First check whether the inputs are valid:
				if (validateMyAjaxInputs()) {
					return true;
				}
				return false;
			}
			
			function Course( number, name, description ) {
				var self = this;
				self.Name = ko.observable(name);
				self.Number = ko.observable(number);
				self.Description = ko.observable(description);
			}
			
			function Tab( tabName, tabID, contentTag, icon) {
				var self = this;
				self.tabName = ko.observable(tabName);
				self.tabID = ko.observable(tabID);
				self.contentTag = ko.observable(contentTag);
				self.icon = ko.observable(icon);
			}
			
			function CoursesViewModel() {
				// Data
				var self = this;
				
				self.courseTabs = ko.observableArray([
					new Tab("Search", "Search","#SearchContent", "icon-search"),
					new Tab("Add", "Add", "#AddContent", "icon-plus")
				]);
				
				//Test data			
				course1 = new Course( 'CS 102', 'Discrete math', 'Homework' );
				course2 = new Course( 'CS 101', 'Theory of computers', 'Homework' );
				
				self.chosenCourse = ko.observable();
				self.courseToAdd = ko.observable( new Course() );
				self.courses = ko.observableArray();	
				
				self.searchCoursesResults = ko.observableArray();
				self.searchCoursesResults = self.courses;		
				
				self.goToCourse = function(course) { 
					self.chosenCourse(course); 			
					if( self.courseTabs()[2] )
						self.courseTabs.remove( self.courseTabs()[2] );
					self.courseTabs.push( new Tab( course.Number(), "CourseTab","#CourseContent", "icon-book") );
					$('#CourseTab a').tab('show');
				};
						
				self.addCourse = function(course) { 
					var jsonCourse = ko.toJS(course);
					var jsonCourseData = {	"Number": jsonStudent.Number,
											"Name": jsonStudent.Name,
											"Description": jsonStudent.Description};
					if( addCourseClicked() )
					{
						var request = $.ajax({
							type: 'POST',
							url: "ajax_insert_course.php",
							data: jsonCourseData,
							success: function(returnedData) {
								self.courses.push( course );
								self.goToCourse( course ); 
								self.courseToAdd( new Course() );
							}
						});
						
						request.fail(function(jqXHR, textStatus) {
							alert( "Request failed: " + textStatus );
						});
					}
				};		
				
				self.editCourse = function(course) {
					$('#editCourse').modal();
				};
				
				self.deleteCourse = function(course) {
					$('#deleteCourse').modal();
				};
				
				self.confirmedDeleteCourse = function(course) {
					$('#deleteCourse').modal('toggle');
					self.courses.destroy( course );
					self.courses.remove( course );
					self.courseTabs.pop();
					$('#Search a').tab('show');
				}; 
			}
			
			var viewModel = new CoursesViewModel();
			ko.applyBindings( viewModel );
	
			function searchCourses() {
				CourseNumber = $("#SearchNumber").val();
				CourseName = $("#SearchName").val();
				CourseDescription = $("#SearchDescription").val();
				$.ajax({
					type: "POST",
					url: "search_course_results.php",
					dataType: 'json',
					data: {"Number": CourseNumber, "Name": CourseName, "Description": CourseDescription},
					success: function(data) {
						viewModel.courses([]); 
						$.each(data, function(i, item) {
							var course = new Course( 	data[i].Number, 
														data[i].Name,
														data[i].Description );		
							viewModel.courses.push( course );
						});
					}
				});
			}
			
			$("#searchCourseBtn").click( function() {
				searchCourses();
			});
			
			$("#SearchNumber").keydown( function() {
				searchCourses();
			});

			$("#SearchName").keydown( function() {
				searchCourses();
			});

			$("#SearchDescription").keydown( function() {
				searchCourses();
			});

			//HACK
			$("#Search").prop( "class", "active" );
		});
    </script>		
</body>
</html>
