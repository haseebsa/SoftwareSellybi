<?php
include("Sellybi.htm");
include("db.php");

	//select items from 
	$q="SELECT Item.itemID, itemPic, itemTitle FROM ItemPicture, Item WHERE ItemPicture.itemID = Item.itemID;";
	$result=mysql_query($q);
	$nr = mysql_num_rows($result);
	$c = 0;  //this keeps count of the number of columns
	$maxC = 6;
	$itemPH = 0;
	echo"<table cellspacing='20' background-color = rgb(212,175,55)>";
	echo"<tr>";
	
	while($i<$nr)
	{
		$row=mysql_fetch_array($result);
		$title = $row['itemTitle'];
        $filename = $row['itemPic'];
		$itemID = $row['itemID'];
		if($itemPH != $itemID)
		{
			if($c == $maxC)
			{
				$c = 0;
				echo"</tr>";
				echo"<tr>";
			}
			
			echo "<td align = 'center' style = 'background-color:rgb(212,175,55)'><strong><span style = 'text-align:center'>$title</span></strong></br><a href = 'ViewItemPage.php?itemID=$itemID'><img src = 'ItemPictures/$itemID/$filename' width = '200' height = '200' alt = '$filename'/></a></td>";
		}
		$itemPH = $itemID;
		$c++;
		$i++;
	}
	
	//even output_add_rewrite_var
	while($c <= $maxC)
	{
		echo"<td> </td>";
		$c++;
	}
?>