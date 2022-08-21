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
        <li><a class="active" href="about.php">About</a></li>
        <li><a  href="searchjobform.php">Search Job</a></li>
        <li><a  href="postjobform.php">Post Job</a></li>
        <li><a  href="index.php">Home</a></li>
    </ul>
</nav>
<?php
echo "
         <div class='about'>
   <h2>About This Assignment</h2>
   <br>
   <p>*All html code has been validated*</p>
   <p><strong>What is the PHP version installed in mercury?</strong> ". phpversion()."</p>
   <br>
   <p><strong>What tasks you have not attempted or not completed?</strong></p>
   <ul>
      <li> Sort by date was attempted but not completed</li>
   </ul>
   <br>
   <p><strong>What special features have you done, or attempted, in creating the site that we should
      know about?</strong>
   </p>
   <ul>
      <li>User information does not disappear if they refresh or get an error</li>
      <li>The user is not directed to another page if there is any error, so they don't need to click the back button</li>
      <li>All the error are clearly and neatly shown </li>
   </ul>
   <br>
   <p><strong> What discussion points did you participated on in the unit’s discussion board for
      Assignment 1? If you did not participate, state your reason.</strong>
   </p>
   <ul>
      <li>I tried to help others as much as possible both outside and inside of class</li>
   </ul>
   <img src='img/0.PNG' alt='Guestion answer'>
</div>
         ";
echo "<a class='button' href='index.php'>Return Home</a>";
?>
</body>
</html>