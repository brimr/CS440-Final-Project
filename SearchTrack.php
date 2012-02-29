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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#1" data-toggle="tab"><i class="icon-search"></i> Search</a></li>
                    <li class=""><a href="#2" data-toggle="tab"><i class="icon-plus"></i> Add</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="1">
                        <form class="form-vertical">
                        <fieldset>
                            <legend>Academic Track Search</legend>
                            <label for="trackName">Academic Track Name:</label>
                            <input type="text" class="input-xlarge" id="trackName">
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane" id="2">
                        <form class="form-vertical">
                        <fieldset>
                            <legend>Add Academic Track</legend>
                            <label for="OSUid">OSU ID:</label>
                            <input type="text" class="input-xlarge" id="OSUid">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="input-xlarge" id="firstName">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="input-xlarge" id="lastName">
                            <label for="major">Major:</label>
                            <select class="span2">
                                <option>CS</option>
                                <option>BIO</option>
                                <option>HIST</option>
                                <option>CHEM</option>
                                <option>ENG</option>
                            </select>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Dwight Trahin, Ryan Brim and Karen Lewey 2012</p>
            </footer>
        </div><!--/.fluid-container-->

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
</body>
</html>
