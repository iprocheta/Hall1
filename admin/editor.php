<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
	<div class="container-fluid">
		<form action="" method="post">
			<textarea class="ckeditor" name="editor"></textarea>
			<input type="submit" value="INSERT">
		</form>
	</div>
</body>
</html>
<?php
if(isset($_POST['editor']))
{
	$article = $_POST['editor'];
	$conn = mysqli_connect("localhost","root","") or die ("Can't connect");
	mysqli_select_db($conn,"se") ; 
	mysqli_query($conn,"INSERT INTO editor (comment) VALUES ('".mysqli_real_escape_string($conn,$article)."')");
}
?>