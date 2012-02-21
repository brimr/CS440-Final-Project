<html>
<head>
  <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
<!--<head>
<style type="text/css">
	.editbox
	{
		display:hidden;
	}

</style>-->
<script language="javascript">

var editableHid = function()
{
	var elements
	for (current in (elements = document.getElementsByClassName("editbox")))
	{
		if(current == "length")
			break
		elements[current].style.visibility="hidden"
	}
	document.getElementById("butEdit").innerHTML = "Edit"

}

var editableVis = function()
{
	var elements
	for (current in (elements = document.getElementsByClassName("editbox")))
	{
		if(current == "length")
			break
		elements[current].style.visibility="visible"
	}
	document.getElementById("butEdit").innerHTML = "Save"
}

</script>

</head>
 <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./index.html">College Accreditation</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active">
                <a href="./SearchStudent.html">Search Students</a>
              </li>
              <li class="">
                <a href="./ViewStudent.html">View Students</a>
              </li>
              <li class="">
                <a href="./ViewCourse.html">View Courses</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

    <br/><br/><br/>
<body onload="editableHid()">
<div id="links" align="center">
<a href="SearchStudent.html">Search Students</a>
<a href="ViewStudent.html">View Students</a>
<!-- <a href="AddStudent.html">Add Students</a> -->
<a href="ViewCourse.html">View Courses</a>
</div>
<div id="studentInfo" align="center">
<h1>Student Information</h1>

<form id="Info">

<h3>General Information</h3>
<table id="generalTable" width="50%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td>Name:</td>
<td><a id="nameDisp">John Doe</a>
<td><input class="editbox" id="nameEdit" value="John Doe" /></td>
</td>
</tr>

<tr>
<td>ID:</td>
<td><a id="idDisp">931 222 333</a>
<td><input class="editbox" id="idEdit"  value="931 222 333" /></td>
</tr>

<tr>
<td>Gender:</td>
<td><a id="genderDisp">Male</a>
<td><input class="editbox" id="genderEdit"  value="Male" /></td>
</tr>

<tr>
<td>Age:</td>
<td><a id="ageDisp">22</a>
<td><input class="editbox" id="ageEdit"  value="22" /></td>
</tr>

<tr>
<td>Date of Birth:</td>
<td><a id="dobDisp">05/21/1989</a>
<td><input class="editbox" id="dobEdit"  value="05/21/1989" /></td>
</tr>

<tr>
<td>Ethnicity:</td>
<td><a id="ethDisp">Caucasian</a>
<td><input class="editbox" id="ethEdit"  value="Caucasian" /></td>
</tr>

</table>
<h3>Track Information</h3>

<table id="trackTable" width="50%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Major:</td>
<td><a id="majorDisp">Computer Science</a>
<td><input class="editbox" id="majorEdit"  value="Computer Science" /></td>
</tr>

<tr>
<td>Tracks:</td>
<td><a id="trackDisp">Information Systems</a>
<td><input class="editbox" id="trackEdit"  value="Information Systems" /></td>
</tr>

<tr>
<td>Percent Complete:</td>
<td><a id="percentDisp">85%</a>
<td><input class="editbox" id="percentEdit"  value="85%" /></td>
</tr>
</table>

<button id="butEdit" onclick="editableVis();">Edit</button>

</form>
</div>
</body>
</html>