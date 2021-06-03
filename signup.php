<?php 
echo"buhuhu";
session_start();

	//include("config.php")
    include("functions.php")


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['uname'];
		$password = $_POST['psw'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$con= mysqli_connect("localhost","root","","dbb_shop");
			// Check connection
			if (!$con) {
  				die("Connection failed: " . mysqli_connect_error());
			}
			echo "Connected successfully";
			$result = mysqli_query($con, $query);
			//save to database
			$id = random_num(20);
			$query = "insert into tbl_login (id,flduname,fldpsw) values ('$id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>