<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Programming :: Lab 2" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
<title>Assigment 1</title>
</head>

<body>
<nav>
    <ul class = "nav">
        <li><a href="about.php">About</a></li>
        <li><a  href="searchjobform.php">Search Job</a></li>
        <li><a class="active" href="postjobform.php">Post Job</a></li>
        <li><a href="index.php">Home</a></li>
    </ul>
</nav>

<?php $currentDate = date("d/m/y");
if(!isset($_POST['submit'])){
    $positionID =null;
    $title =null;
    $description =null;
    $positionType =null;
    $contract =null;
    $closingDate =$currentDate;

}

?>
   <h1>Job Vacancy Posting System</h1>


<form action="postjobprocess.php" method="POST">

    <div class="input-container">
    <label for="posid">Position ID:</label>
    <input type="text" placeholder="P000" name="posid"   value= "<?php echo htmlspecialchars($positionID)?>" > <?php if (isset($error[0])) { ?>
            <?php
            echo "<p class=\"error\">".$error[0]."</p>"
            ?>
        <?php }?>
    </div>


    <div class="input-container">
	<label for="title">Title:</label>
    <input type="text" placeholder="IT Manager" name="title" value= "<?php echo htmlspecialchars($title)?>" ><?php if (isset($error[1])) { ?>
            <?php
            echo "<p class=\"error\">".$error[1]."</p>"
            ?>
        <?php }?>
    </div>

    <div class="input-container">
	<label for="desc">Description:</label>
    <textarea class ="desc"  name="desc"  rows="5"  ><?php echo htmlspecialchars($description)?></textarea><?php if (isset($error[2])) { ?>
            <?php
            echo "<p class=\"error\">".$error[2]."</p>"
            ?>
        <?php }?>
    </div>

    <div class="input-container">
	<label for="closedate">Closeing Date:</label>
    <input type="text" name="closedate" value="<?php echo $closingDate;?>" ><?php if (isset($error[3])) { ?>
	< <?php
            echo "<p class=\"error\">".$error[3]."</p>"
            ?>
        <?php }?>
    </div>

	<label for="postype">Position:</label>
    <input type="radio" name="postype" value="FullTime" <?php if ($positionType == 'FullTime') echo 'checked';?> >Full Time
   <input type="radio" name="postype" value="PartTime" <?php if ($positionType == 'PartTime') echo 'checked';?> >Part Time<?php if (isset($error[4])) { ?>
        <?php
        echo "<p class=\"error\">".$error[4]."</p>"
        ?>
    <?php }?><br>


    <label for="contype">Contract:</label>
    <input type="radio" name="contype" value="on-going" <?php if ($contract == 'on-going') echo 'checked';?> >On-going
   <input type="radio" name="contype" value="fixedTerm" <?php if ($contract == 'fixedTerm') echo 'checked';?> >Fixed Term<?php if (isset($error[5])) { ?>
        <?php
        echo "<p class=\"error\">".$error[5]."</p>"
        ?>
    <?php }?><br>
	
	
    <label for="apptype">Application by:</label>
    <input type="checkbox" name="apptype[0]" value="post" <?php if(isset($applicationType[0])  =="post" ) echo 'checked="checked"'; ?> >Post
   <input type="checkbox" name="apptype[1]" value="email" <?php if(isset($applicationType[1])  =="email" ) echo 'checked="checked"'; ?> >Email
    <br><br><?php  if (isset($error[6])) { ?>
        <?php
        echo "<p class=\"error\">".$error[6]."</p>"
        ?>
    <?php }?>

    
	<label for="Location">Location:</label>
     <select  name="Location" >
	     <option disabled selected value> -- select an option -- </option>
         <option value="ACT" <?php if(isset($location) && $location == "ACT") echo "selected='selected'"; ?>>ACT</option>
         <option value="NSW" <?php if(isset($location) && $location == "NSW") echo "selected='selected'"; ?>>NSW</option>
         <option value="NT"  <?php if(isset($location) && $location == "NT") echo "selected='selected'"; ?> >NT</option>
         <option value="QLD" <?php if(isset($location) && $location == "QLD") echo "selected='selected'"; ?>>QLD</option>
		 <option value="SA" <?php if(isset($location) && $location == "SA") echo "selected='selected'"; ?>>SA</option>
         <option value="TAS" <?php if(isset($location) && $location == "TAS") echo "selected='selected'"; ?>>TAS</option>
         <option value="VIC" <?php if(isset($location) && $location == "VIC") echo "selected='selected'"; ?>>VIC</option>
         <option value="WA" <?php if(isset($location) && $location == "WA") echo "selected='selected'"; ?>>WA</option>
     </select><?php if (isset($error[7])) { ?>
        <?php
        echo "<p class=\"error\">".$error[7]."</p>"
        ?>
	<?php }?><br><br>


    <button type="submit" name= "reset" > Reset</button>
     <button type="submit"  name= "submit" >Submit</button><br><br>


</form>

<p>All fields are required.<a href="index.php" > Return to Homepage</a> </p>

</body>
</html>
