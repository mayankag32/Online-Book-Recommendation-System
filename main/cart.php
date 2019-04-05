<?php	
	session_start();
	if(!isset($_SESSION['username'])){
		die("<h1 style = 'color : red'>Please <a href = 'login.php'>Login</a> to Buy Products</h1>");
	}
	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";
	require_once "./bootstrap.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
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
	<h1 class="text-center display-1" style = "padding : 20px;" ><strong>Your Shopping Cart</strong></h1> 
   	<form action="cart.php" method="post">
   		<div class = "container">
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
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
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
		</div>

	   	<input type="submit" class="btn btn-warning" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-info">Go To Checkout</a> 
	<a href="books.php" class="btn btn-success">Continue Shopping</a>
<?php
	} else {
		echo "<h1 style = 'color : red'class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</h1>";
		echo "</br>";
		echo "<a href = 'books.php' class = 'btn btn-info'>Back to Catalogs</a>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>