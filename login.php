<?php 
echo "blabla";
session_start();

	//include("config.php");
    include("functions.php")

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['uname'];
		$password = $_POST['psw'];
		echo '$user_name';
        echo '$password';

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$con= mysqli_connect("localhost:8889/shop","root","","dbb_shop");
			// Check connection
			if (!$con) {
  				die("Connection failed: " . mysqli_connect_error());
			}
			echo "Connected successfully";
			$query = "select * from tbl_login where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>