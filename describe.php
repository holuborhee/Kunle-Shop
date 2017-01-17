<?php
	include "head.php";
	if(isset($_POST['order_btn']))
	{
		$quantity = $_POST['quantity'];
		$description = $_POST['description'];
		$product = $_POST['product'];
		$user = $_SESSION['id'];
		$date = time();

		$query = "INSERT INTO `order` VALUES('','{$date}','$quantity','$description','$user','$product')";
		
		
		if($mysqli->query($query)){

			echo "YOU have successfully made purchase";
		}else{
			echo "INSERTION failed";
		}
	}
	toLogIn();
?>
	
<div id="body">
<?php if(!isset($_POST['order_btn'])){ ?>
<h4>Product Name: <?php echo $_GET['name'] ?></h4>
<form action="describe.php" method="post">
<input type="hidden" name="product" value="<?php echo $_GET['product'] ?>" />
<p>Quantity: <input type="text" name="quantity" placeholder="Enter quantity to buy" /></p>
<p>Description: <textarea name="description" placeholder="Colour, Size, e.t.c. " row="7" col="5" ></textarea></p>
<p><input type="submit" name="order_btn" value="Submit Order" /></p>

</form>
<?php
}
?>



</div>


</body>

</html>