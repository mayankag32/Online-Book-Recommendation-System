<?php
  session_start();
  $count = 0;
  //header('Content-Type: image/jpeg');
  // connecto database
   if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  // if (isset($_GET['logout'])) {
  //   session_destroy();
  //   unset($_SESSION['username']);
  //   header("location: index.php");
  // }
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";  
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
<div>
  <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <h1 style = "font-family: 'Anton',sans-serif">Welcome <strong style = "color : 'green'" ><?php echo $_SESSION['username']; ?></strong></h1>
      <!-- <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
    <?php endif ?>
</div>
      <!-- Example row of columns -->
      <h1 class="lead text-center text-muted" style = "font-family :'Righteous'">Books to Discover</h1>
      <div class = "row">
      <div class = "col-md-16">
          <div >
        <?php foreach($row as $query_row) { ?>
      	   <?php require "./template/book_container.php" ?> 
        <?php } ?>
          </div>
      </div>
    </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>