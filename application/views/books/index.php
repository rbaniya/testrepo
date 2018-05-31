<?php foreach ($books as $books_item): ?>
 <h2><?php echo $books_item['author'] ?></h2>
 <div class="main">
 <?php echo $books_item['author'] ?>

 </div>
 <p><a href="books/view/<?php echo $books_item['isbn'] ?>">View book</a></p>
<?php endforeach ?>