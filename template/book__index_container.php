<div class="col-sm-3">
            <div class="book_container" style = "height: 33vh; margin: 20px; border-style: solid; border-color: #292c2f; border-width: 2px; border-radius: 5px; display: flex; flex-direction: column; align-content: center; align-items: center;">
              <div class="book_rank" style = "height: 10%; width: 100%; padding-left: 10px; background-color: #292c2f; display: flex;flex-direction: row; justify-content: space-between; align-content: center; align-items: center; font-size: 1.5vh;">
                <p style="color: white"></p>
                <form class="form_small" method="POST">
                  <input class="hidden" name="books" value="The Grand Design">
                  <input class="button_small" type="submit" name="book_similar" value="Similar Books">
                </form>
              </div>
            <div class="book_row" style = "height: 90%; width: 100%; padding: 5px; display: flex; flex-direction: row; justify-content: space-between;">
              <div class="book_cover" style = "display: inline-block; flex-basis: 100%; width: 50%; height: 100%;">
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>"><img border="0" src=<?php echo $query_row['book_image']; ?>></a>
              </div>
              <div class="book_info" style = "flex-basis: 100%; height: 100%; text-align: center; display: flex; flex-direction: column justify-content: center; align-content: center; align-items: center; font-size: 1.5vmin;">
                <h4 style = "margin: 0;"><?php echo $query_row['book_title']; ?></h4>
                <p style = "font-family :'Righteous'">By: <?php echo $query_row['book_author']; ?></p>
              </div>
            </div>
          </div>
        </div>