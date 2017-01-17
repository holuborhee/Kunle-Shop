<?php
	include "head.php";
	if(isset($_GET['action']) AND $_GET['action'] == 'logout')
	{
		session_destroy();
		header("Location: login.php");
            exit;
	}
	toLogIn();
?>
	
<div id="body">


<?php
	$query = "SELECT * FROM product";
	$result = $mysqli->query($query);
?>
<h2>All Products [<?php echo $result->num_rows ?>]</h2>
<?php
	while ($product = $result->fetch_object()) {
?>
	<div class="product-box">
<img src="<?php echo $product->picture ?>" />

<h3><?php echo $product->name ?></h3>

<p>#<?php echo $product->price ?></p>

<a href="describe.php?product=<?php echo $product->id ?>&name=<?php echo $product->name ?>">Click to order</a>

</div>	
<?php
	}

?>



</div>


</body>

</html>