<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Assigment 1</title>
</head>

<body>

<?php
//declaring all the variables
$positionID = $_POST['posid'];
$title = $_POST['title'];
$description = $_POST['desc'];
$closingDate = $_POST['closedate'];
$positionType = $_POST['postype'];
$contract = $_POST['contype'];
$applicationType = $_POST['apptype'];
$location = $_POST['Location'];
$reset = $_POST['reset'];
$submit = $_POST['submit'];
$error = array();

/*START OF PositionID ERRORS*/
if (empty($positionID))
{
    $error[0] = "PositionID can not be empty";

}
elseif (!preg_match("/^(P\d{4})$/", $positionID))
{
    $error[0] = 'Position ID Wrong format.It must start with an uppercase letter “P” followed by 4 digits';

}

/*END OF PositionID ERRORS*/

/*START OF TITLE ERRORS*/
if (empty($title))
{
    $error[1] = "Title can not be empty";

}
elseif (!preg_match("/^(\w[\s,\.\!]*){1,20}$/", $title))
{
    if (strlen($title) > 20)
    {
        $error[1] = 'Title should be no more than 20 characters';
    }
    else
    {
        $error[1] = " Only '.'(fullstop), ','(coma) and '!'(exclaimation mark) are allowed for the Title";
    }
}

/*END OF TITLE ERRORS*/

/*START OF DESCRIPTION ERRORS*/
if (empty($description))
{
    $error[2] = "Description can not be empty";

}
elseif (strlen($description) > 260)
{
    $error[2] = 'Description should be no more than 260 characters';
}

/*END OF DESCRIPTION ERRORS*/

/*START OF CLOSING DATE ERRORS*/
if (empty($closingDate))
{
    $error[3] = "Closing date can not be empty";

}
elseif (!preg_match("/^((3[0|1]|2\d|1\d|0\d|[1-9])\/(1[0-2]|0\d|[1-9])\/(\d{2}))$/", $closingDate))
{
    $error[3] = 'Wrong date format. Example date format = DD/MM/YY';

}

/*END OF CLOSING DATE' ERRORS*/

/*START OF POSITION TYPE ERRORS*/
if (empty($positionType))
{

    $error[4] = "Position type can not be empty";

}

/*END OF POSITION TYPE ERRORS*/

/*START OF CONTRACT ERRORS*/
if (empty($contract))
{

    $error[5] = "Contract type can not be empty";

}

/*END OF CONTRACT ERRORS*/

/*START OF APLICATION ERRORS*/
if (empty($applicationType))
{

    $error[6] = "Application type can not be empty";

}

/*END OF APLICATION ERRORS*/

/*START OF LOCATION ERRORS*/
if (empty($location))
{

    $error[7] = "Location can not be empty";

}

/*END OF LOCATION ERRORS*/

if (isset($submit))
{
    if (empty($error))
    {
        //searches file for duplicate IDS
        $filename  = fopen("jobs.txt", 'w') or die("Can't create file");

        $searchfor = $positionID;
        $file = file_get_contents($filename);
        if (strpos($file, $searchfor))
        {
            $error[0] = "This ID already exist";
        }
        else
        {
            //i have put the nav bar in a if statement because  otherwise it shows 2 navs
            echo '
<nav>
    <ul class = "nav">
        <li><a href="about.php">About</a></li>
        <li><a  href="searchjobform.php">Search Job</a></li>
        <li><a class="active" href="postjobform.php">Post Job</a></li>
        <li><a href="index.php">Home</a></li>
    </ul>
</nav>';

            $data = serialize(["PositionID" => $positionID, "Job Title" => $title, "Description" => $description, "Closing Date" => $closingDate, "Position Type" => $positionType, "Contract Type" => $contract, "Application Type" => $applicationType, "Location" => $location]);
            //opens a the file if file doesnt exists creates the file write to the file and closes it
            file_put_contents($filename, $data . "\n", FILE_APPEND);

            // gets the value of everything and displays the success message and the values user as entered
            echo "<h2>successfully added your request with the following criteria.</h2>";
            echo "
                <nav class='postedjob_details'>
                    <p><strong> Position ID:</strong> " . $positionID . "</p>
                    <p><strong> Job title:</strong> " . $title . "</p>
                    <p><strong> Description: </strong> " . $description . "</p>
                    <p><strong> Closing Date: </strong> " . $closingDate . "</p>
                    <p><strong> Position: </strong> " . $positionType . "</p>
                    <p><strong> Contract: </strong> " . $contract . "</p>
                    <p><strong> Apply by: </strong> " . implode(", ", $applicationType) . "</p>
                    <p><strong> Location: </strong> " . $location . "</p>
                </nav>
            ";
            echo "<a class='button' href='postjobform.php'>Post Another Job</a><br> <br>";
            echo "<a class='button' href='index.php'>Home</a>";
        }
    }
}

/* RESETS EVERYTHIG */
if (isset($reset))
{

    $positionID = null;
    $title = null;
    $description = null;
    $closingDate = null;
    $positionType = null;
    $contract = null;
    $applicationType = null;
    $location = null;
    $error = null;
    include ('postjobform.php');
}

// if there is no error doesn't include the postjobform.php
if (!empty($error))
{
    include ('postjobform.php');
}
?>

</body>
</html>
