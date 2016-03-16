
<?php
include("db.php");
echo "We reached here"; 
$itemID = $_GET['itemID'];

$q= "SELECT email, cost, description, views, itemTitle FROM Item WHERE itemID = $itemID;";


$result=mysql_query($q);
 $nr = mysql_num_rows($result);
        echo "<table border='10' bordercolor='red' cellpadding='5' cellspacing='1'>  <thead>";
        echo "</thead><tbody>";
        for($i=0; $i<$nr; $i++)
        {
			echo "<tr>";
			$row=mysql_fetch_array($result);
			$itemTitle = $row['itemTitle'];
			$email = $row ['email']; 
		    $cost = $row ['cost']; 
			$description = $row ['description'];
			$views = $row ['views'];

            echo "<tr>";
            echo "<td> $itemTitle </td>\n";
                    
			echo "</tr> \n";
			echo "</tr>";
         
		}
		 echo "</body>";
		 echo "</table>";
?>
