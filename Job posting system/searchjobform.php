<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Title" content="Assignment 1">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Job Vacancy Posting System</title>
</head>
<body>
<nav>
    <ul class = "nav">
        <li><a href="about.php">About</a></li>
        <li><a class="active" href="searchjobform.php">Search Job</a></li>
        <li><a href="postjobform.php">Post Job</a></li>
        <li><a href="index.php">Home</a></li>
    </ul>
</nav>
<h1>Job Vacancy Posting System </h1>
<form action="searchjobprocess.php" method="GET">
    <label>Select what you would like to search by:</label>
    <select  id="list" name="list" onchange="getSelectedValue()">
        <option disabled selected value> -- select-- </option>
        <option value="Title">Title</option>
        <option value="contract">Contract</option>
        <option value="position">Position</option>
        <option value="location">Location</option>
    </select>
    <br><br>
    <div id="all_options">
        <div id="search_byTitle">
            <label>Title:</label>
            <input type="text"  name="jobsearch" >
        </div>
        <div id="search_byContract">
            <label >Contract:</label>
            <input type="radio"  name="jobsearch" value="on-going"  >On-going
            <input type="radio"  name="jobsearch" value="fixedTerm" >Fixed Term
        </div>
        <div id="search_byPosition">
            <label>Position:</label>
            <input type="radio" name="jobsearch" value="FullTime"  >Full Time
            <input type="radio" name="jobsearch" value="PartTime" >Part Time
        </div>
        <div id="search_byLocation">
            <label >Location:</label>
            <select  name="jobsearch" >
                <option disabled selected value> -- select an option -- </option>
                <option value="ACT" >ACT</option>
                <option value="NSW" >NSW</option>
                <option value="NT" >NT</option>
                <option value="QLD" >QLD</option>
                <option value="SA" >SA</option>
                <option value="TAS" >TAS</option>
                <option value="VIC" >VIC</option>
                <option value="WA" >WA</option>
            </select>
        </div>
    </div>
    <br><br><button type="submit"  name= "submit" >Search</button>
</form>
<script>
/*
after hours of research i found out that i will not be able to use php to do this,
 so i used js to hide the elements and display them depending on what user selects,
 and it works pretty good, however it could be a little shorter but because of the limited time i will not be able
 to clean it up.
*/
    function getSelectedValue(){
        var selectedValue = document.getElementById("list").value;
        var all_options = document.getElementById("all_options");
        var option1 = document.getElementById("search_byTitle");
        var option2 = document.getElementById("search_byContract");
        var option3 = document.getElementById("search_byPosition");
        var option4 = document.getElementById("search_byLocation");

        // see what user has selected and shows the appropriate input/s
        if(selectedValue){
            all_options.style.display ='inline'
        }
        if( selectedValue == "Title") {
            option1.style.display ='inline'
        } else{
            option1.style.display ='none'
        }
        if( selectedValue == "contract") {
            option2.style.display ='inline'
        }
        else{
            option2.style.display ='none'
        }
        if( selectedValue == "position") {
            option3.style.display ='inline'
        }
        else{
            option3.style.display ='none'
        }
        if( selectedValue == "location") {
            option4.style.display ='inline'
        }
        else{
            option4.style.display ='none'
        }
    }
</script>
<br>
<a href="index.php">Return To Home Page</a>
</body>
</html>