<?php

	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	if(!isset($_SESSION['username'])){
		die("<h1 style = 'color : red'>Please <a href = 'login.php'>Login</a> to Buy Products</h1>");
	}
	$title = "Checking out";
	require "./template/header.php";
	$conn = db_connect();

	$username = $_SESSION['username'];
  	$query = "SELECT * FROM users WHERE  username = '$username'";
  	$result = mysqli_query($conn, $query);
  	$row = mysqli_fetch_assoc($result);
  	if(!$row){
    echo('<p style="color:red">');
    exit;
  	}
  	$name = $row['username'];
  	$email = $row['email'];
  	$address1 = $row['address_1'];
  	$address2 = $row['address_2'];
  	$city = $row['city'];
  	$zip = $row['zip'];
  	$state = $row['state'];

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
<style>
        th{
            background-color: black;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
}
</style>
<h1 class="text-center display-1" style = "padding : 20px;" ><strong>Checkout</strong></h1> 
	<table class="table">
		<tr>
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
		<tr>
			<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
			<td><?php echo "₹" . $book['book_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "₹" . $qty * $book['book_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo $_SESSION['total_items']; ?></td>
			<td><?php echo "₹" . $_SESSION['total_price']; ?></td>
		</tr>
	</table>
	<form method="post" action="purchase.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-2">Name</label>
			<div class="col-md-8">
				<input type="text" name="name" class="col-md-8" class="form-control" value="<?= $username ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-2">Address</label>
			<div class="col-md-8">
				<input type="text" name="address" class="col-md-8" class="form-control" value="<?= $address1." ".$address2 ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-2">Email</label>
			<div class="col-md-8">
				<input type="text" name="address" class="col-md-8" class="form-control" value="<?= $email ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-2">City</label>
			<div class="col-md-8">
				<input type="text" name="city" class="col-md-8" class="form-control" value="<?= $city ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-2">Zip Code</label>
			<div class="col-md-8">
				<input type="text" name="zip_code" class="col-md-8" class="form-control" value="<?= $zip ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-2">State</label>
			<div class="col-md-8">
				<input type="text" name="country" class="col-md-8" class="form-control" value="<?= $state ?>">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Purchase" class="btn btn-success">
			<a href="books.php" class="btn btn-info">Continue Shopping</a>
		</div>
	</form>
	<p class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>