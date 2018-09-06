<?php require_once 'config.php';
	  require_once 'header.php';
	  require_once '/functions/connect.php'; 
      require_once '/functions/functions.php';
      require_once 'catalog.php'


?>

<div id="leftCol">
			<h1>Книги:</h1>
		<div class="ul-menu">
			<ul class="category">
					<?php echo $categories_menu ?>
				 
				
			</ul>
		</div>
		</div>
<article>
			<p><?=$breadcrumbs;?></p>
			<br>
			<hr>
<?php 
if($bookss):
	foreach($bookss as $books):
	?>
	<div class="object">
		<div class="circle"><span class="title"><?php  echo $books['title']  ?></span></div>

 <p class="object_string"><span class="oblique">Автор:</span><?php echo $books['name_author'] ?></p>
 <p class="object_string"><span class="oblique">Шифр по УДК: </span><?php echo $books['UDC_chipher'] ?></p>
 <p class="object_string"><span class="oblique">Страниц: </span><?php echo $books['page'] ?></p>
 <p class="object_string"><span class="oblique">Год: </span><?php echo $books['year'] ?></p>
 <p class="object_string"><span class="oblique">Город: </span> <?php echo $books['city'] ?></p>
 <p class="object_string"><span class="oblique">Издательство: </span><?php echo $books['name_publishing_house'] ?></p>
 <p class="object_string"><span class="oblique">Вид издательства: </span><?php echo $books['name_type_ph'] ?></p>
 <p class="object_string"><span class="oblique">Категория: </span><?php echo $books['name_category'] ?></p>

 <p class="object_string"><span class="oblique"><a href="edit.php?id=<?php  echo $books['id_books']  ?>"><h5 align="center" class="grow"><a href="edit.php?id=<?php  echo $books['id_books']  ?>"><img src="/img/edit.png" width="42" 
  height="42"</a></h5></a></span></p>
 </div>
<?php  
	endforeach;
		 else: ?>
				<p>В данном разделе книги отсутствуют!</p>
	<?php endif; ?>
</article>
		
</footer>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.accordion.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function(){
			$(".category").dcAccordion();
		});
	</script>
</body>