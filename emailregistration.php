<html>
<body>
<form action=" " method="POST">
	<h3>id</h3><input type="text" name="ID">
	<h3>username</h3><input type="text" name="U_name">
	<h3>email</h3><input type="text" name="Email">
	<h3>password</h3><input type="password" name="Password">
	<h3>active</h3><input type="text" name="Active">
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php
	$connection=mysqli_connect("localhost", "root", "");
	$db=mysqli_select_db($connection, 'Email_reg');
	if(isset($_POST['submit']))
	{
		$id=$_POST['ID'];
		$uname=$_POST['U_name'];
		$email=$_POST['Email'];
		$pswd=$_POST['Password'];
		$act=$_POST['Active'];
		$query=mysqli_query($connection,"insert into registration values('$id','$uname','$email','$pswd','$act')");
		if($query)
		{
			echo 'user created successfully';
		}
		else
		{
			echo 'user registeration failed';
		}
	}
?>