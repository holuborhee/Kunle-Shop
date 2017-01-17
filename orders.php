<?php
	include "head.php";
	if(isset($_GET['action']) AND $_GET['action'] == 'logout')
	{
		session_destroy();
		header("Location: login.php");
            exit;
	}
	toLogIn();
	isAdmin();
?>
	
<div id="body">


<?php
	$query = "SELECT * FROM `order` ORDER BY id DESC";
	$result = $mysqli->query($query);
?>
<h2>All Orders [<?php echo $result->num_rows ?>]</h2>
<?php
	while ($order = $result->fetch_object()) {
?>
	<div class="order-box">

	<?php
		$query = "SELECT * FROM product WHERE id = '$order->product_id'";;
		$product = $mysqli->query($query);
		$product = $product->fetch_object();

		$total = $product->price * $order->quantity;

		$query = "SELECT * FROM users WHERE id = '$order->users_id'";;
		$user = $mysqli->query($query);
		$user = $user->fetch_object();

	?>
<h2><?php echo $product->name ?></h2>
<img src="<?php echo $product->picture ?>" />



<p>#<?php echo $product->price ?></p>
<ul>
<li>Order Date: <b><?php echo date('l d M, Y g:iA',$order->date); ?></b></li>
<li>Order Quantity: <b><?php echo $order->quantity; ?></b></li>
<li>Total Price: <b>#<?php echo $total; ?></b></li>
<li>Description: <b><?php echo $order->description; ?></b></li>
</ul>

<ul>
<li>Customer Name: <b><?php echo $user->name ?></b></li>
<li>Customer Address: <b><?php echo $user->address ?></b></li>
<li>Customer Phone: <b><?php echo $user->phone ?></b></li>
</ul>

</div>	
<?php
	}

?>



</div>


</body>

</html>