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
</body>
</html>

<?php
$stringtosearch = $_GET['jobsearch'];
$selected_option = $_GET["list"];

//open the file txt
$file = fopen("jobs.txt", "r");
//create an array named content
$content = array();
while (!feof($file))
{
    $content[] = fgets($file);
}

//close  the file after reading
fclose($file);

//flag whether match found or not
$flag = 0;

function jobsearch()
{

    global $lines;

    //implode the line
    $lines['Application Type'] = implode($lines['Application Type'], ',');

    //print the details of the jobs
    echo '<table>';
    foreach ($lines as $line => $line_value)
    {
        echo "

              <tr>
               <td class='jobresulte'>$line:</td>
               <td class='jobresulte_values'> $line_value</td>
              </tr>
            ";
    }
    echo '</table>';

}
//array of lines is traversed
foreach ($content as $value)
{
    //unserialize the element
    $lines = unserialize($value);

    //if jobtitle present in the line
    if ($selected_option == "Title" and stripos($lines['Job Title'], $stringtosearch) !== false)
    {
        //update flag to 1
        $flag = 1;
        //job search function is called
        jobsearch();

    }
    elseif ($selected_option == "contract" and stripos($lines['Contract Type'], $stringtosearch) !== false)
    {

        $flag = 1;
        jobsearch();
    }
    elseif ($selected_option == "position" and stripos($lines['Position Type'], $stringtosearch) !== false)
    {

        $flag = 1;
        jobsearch();
    }
    elseif ($selected_option == "location" and stripos($lines['Location'], $stringtosearch) !== false)
    {

        $flag = 1;
        jobsearch();
    }
}

//no match found if flag remained unchanged
if ($flag == 0)
{

    echo "No matches found";
}
?>
