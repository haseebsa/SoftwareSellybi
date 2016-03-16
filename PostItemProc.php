<?php
	include("db.php");
	session_start();
	
	//count the number of uploaded filesize
	//$total = count($_FILES['uploadPic']['name']);
	
	//retrieve from form
	$title = addslashes($_POST['title']);
	$cost = addslashes($_POST['cost']);
	$description = addslashes($_POST['aboutItem']);
	
	//generate the next item ID number 
	$q = "SELECT * FROM Item;";

	$result = mysql_query($q);

	if($result != 0)
	{
		$nr = mysql_num_rows($result);
		$itemID = $nr + 1;
	}
	
	mkdir("ItemPictures/$itemID", 0777);
	$target_dir = "ItemPictures/$itemID/";
	
	//loop through each file path 
	if(isset($_POST['Post']))
	{
		$target_file = $target_dir.basename($_FILES['uploadPic']['name']);
		$filename = $_FILES['uploadPic']['name'];
		
		echo"This is the target file ".$target_dir;

		move_uploaded_file($_FILES['uploadPic']['tmp_name'], $target_file);

		$q1 = "INSERT INTO ItemPicture SET itemID = $itemID, itemPic='$filename';";
		$result = mysql_query( $q1);
		
		$q2 = "INSERT INTO Item SET itemID = $itemID, email = 'mcrialem@email.meredith.edu', cost = $cost, description = '$description', views = 0, soldTag = 0, itemTitle = '$title';";
		$result = mysql_query( $q2);

		//header("Location: homePage.php");
	}
	else
	{
		echo"What is happening??";
	}
?>