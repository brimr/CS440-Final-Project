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
                        <li><a href="./SearchCourse.php"><i class="icon-book icon-white"></i> Course</a></li>
                        <li class="active"><a href="./SearchTrack.php"><i class="icon-bookmark icon-white"></i> Academic Track</a></li>
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
				<ul class="nav nav-tabs" data-bind="foreach: trackTabs" >
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
									<legend>Academic Track Search</legend>
									<label for="SearchName">Name:</label>
									<input type="text" class="input-xlarge" id="SearchName">
									<label for="SearchMajor">Major:</label>
									<input type="text" class="input-xlarge" id="SearchMajor">
									<!--<label for="SearchDescription">Description:</label>
									<input type="text" class="input-xlarge" id="SearchDescription"> -->
									<div class="form-actions">
										<button id="searchTrackBtn" class="btn btn-primary">Search</button>
									</div>
								</fieldset>
							</div> 
							<div id="displaySearchTrack" class="span8">
								<h3>Search Results</h3>
								<table class="table table-striped table-bordered table-condensed" >
								 <caption><h4>Click on track to view details...</h4></caption>
								<thead>
									<tr>
										<th>Name</th>
										<th>Major</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody data-bind="foreach: searchTracksResults">
									<tr data-bind="click: $root.goToTrack">
										<td data-bind="text: Name"></td>
										<td data-bind="text: Major"></td>
										<td data-bind="text: Description"></td>
									</tr>    
								</tbody>
								</table>
							</div> 
						</div>
                    </div>
                    <div class="tab-pane" id="AddContent">
						<form class="form-horizontal" data-bind="with: trackToAdd"> 
						<fieldset>
                            <legend>Add Track</legend>
							<div class="control-group">
								<label class="control-label" for="AddName">Name:</label>
								<div class="controls">
									<input data-bind="value: Name" id="AddName"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="AddMajor">Major:</label>
								<div class="controls">
									<input data-bind="value: Major" id="AddMajor"/>
								</div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="AddDescription">Description:</label>
								<div class="controls">
									<textarea class="input-xlarge span6" data-bind="value: Description" id="AddDescription" rows="3"></textarea>
								</div>
							</div>
							<div id="AddTrackAlert" class="alert alert-block alert-error fade in hide">
								<h4 class="alert-heading">Error!</h4>
								<p id="AddTrackError"></p>
							</div>							
							<div class="form-actions">
                                <button id="addTrackBtn" class="btn btn-primary" data-bind="click: $root.addTrack">Add Track</button>
                            </div>
                        </fieldset>
						</form>
                    </div>
                    <div class="tab-pane" id="TrackContent" data-bind="with: chosenTrack">
						<div class="row">
							<div class="span6">
								<label>Name</label> 
								<input readonly="readonly" data-bind="value: Name" id="Name"/>
								<label>Major</label> 
								<input class="span5" readonly="readonly" data-bind="value: Major" id="Major"/>
								<label>Description</label> 
								<textarea readonly="readonly" class="input-xlarge span6" data-bind="value: Description" id="viewDescription" rows="3"></textarea>
								<br /><br />
								<button id="editTrackBtn" class="btn btn-warning" data-bind="click: $root.editTrack">Edit</button>
								<button id="deleteTrackBtn" class="btn btn-danger" data-bind="click: $root.deleteTrack">Delete</button>
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
	
	<div id="deleteTrack" class="modal hide fade in" data-bind="with: chosenTrack" >
		<div class="modal-body"> 
			<div id="DeleteTrackAlert" class="alert alert-block alert-error fade in hide">
				<h4 class="alert-heading">Error!</h4>
				<p id="DeleteTrackError"></p>
			</div>	
			<p>Are you sure you want to delete this Track?</p>
			<br />
			<button id="confirmedDeleteTrackBtn" class="btn btn-danger" data-bind="click: $root.confirmedDeleteTrack">DELETE</button>
			<button class="btn" data-dismiss="modal">Cancel</button>

		</div>
	</div>
	
		
	<div id="editTrack" class="modal hide fade in" data-bind="with: $root.editedTrack" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Edit Track</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="editName">Name:</label>
				<div class="controls">
					<input readonly="readonly" data-bind="value: Name" id="editName"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="editName">Major:</label>
				<div class="controls">
					<input data-bind="value: Major" id="editMajor"/>
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
			<div id="EditTrackAlert" class="alert alert-block alert-error fade in hide">
				<h4 class="alert-heading">Error!</h4>
				<p id="EditTrackError"></p>
			</div>
			<button class="btn" data-dismiss="modal">Close</a>
			<button class="btn btn-primary" data-bind="click: $root.saveEditedTrack">Save changes</a>
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
				
				$("#AddName").require("Track name Required.").nonHtml( "Disallowed characters" ).maxLength( 40, "Track name must be less than 40 characters" );
				$("#AddMajor").require("Major Required").nonHtml( "Disallowed characters" ).maxLength( 40, "Major must be less than 40 characters" );
				$("#AddDescription").nonHtml( "Disallowed characters" ).maxLength( 100, "Description must be less than 100 characters" );
				
				var result = $.validity.end();
				//alert(result.valid);
				return result.valid;
			}
			
			function validateEditTrackInputs() {
				
				// Start validation:
				$.validity.start();
				
				$("#editMajor").require("Major Required").nonHtml( "Disallowed characters" ).maxLength( 40, "Major must be less than 40 characters" );
				$("#editDescription").nonHtml( "Disallowed characters" ).maxLength( 100, "Description must be less than 100 characters" );
				
				var result = $.validity.end();
				//alert(result.valid);
				return result.valid;
			}
			
			// This is the function wired into the click event of some link or button:
			function editTrackClicked() {
				// First check whether the inputs are valid:
				if (validateEditTrackInputs()) {
					return true;
				}
				return false;
			}

			// This is the function wired into the click event of some link or button:
			function addTrackClicked() {
				// First check whether the inputs are valid:
				if (validateMyAjaxInputs()) {
					return true;
				}
				return false;
			}
			
			function Track( name, major, description ) {
				var self = this;
				self.Name = ko.observable(name);
				self.Major = ko.observable(major);
				self.Description = ko.observable(description);
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

			function TracksViewModel() {
				// Data
				var self = this;
				
				self.trackTabs = ko.observableArray([
					new Tab("Search", "Search","#SearchContent", "icon-search"),
					new Tab("Add", "Add", "#AddContent", "icon-plus")
				]);	
				
				self.chosenTrack = ko.observable();
				self.trackToAdd = ko.observable( new Track() );
				self.editedTrack= ko.observable( new Track() );
				self.tracks = ko.observableArray();	
				
				self.searchTracksResults = ko.observableArray();
				self.searchTracksResults = self.tracks;		

				self.goToTrack = function(track) { 
					self.chosenTrack(track); 			
					if( self.trackTabs()[2] )
						self.trackTabs.remove( self.trackTabs()[2] );
					self.trackTabs.push( new Tab( ko.toJS( track.Name ), "TrackTab", "#TrackContent", "icon-bookmark") );
					$('#TrackTab a').tab('show');
				};
						
				self.addTrack = function(track) { 
					var jsonTrack = ko.toJS(track);
					var jsonTrackData = {	"Name": jsonTrack.Name,
											"Major": jsonTrack.Major,
											"Description": jsonTrack.Description};
					if( addTrackClicked() )
					{
						var request = $.ajax({
							type: 'POST',
							url: "ajax_insert_track.php",
							dataType: 'json',
							data: jsonTrackData,
							success: function(status) {
								if( status.success ) {
									self.tracks.push( track );
									self.goToTrack( track ); 
									self.trackToAdd( new Track() );
									$("#AddTrackAlert").hide();
								}
								else
								{
									$("#AddTrackError").text(status.message);
									$("#AddTrackAlert").show();
									$("#AddTrackAlert").alert();
								}
							},
							error: function(status) {
								$("#AddTrackError").text("Connection Error!");
								$("#AddTrackAlert").show();
								$("#AddTrackAlert").alert();
							}
						});
					}
				};		

				self.editTrack = function(track) {
					var editedTrackData = new Track( 	ko.toJS(track.Name), 
														ko.toJS(track.Major),
														ko.toJS(track.Description)); 
														
					self.editedTrack( editedTrackData );
															
					$('#editTrack').modal();
				};

				self.saveEditedTrack = function( track ) {
					
					if( editTrackClicked() )
					{
						var jsonTrack = ko.toJS(track);
						var jsonTrackData = {	"Name": jsonTrack.Name,
												"Major": jsonTrack.Major,
												"Description": jsonTrack.Description };
						var request = $.ajax({
							type: 'POST',
							url: "ajax_update_track.php",
							dataType: 'json',
							data: jsonTrackData,
							success: function(status) {
								if( status.success ) {									
									self.chosenTrack().Name( ko.toJS(track.Name) );			
									self.chosenTrack().Major( ko.toJS(track.Major) );
									self.chosenTrack().Description( ko.toJS(track.Description) );
														
									$('#editTrack').modal('toggle');
								}
								else
								{
									$("#EditTrackError").text(status.message);
									$("#EditTrackAlert").show();
									$("#EditTrackAlert").alert();
								}
							},
							error: function(status) {
								$("#EditTrackError").text("Connection Error!");
								$("#EditTrackAlert").show();
								$("#EditTrackAlert").alert();
							}
						});					
					}	
				};	
				
				self.deleteTrack = function(track) {
					$('#deleteTrack').modal();
				};
				
				self.confirmedDeleteTrack = function(track) {
					var jsonTrack = ko.toJS(track);
					var jsonTrackData = {	"Name": jsonTrack.Name};
					var request = $.ajax({
						type: 'POST',
						url: "ajax_delete_track.php",
						dataType: 'json',
						data: jsonTrackData,
						success: function(status) {
							if( status.success ) {		
								$('#deleteTrack').modal('toggle');
								self.tracks.remove( track );
								self.trackTabs.pop();
								$('#Search a').tab('show');
							}
							else
							{
								$("#DeleteTrackError").text(status.message);
								$("#DeleteTrackAlert").show();
								$("#DeleteTrackAlert").alert();
							}
						},
						error: function(status) {
							$("#DeleteTrackError").text("Connection Error!");
							$("#DeleteTrackAlert").show();
							$("#DeleteTrackAlert").alert();
						}
					});					
				};
			}

			var viewModel = new TracksViewModel();
			ko.applyBindings( viewModel );

			function searchTrack() {
				TrackName = $("#SearchName").val();
				TrackMajor = $("#SearchMajor").val();
				TrackDescription = $("#SearchDescription").val();

				$.ajax({
					type: "POST",
					url: "search_track_results.php",
					dataType: 'json',
					data: {"Name": TrackName, "Major": TrackMajor, "Description": TrackDescription},
					success: function(data) {
						viewModel.tracks([]); 
						$.each(data, function(i, item) {
							var track = new Track( 	data[i].Name, 
													data[i].Major,
													data[i].Description );		
							viewModel.tracks.push( track );
						});
					}
				});
			}
			
			$("#searchTrackBtn").click( function() {
				searchTrack();
			});
			
			$("#SearchName").keydown( function() {
				searchTrack();
			});

			$("#SearchMajor").keydown( function() {
				searchTrack();
			});

			$("#SearchDescription").keydown( function() {
				searchTrack();
			});

			//HACK
			$("#Search").prop( "class", "active" );
		});
	</script>	
</body>
</html>
