<?php
	if(isset($_GET['Message']))
	{
		$regerror = $_GET['Message'];
		
	}
?>
<html>
	<body>
		<header><img src = "sellybi.png" width = "300" height = "150"/></header>
		<section>
			<header><strong>Create an Account</strong></header><br/>
		<form action = "RegProcessing.php" method = "POST">
			<?php echo "<span style = 'color:red'>".$regerror."</span><br/>"; ?><br/>
			First Name:<input type = "text" name = "firstName" id = "firstName" required = "true" /><br/>
			Last Name:<input type ="text" name = "lastName" id = "lastName" required = "true" /><br/>
			Email:(use your meredith address)<input type = "text" name = "email" id = "email" required = "true" /><br/>
			Password:<input type = "password" name = "psd" id = "psd" required = "true" /><br/>
			Confirm Password:<input type = "password" name = "psdC" id = "psdC" required = "true" /><br/>
			About Me:<br/>
			<textarea name = "aboutMe" id = "aboutMe" rows="4" cols="30">Hi! Welcome to my Page!!!</textarea>
			<br/>
			<br/>
			<input type = "submit" value = "Register"/>
		</form>
		</section>
		<style>
			form, header{
				margin-left:15%;
			}
			input{
				display:block;
			}
			section{
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