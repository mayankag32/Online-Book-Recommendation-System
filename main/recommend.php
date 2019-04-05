<?php
  require_once "./functions/rest_functions.php"; 
  $conn = db_connect();
  $get_data = callAPI('GET', $title, false);
  $response = json_decode($get_data, true);
  ?>
<?php foreach ($response as $k=>$v){
    foreach ($v as $k1=>$v1) {
    	$query = "SELECT * FROM books WHERE book_title = '$v1'";
  		$result = mysqli_query($conn, $query);
  		if($result){
  		$query_row = mysqli_fetch_assoc($result);
  		if($query_row)
  			require "./template/book_container.php";
  		}
    }}
?>
