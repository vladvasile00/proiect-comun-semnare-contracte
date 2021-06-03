<?php
//include('config.php');
echo "mama mia";
function check_login($con)
{

	echo "mmm";
	if(isset($_SESSION['user_id']))
	{
		echo "mmmmmm";
		$dbhost = "localhost:8889/shop";
		$dbuser = "root";
		$dbpass = "root";
		$dbname = "dbb_shop";

		$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		// Check connection
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
 		 }
 		 echo "Connected successfully";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	//die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
?>