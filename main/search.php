<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
     
    mysql_select_db("dbms_online") or die(mysql_error());

    require_once "bootstrap.php";
?>
 
<!DOCTYPE html>
<head>
    <title>Search results</title>
    <style>
        thead{
            background-color: black;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
}
    </style>
</head>
<h1 class="display-1 blockquote text-center">Search Results</h1>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM books
            WHERE (`book_title` LIKE '%".$query."%') OR (`book_author` LIKE '%".$query."%') ORDER BY `book_title`") or die(mysql_error());
        echo "<div class = 'container'>";
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following 
        echo "<table class = 'table'><h1>Search Results for:<strong>".$query."</strong></h1>";
        echo "<thead class = 'thead-light'> <tr> <th scope = 'col'></th><th scope ='col'><h3><i>Book</i></h3></th></tr></thead><tbody>";   
            while($results = mysql_fetch_array($raw_results)){
                echo "<tr><th scope ='row'></th><td>";
                echo "<a href = 'book.php?bookisbn='".$results['book_isbn'];            
                echo "<p><h3>".$results['book_title']."</h3>".$results['book_author']."</p>";
            echo "</td></tr>"; 
            }
            echo "</tbody></table>";
             
        }
        else{ // if there is no matching rows do following
            echo "<h1 style = 'padding-left: 50px;' class ='alert alert-danger display-1'> No Items Found</h1>";
        }
         
    }
    else{ // if query length is less than minimum
        echo "<div class ='container'>";
        echo "<h1 style = 'padding-left: 50px;' class ='alert alert-danger display-1'> No Results found,minimum length of Query is 3</h1>";
                echo "</br>";
        echo "<a href = 'books.php' class = 'btn btn-info'>Back to Catalogs</a>"; 
    }
    echo "</div>";
?>
</body>
</html>