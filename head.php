<?php
	session_start();


	function isLoggedIn(){
		if (isset($_SESSION['id'])) {
			return true;
		}
	}

	function toLogIn()
	{
		if(!isLoggedIn())
		{
			header("Location: login.php");
            exit;
		}
	}

	function isAdmin(){
		if ($_SESSION['type'] == 0) {
			header("Location: index.php");
            exit;
		}
	}

	function toIndex()
	{
		if(isLoggedIn() AND $_SESSION['type'] == 0)
		{
			header("Location: index.php");
            exit;
		}elseif(isLoggedIn() AND $_SESSION['type'] == 1){
			header("Location: orders.php");
            exit;
		}
	}
	$mysqli = mysqli_connect("localhost","root","root","store_db");

	

?>


<html>

<head>
<style>
.product-box{
	float: left;
	width: 200px;
	margin: 5px;
	border: 1px solid red;
	border-radius: 5px;
}

.order-box{
	float: left;
	width: 500px;
	margin: 5px;
	border: 1px solid green;
	border-radius: 10px;
}

.product-box > img{
	
	width: 160px;
	height: 100px;
	
}


.order-box > img{
	
	width: 160px;
	height: 100px;
	
}
</style>
</head>
<body>

<div id="top-bar">

<h2><a href="index.php">Kunle Shop</a>

<?php if(isLoggedIn()){ ?>
<span style="float:right;"><i><?php echo $_SESSION['name'] ?></i> | <a href="index.php?action=logout">Log out</a></span>
<?php }else{?>

<span style="float:right;"><a href="#">Register</a></span>
<?php }?>

</h2>
</div>