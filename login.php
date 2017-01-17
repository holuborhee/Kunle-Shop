<?php
	include "head.php";
	if(isset($_POST['login_btn']))
	{
		$password = sha1($_POST['password']);
		$query = "SELECT * FROM users WHERE username = '{$_POST['username']}' AND password = '{$password}'";
		
		if($result = $mysqli->query($query) AND $result->num_rows == 1){

			$user = $result->fetch_object();
			$_SESSION['name'] = $user->name;
			$_SESSION['id'] = $user->id;
			$_SESSION['type'] = $user->type;
		}else{
			echo "Selection failed";
		}
	}
	toIndex();
?>
	
<div id="body">


<form action="login.php" method="post">
<p>Username: <input type="text" name="username" placeholder="Enter your username" /></p>
<p>Password: <input type="password" name="password" placeholder="Enter your password" /></p>
<p><input type="submit" name="login_btn" value="Click to log In" /></p>

</form>



</div>


</body>

</html>