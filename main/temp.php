<div class="col-sm-4">
            <div class="book_container">
              <div class="book_rank">
                <p style="color: white">Rank: 1</p>
                <form class="form_small" method="POST">
                  <input class="hidden" name="books" value="The Sworn Sword (The Tales of Dunk and Egg, #2)">
                  <input class="button_small" type="submit" name="book_similar" value="Similar Books">
                </form>
              </div>
            <div class="book_row">
              <div class="book_cover">
                <a target="_blank" href="https://www.goodreads.com/book/show/11985631-the-sworn-sword"><img border="0" src="https://images.gr-assets.com/books/1397654143m/11985631.jpg"></a>
              </div>
              <div class="book_info">
                <h4>The Sworn Sword (The Tales of Dunk and Egg, #2)</h4>
                <p>By: George R.R. Martin</p>
                <a data-toggle="tooltip" title="" data-placement="bottom" data-original-title="">Read Description</a>
              </div>
            </div>
          </div>
        </div>


"book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>"

<div class="book_container">
    <div class="book_rank">
        <p style="color: white">Rank: 1</p>
        <form class="form_small" method="POST">
            <input class="hidden" name="books" value="The Grand Design">
            <input class="button_small" type="submit" name="book_similar" value="Similar Books">
        </form>
    </div>
    <div class="book_row">
        <div class="book_cover">
            <a target="_blank" href="https://www.goodreads.com/book/show/8520362-the-grand-design"><img border="0" src="https://images.gr-assets.com/books/1320558363m/8520362.jpg"></a>
        </div>
        <div class="book_info">
            <h4>The Grand Design</h4>
            <p>By: Stephen Hawking</p>
            <a data-toggle="tooltip" title="" data-placement="bottom" data-original-title="THE">Read Description</a>
        </div>
    </div>
</div>

<div class="col-sm-4">
            <div class="book_container" style = "height: 33vh; margin: 20px; border-style: solid; border-color: #292c2f; border-width: 2px; border-radius: 5px; display: flex; flex-direction: column; align-content: center; align-items: center;">
            <div class="book_row" style = "height: 90%; width: 100%; padding: 5px; display: flex; flex-direction: row; justify-content: space-between;">
              <div class="book_cover" style = "display: inline-block; flex-basis: 100%; width: 50%; height: 100%;">
                <a target="_blank" href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>"><img border="0" src=<?php echo $query_row['book_image']; ?>></a>
              </div>
              <div class="book_info" style = "flex-basis: 100%; height: 100%; text-align: center; display: flex; flex-direction: column justify-content: center; align-content: center; align-items: center; font-size: 1.5vmin;">
                <h4 style = "margin: 0;"><?php echo $query_row['book_title']; ?></h4>
                <p style = "font-family :'Righteous'">By: <?php echo $query_row['book_author']; ?></p>
              </div>
            </div>
          </div>
        </div>