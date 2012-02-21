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
                    <li class="active"><a href="#lA" data-toggle="tab">Completed percentage</a></li>
                    <li class=""><a href="#lB" data-toggle="tab">Average Time</a></li>
                    <li class=""><a href="#lC" data-toggle="tab">Ethnicity</a></li>
                    <li class=""><a href="#lD" data-toggle="tab">Completed courses</a></li>
                    <li class=""><a href="#lE" data-toggle="tab">Required courses</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="lA">
                        <h3>Completed percentage</h3>
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>0-25%</th>
                                    <th>25-50%</th>
                                    <th>50-75%</th>
                                    <th>75-100%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>CSS</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Javascript</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stu</td>
                                    <td>Dent</td>
                                    <td>HTML</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="lB">
                        <h3>Average Time</h3>
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>2009</th>
                                    <th>2010</th>
                                    <th>2011</th>
                                    <th>2012</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>CSS</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Javascript</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stu</td>
                                    <td>Dent</td>
                                    <td>HTML</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="lC">
                        <h3>Ethnicity</h3>
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>2009</th>
                                    <th>2010</th>
                                    <th>2011</th>
                                    <th>2012</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>CSS</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Javascript</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stu</td>
                                    <td>Dent</td>
                                    <td>HTML</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="lD">
                        <h3>Completed courses</h3>
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>2009</th>
                                    <th>2010</th>
                                    <th>2011</th>
                                    <th>2012</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>CSS</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Javascript</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stu</td>
                                    <td>Dent</td>
                                    <td>HTML</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="lE">
                        <h3>Required courses</h3>
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>2009</th>
                                    <th>2010</th>
                                    <th>2011</th>
                                    <th>2012</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>CSS</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Javascript</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Stu</td>
                                    <td>Dent</td>
                                    <td>HTML</td>
                                </tr>
                            </tbody>
                        </table>
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
</body>
</html>
