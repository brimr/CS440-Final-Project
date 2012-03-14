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
                        <li class="active"><a href="./SearchStudent.php"><i class="icon-user icon-white"></i> Student</a></li>
                        <li><a href="./SearchCourse.php"><i class="icon-book icon-white"></i> Course</a></li>
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
				<ul class="nav nav-tabs" data-bind="foreach: studentTabs" >
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
									<legend>Student Search</legend>
									<label for="SearchOSUid">OSU ID:</label>
									<input type="text" class="input-xlarge" id="SearchOSUid">
									<label for="SearchFirstName">First Name:</label>
									<input type="text" class="input-xlarge" id="SearchFirstName">
									<label for="SearchLastName">Last Name:</label>
									<input type="text" class="input-xlarge" id="SearchLastName">
									<div class="form-actions">
										<button id="searchStudentBtn" class="btn btn-primary">Search</button>
									</div>
								</fieldset>
							</div> 
							<div id="displaySearchStudent" class="span8">
								<h3>Search Results</h3>
								<table class="table table-striped table-bordered table-condensed" >
								 <caption><h4>Click on students to view details...</h4></caption>
								<thead>
									<tr>
										<th>OSU ID</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Middle Intial</th>
										<th>BirthDate</th>
										<th>Gender</th>
										<th>Enicity</th>
									</tr>
								</thead>
								<tbody data-bind="foreach: searchStudentsResults">
									<tr data-bind="click: $root.goToStudent">
										<td data-bind="text: OSU_ID"></td>
										<td data-bind="text: First_Name"></td>
										<td data-bind="text: Last_Name"></td>
										<td data-bind="text: Middle_Initial"></td>
										<td data-bind="text: BirthDate"></td>
										<td data-bind="text: Gender"></td>
										<td data-bind="text: Ethnicity"></td>
									</tr>    
								</tbody>
								</table>
							</div>
						</div>
                    </div>
					
                    <div class="tab-pane" id="AddContent">
						<form class="form-horizontal" data-bind="with: studentToAdd"> 
						<fieldset>
                            <legend>Add Student</legend>
							<div class="control-group">
								<label class="control-label" for="AddOSUid">OSU ID:</label>
								<div class="controls">
									<input data-bind="value: OSU_ID" id="AddOSUid"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="firstName">First Name:</label>
								<div class="controls">
									<input data-bind="value: First_Name" id="AddFirstName"/>
								</div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="middleInitial">Middle Initial:</label>
								<div class="controls">
									<input class="span1" data-bind="value: Middle_Initial" id="AddMiddleInitial"/>
								</div>
							</div>
							
							<div class="control-group">
                            <label class="control-label" for="lastName">Last Name:</label>
								<div class="controls">
									<input data-bind="value: Last_Name" id="AddLastName"/>
								</div>
							</div>

							<div class="control-group">
							<label class="control-label" for="birthDate">Birth Date:</label>
								<div class="controls">
									<input data-bind="value: BirthDate" id="AddBirthDate" />
								</div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="AddGenderSelect">Gender:</label>
								<div class="controls">
									<select id="AddGenderSelect" data-bind="options: $root.genderValues, optionsText: 'label', optionsValue: 'symbol', value: Gender"></select>
								</div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="AddEthnicitySelect">Ethnicity:</label>
								<div class="controls">
									<select id="AddEthnicitySelect" data-bind="options: $root.ethnicityValues, value: Ethnicity"></select>
								</div>
							</div>
							<div class="form-actions">
                                <button id="addStudentBtn" class="btn btn-primary" data-bind="click: $root.addStudent">Add Student</button>
                            </div>
                        </fieldset>
						</form>
                    </div>
                    <div class="tab-pane" id="StudentContent" data-bind="with: chosenStudent">
						<div class="row">
							<div class="span3">
								<label>OSU ID</label> 
								<input readonly="readonly" data-bind="value: OSU_ID" id="StudentOSUid"/>
								<label>Birth Date</label> 
								<input readonly="readonly" data-bind="value: BirthDate" id="BirthDate"/>
							</div>
							<div class="span3">
								<label>First Name</label> 
								<input readonly="readonly" data-bind="value: First_Name" id="firstName"/>
								<label>Ethnicity</label> 
								<input readonly="readonly" data-bind="value: Ethnicity" id="Ethnicity"/>
							</div>
							<div class="span2">
								<label>Middle Initial</label> 
								<input class="span1" readonly="readonly" data-bind="value: Middle_Initial" id="Middle_Initial"/>
								<label>Gender</label> 
								<input class="span1" readonly="readonly" data-bind="value: Gender" id="Gender"/>
							</div>
							<div class="span3">
								<label>Last Name</label> 
								<input readonly="readonly" data-bind="value: Last_Name" id="lastName"/>
								<br /><br />
								<button id="editStudentBtn" class="btn btn-warning" data-bind="click: $root.editStudent">Edit</button>
								<button id="deleteStudentBtn" class="btn btn-danger" data-bind="click: $root.deleteStudent">Delete</button>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="well span2">
							<h3>Academic Terms</h3>
								<div class="sidebar-nav">
									<ul class="nav nav-list" data-bind="foreach: Terms">
										 <li><a href="#" data-bind="text: fullTermName, click: $parent.goToTerm"></a></li>
									</ul>
								</div>
								<select class="span2" data-bind="options: $root.termValues, optionsText: 'fullTermName', value: termToAdd"></select>
								<button id="addTermBtn" class="btn btn-primary" data-bind="click: addTerm">Enroll in Term</button>
							</div>
							<div class="span6" data-bind="with: chosenTerm">
								<div class="well span6">
									<h3 data-bind="text: eventsHeader">Events</h3>
									<table class="table table-striped table-bordered table-condensed span5">
									<thead><tr>
										<th>Track</th>
										<th>Description</th>
										<th>Date</th>
									</tr></thead>
									<tbody data-bind="foreach: events">
										<tr>
											<td data-bind="text: track"></td>
											<td data-bind="text: description"></td>
											<td data-bind="text: date"></td>
										</tr>
									</tbody>
									</table>
									<div>
										<select class="span2" data-bind="options: $root.trackValues, value: eventTrackToAdd"></select>
										<select class="span2" data-bind="options: $root.eventValues, value: eventDescToAdd"></select>
										<button id="addEventBtn" class="btn btn-primary" data-bind="click: addEvent">Create Event</button>
									</div>
								</div>
								<div class="well span6">
									<h3 data-bind="text: coursesHeader">Courses</h3>
									<table class="table span5">
									<thead><tr>
										<th>Course Number</th>
										<th>Course Name</th>
									</tr></thead>
									<tbody data-bind="foreach: courses">
										<tr>
											<td data-bind="text: number"></td>
											<td data-bind="text: name"></td>
										</tr>
									</tbody>
									</table>
									<div class="offset1">
										<select class="span2" data-bind="options: $root.courseValues, optionsText: 'number', value: courseToAdd"></select>
										<button id="addCourseBtn" class="btn btn-primary" data-bind="click: addCourse">Enroll in Course</button>
									</div>
								</div>
							</div>
						</div>
					</div>   
                </div>
            </div> 
        </div>
		<div id="TEST"></div>
        <hr>
        <footer>
            <p>&copy; Dwight Trahin, Ryan Brim and Karen Lewey 2012</p>
        </footer>
    </div>
	
	<div id="editStudent" class="modal hide fade in" data-bind="with: chosenStudent" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Edit Student</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="editOSUid">OSU ID:</label>
				<div class="controls">
					<input readonly="readonly" data-bind="value: OSU_ID" id="editOSUid"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="firstName">First Name:</label>
				<div class="controls">
					<input data-bind="value: First_Name" id="editFirstName"/>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label" for="middleInitial">Middle Initial:</label>
				<div class="controls">
					<input class="span1" data-bind="value: Middle_Initial" id="editMiddleInitial"/>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label" for="lastName">Last Name:</label>
				<div class="controls">
					<input data-bind="value: Last_Name" id="editLastName"/>
				</div>
			</div>

			<div class="control-group">
			<label class="control-label" for="birthDate">Birth Date:</label>
				<div class="controls">
					<div class="input-append">
					<input readonly="readonly" data-bind="value: BirthDate" id="editedBirthdate"/>
					<span class="add-on" id="EditBirthDate"><i class="icon-edit"></i></span>
					</div>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label" for="AddGenderSelect">Gender:</label>
				<div class="controls">
					<select id="editGenderSelect" data-bind="options: $root.genderValues, optionsText: 'label', optionsValue: 'symbol', value: Gender"></select>
				</div>
			</div>
			
			<div class="control-group">
			<label class="control-label" for="AddEthnicitySelect">Ethnicity:</label>
				<div class="controls">
					<select id="editEthnicitySelect" data-bind="options: $root.ethnicityValues, value: Ethnicity"></select>
				</div>
			</div>
			</form>
		</div>
		<div class="modal-footer">
		  <a href="#" class="btn" data-dismiss="modal">Close</a>
		  <a href="#" class="btn btn-primary">Save changes</a>
		</div>
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
	<script src='./assets/js/knockout-2.0.0.js'></script>
	<script src='./assets/js/knockout.mapping.js'></script>
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
			
			$("#AddOSUid").require("OSU ID Required.").match(/^931\d{6}$/, "Must be a valid 9-digit OSU ID number. ex.931000000");
			$("#AddFirstName").require("First Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "First Name must be less than 40 characters" );
			$("#AddLastName").require("Last Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "Last Name must be less than 40 characters" );
			$("#AddBirthDate").require("Birth Date Required");
			
			$("#editFirstName").require("First Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "First Name must be less than 40 characters" );
			$("#editLastName").require("Last Name Required").nonHtml( "Disallowed characters" ).maxLength( 40, "Last Name must be less than 40 characters" );
			$("#editBirthDate").require("Birth Date Required");
			
			$("form").validity(function() {
				$("adio").assert(
					$(".form-radio:checked").length != 0, 
					"You must select yes or no to proceed."
				);
			});
			
			var result = $.validity.end();
			//alert(result.valid);
			return result.valid;
		}


		// This is the function wired into the click event of some link or button:
		function addStudentClicked() {
			// First check whether the inputs are valid:
			if (validateMyAjaxInputs()) {
				return true;
			}
			return false;
		}
	
	
		function Student(OSU_ID, First_Name, Last_Name, Middle_Initial, BirthDate, Gender, Ethnicity) {
			var self = this;
			self.OSU_ID = ko.observable(OSU_ID);
			self.First_Name = ko.observable(First_Name);
			self.Last_Name = ko.observable(Last_Name);
			self.Middle_Initial = ko.observable(Middle_Initial);
			self.BirthDate = ko.observable(BirthDate);
			self.Gender = ko.observable(Gender);
			self.Ethnicity = ko.observable(Ethnicity);
			self.FullName = ko.computed(function() {
				return self.First_Name() + " " + self.Last_Name();    
				}, self);
				
			self.Terms = ko.observableArray();
			self.chosenTerm = ko.observable();
			self.goToTerm = function( term ) { 
				self.chosenTerm(term); 
				jsStudentID = ko.toJS( self.OSU_ID );
				jsTermcode = ko.toJS( self.chosenTerm().termCode );
				$.getJSON("ajax_get_student_term_courses.php", { "OSU_ID": jsStudentID, "Termcode": jsTermcode }, function(data) { 
					$.each(data, function(i, item) {	
						var course = new Course( 	data[i].Name,
													data[i].Number,
													data[i].Description );
						self.chosenTerm().courses.push( course );
					});
				})	
			};
			
			self.termToAdd = ko.observable( new Term() );
			self.addTerm = function() { 
				jsTerm = ko.toJS( self.termToAdd );
				newTerm = new Term( jsTerm.name, jsTerm.academicYear );
				self.Terms.push( newTerm );
			}
		}
		
		function Term( name, year, termCode ) {
			var self = this;
			self.name = ko.observable(name);
			self.termCode = termCode;
			self.academicYear = ko.observable(year);
			self.courses = ko.observableArray();
			self.events = ko.observableArray();
			
			self.fullTermName = ko.computed(function() {
				return self.name() + " " + self.academicYear();    
				}, self);
				
			self.coursesHeader = ko.computed(function() {
				return "Courses taken during " + self.name() + " " + self.academicYear();    
				}, self);
				
			self.eventsHeader = ko.computed(function() {
				return "Events during " + self.name() + " " + self.academicYear();    
				}, self);
				
			self.courseToAdd = ko.observable();
			self.addCourse = function() { 
				self.courses.push( self.courseToAdd() );
			}
			
			self.eventTrackToAdd = ko.observable();
			self.eventDescToAdd = ko.observable();
			self.addEvent = function() { 
				jsEventTrack = ko.toJS( self.eventTrackToAdd );
				jsEventDesc = ko.toJS( self.eventDescToAdd );
				newEvent = new Event( jsEventDesc, "1/2/1929", jsEventTrack );
				self.events.push( newEvent );
			}
		}
		
		function Course( name, number, description ) {
			var self = this;
			self.name = ko.observable(name);
			self.number = ko.observable(number);
			self.description = ko.observable(description);
		}
		
		function Event( description, date, track ) {
			var self = this;
			self.description = description;
			self.date = date;
			self.track = track;
		}
		
		function Tab( tabName, tabID, contentTag, icon) {
			var self = this;
			self.tabName = ko.observable(tabName);
			self.tabID = ko.observable(tabID);
			self.contentTag = ko.observable(contentTag);
			self.icon = ko.observable(icon);
		}
		
		function Gender( label, symbol )
		{
			var self = this;
			self.label = label;
			self.symbol = symbol;
		}
		
		function StudentSearchViewModel() {
		    // Data
			var self = this;
			
			self.studentTabs = ko.observableArray([
				new Tab("Search", "Search","#SearchContent", "icon-search"),
				new Tab("Add", "Add", "#AddContent", "icon-plus")
			]);
			
			self.eventValues = ko.observableArray(["Enrolled", "Graduated"]);
			self.ethnicityValues = ko.observableArray(["Hispanic", "Caucasian", "Asian", "Native American"]);
			self.genderValues = ko.observableArray([
				new Gender("Male","M"),
				new Gender("Female", "F"),
				new Gender("Other", "O") ]);
			
			self.trackValues = ko.observableArray();
			$.getJSON("ajax_get_track_list.php", function(data) { 
				$.each(data, function(i, item) {	
					self.trackValues.push( data[i].Name );
				});
			})
			
			//Test data
			student1 = new Student(931630124, "Ryan", "Brim", "D", "1992-07-17", "M", "Caucasian");
			student2 = new Student(931630122, "Brenna", "Brim", "D", "1991-07-17", "F", "Caucasian" );
			
			course1 = new Course( 'Discrete math','CS 102', 'Homework' );
			course2 = new Course( 'Theory of computers','CS 101', 'Homework' );
			event1 = new Event( "Enrolled", '1/8/2012', 'Computer Systems Option' );
			term1 = new Term( 'Fall', '2012', '201201');
			term1.events.push( event1 );
			term1.courses.push( course1 );
			term1.courses.push( course2 );
			student1.Terms.push( term1 );
			term2 = new Term( 'Winter', '2012', '201202' );
			term2.events.push( event1 );
			term2.courses.push( course2 );
			term2.courses.push( course1 );			
			student1.Terms.push( term2 );	
			
			self.courseValues = ko.observableArray();
			$.getJSON("ajax_get_course_list.php", function(data) { 
				$.each(data, function(i, item) {	
					var course = new Course( 	data[i].Name,
												data[i].Number,
												data[i].Description );
					self.courseValues.push( course );
				});
			})
			
			self.termValues = ko.observableArray();
			$.getJSON("ajax_get_term_list.php", function(data) { 
				$.each(data, function(i, item) {	
					var term = new Term( data[i].Name,
										 data[i].Academic_Year,
										 data[i].Termcode);
					self.termValues.push( term );
				});
			})
			
			
			self.chosenStudent = ko.observable();
			self.studentToAdd = ko.observable( new Student() );
			self.students = ko.observableArray([
				student1, student2
			]);	
			
			// $.getJSON("search_student_results.php", function(data) { 
				// $.each(data, function(i, item) {
					// var student = new Student( 	data[i].OSU_ID, 
												// data[i].First_Name,
												// data[i].Last_Name,
												// data[i].Middle_Initial,
												// data[i].Birthdate,
												// data[i].Gender,
												// data[i].Ethnicity);		
					// viewModel.students.push( student );
				// });
			// })
			
			self.searchStudentsResults = ko.observableArray();
			self.searchStudentsResults = self.students;
			
			self.goToStudent = function(student) { 
				self.chosenStudent(student); 
				jsStudentID = ko.toJS( self.chosenStudent().OSU_ID );
				$.getJSON("ajax_get_student_terms.php", { "OSU_ID": jsStudentID }, function(data) { 
					$.each(data, function(i, item) {	
						var term = new Term( 	data[i].Name,
												data[i].Academic_Year,
												data[i].Termcode);
						self.chosenStudent().Terms.push( term );
					});
				})				
				
				if( self.studentTabs()[2] )
					self.studentTabs.remove( self.studentTabs()[2] );
				self.studentTabs.push( new Tab( student.FullName(), "StudentTab","#StudentContent", "icon-user") );
				$('#StudentTab a').tab('show');
			};
						
			self.addStudent = function(student) { 
				var jsonStudent = ko.toJS(student);
				var jsonStudentData = {	"OSU_ID": jsonStudent.OSU_ID,
										"First_Name": jsonStudent.First_Name,
										"Last_Name": jsonStudent.Last_Name,
										"Middle_Initial": jsonStudent.Middle_Initial,
										"BirthDate": jsonStudent.BirthDate,
										"Gender": jsonStudent.Gender,
										"Ethnicity": jsonStudent.Ethnicity};
				if( addStudentClicked() )
				{
					var request = $.ajax({
						type: 'POST',
						url: "ajax_insert_student.php",
						data: jsonStudentData,
						success: function(returnedData) {
							self.students.push( student );
							self.goToStudent(student); 
							self.studentToAdd( new Student() );
							$('#AddBirthDate').datepicker();
							$('#AddBirthDate').datepicker("option", "dateFormat", "yy-mm-dd");
						}
					});
					
					request.fail(function(jqXHR, textStatus) {
						alert( "Request failed: " + textStatus );
					});
				}
			};		
			
			self.editStudent = function(student) {
				$('#editStudent').modal();
				$('#EditBirthDate').click( function() {
					$('#editedBirthdate').datepicker();
					$('#editedBirthdate').datepicker("option", "dateFormat", "yy-mm-dd");
					$( "#editedBirthdate" ).datepicker( "option", "defaultDate", ko.toJS(student.BirthDate) );
					$( "#editedBirthdate" ).datepicker("show");
				});
			};
			
		}
		
		var viewModel = new StudentSearchViewModel();
		ko.applyBindings( viewModel );
		
		function searchStudent() {
			OSU_ID = $("#SearchOSUid").val();
			FirstName = $("#SearchFirstName").val();
			LastName = $("#SearchLastName").val();
			$.ajax({
				type: "POST",
				url: "search_student_results.php",
				dataType: 'json',
				data: {"OSU_ID": OSU_ID, "FirstName": FirstName, "LastName": LastName},
				success: function(data) {
					viewModel.students([]); 
					$.each(data, function(i, item) {
						var student = new Student( 	data[i].OSU_ID, 
													data[i].First_Name,
													data[i].Last_Name,
													data[i].Middle_Initial,
													data[i].Birthdate,
													data[i].Gender,
													data[i].Ethnicity);		
						viewModel.students.push( student );
					});
				}
			});
		}
		
		$("#searchStudentBtn").click( function() {
			searchStudent();
		});
		
		$("#SearchOSUid").keydown( function() {
			searchStudent();
		});

		$("#SearchFirstName").keydown( function() {
			searchStudent();
		});

		$("#SearchLastName").keydown( function() {
			searchStudent();
		});
		
		$('#AddBirthDate').datepicker();
		$('#AddBirthDate').datepicker("option", "dateFormat", "yy-mm-dd");
		
		//HACK
		$("#Search").prop( "class", "active" );
	});

    </script>		
</body>
</html>
