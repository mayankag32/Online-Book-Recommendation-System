<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of Books";
  require_once "./template/header.php";
?>  
    <h1 class="text-center display-1" style = "font-family :'Righteous'" ><strong>Full Catalogs of Books</strong></h1>  
    <div class = "form-group">
      <form action="search.php" method="GET">
        <input class = "form-control input-lg"type="text" name="query" placeholder="Search by name or author" />
    </form>
 </div>
  
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
        <?php require "./template/book_container.php" ?> 
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>