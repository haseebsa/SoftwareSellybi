<?php
/*
		RegProcessing.php
		This is the page that processes the information from the registration form
		ensures the info entered is secure
	*/	
	ob_start();
	session_start();
	error_reporting(E_ALL);
	
	require_once("db.php");
	
	$fnS = $_POST['firstName'];
	$fn = addslashes($fnS);
	$ln  = $_POST['lastName'];
	$email     = $_POST['email'];
	$password  = $_POST['psd'];
	$confirmPass = $_POST['psdC'];
	$aboutMe = $_POST['aboutMe'];
	
	//check to ensure that users put in @email.meredith.edu
	list($user,$domain) = split("@",$email);
	
	if($domain == "email.meredith.edu" | $domain == "meredith.edu")
	{
		//this person can proceed
	}
	else
	{
		$Message = urlencode("Please use your Meredith email address");
		header("Location: Registration.php?Message=".$Message);
	}
	
	//If they do not match
	if($password != $confirmPass)
	{
		$Message = urlencode("Passwords do not match");
		header("Location: Registration.php?Message=".$Message);
	}
	
	//Counter Check email and passwords for security purposes
	else if($email != "" && $password != "")
	{
		//generate a query that seeks to find any matching record - this should yield 0 otherwise there is a matching email
		$q = "SELECT COUNT(*) FROM User WHERE email = '$email';";
		
		$result = mysql_query($q);
		
		echo"Wohoo this works so far";
		$nr = mysql_num_rows($result);
		
		//if the rsult si empty - error_get_last
		if($result == 0)
		{
			echo"There is an error";
		}
		//if there is a record
		else if ($nr == 0)
		{ 
			echo "There must be an error. No results";
		}
		//some results
		else
		{
			$row = mysql_fetch_array($result);
			
			//no match
			if($row[0] == 0)
			{
				echo"There is absolutely nothin";
				
				if($aboutMe == "")
				{
					$aboutMe = "Hi! My name is $fn. Welcome to my page!";
				}
			
				$query= "INSERT INTO User SET firstName='$fn',lastName = '$ln',email = '$email'"
						 .",password= '$password',profilePic = 'standard', aboutMe = '$aboutMe';";
				
				mysql_query($query);
						 
				$Message = urlencode("You have successfully registered! You can go ahead login. Please enjoy surfing this site");
				header("Location: One.php?Message=".$Message);
			}
			else
			{
				echo"Email already exists. Please use a different email address";
			}
		}	
	}
?>