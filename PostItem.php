<?php
	include("Sellybi.htm");
	if(isset($_GET['Message']))
	{
		$regerror = $_GET['Message'];
		
	}
?>
<html>
	<body>
		<header></header>
		<section id = "post">
			<header><strong>Post an Item</strong></header><br/>
		<form enctype="multipart/form-data" action = "PostItemProc.php" method = "POST">	
			<label id = "three">
			Item title:<input type = "text" name = "title" id = "title" required = "true" /><br/>
			Item cost:<span>&dollar;</span><input type ="number" min = "0" step = "any" name = "cost" id = "cost" required = "true" /><br/>
			<input type='hidden' name=\"MAX_FILE_SIZE\" value=\"4000000\">
			Picture:<input type = "file" name = "uploadPic[]" id = "uploadPic" multiple = "multiple"/><br>
			<input type = "button" id = "more" class = "upload" value = "Add More Pictures"/>
			
			</label>
			Category of Item(You can choose more than one):<br><br>
			<input type = "checkbox" name = "category" value = "Apparel" />Apparel
			<input type = "checkbox" name = "category" value = "Households" />Household
			<input type = "checkbox" name = "category" value = "Books" />Books
			<input type = "checkbox" name = "category" value = "Stationery" />Stationery
			<input type = "checkbox" name = "category" value = "Electronics" />Electronics
			<br><br>Item Description:<br/>
			<textarea name = "aboutItem" id = "aboutItem" rows="4" cols="30">Tell us about the item</textarea>
			<br/>
			<br/>
			<input type = "submit" value = "Post" name = "Post"/>
		</form>
		</section>
		<style>
			form, header{
				margin-left:15%;
			}
			label#three input{
				display:block;
			}
			section#post{
				border: 2px solid rgb(212,175,55);
				border-radius: 20px;
				margin-left: 400px;
				margin-right: 400px;
			}
			input[type = submit]
			{
				margin-left: 20px;
				border-radius: 5px; 
				background-color: rgb(212,175,55);
			}
		</style>
	</body>
	
</html>