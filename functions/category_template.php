<li>
	<a href="?category=<?=$category['id_category']?>"><?=$category['name_category']?></a>
	<?php if($category['childs']): ?>
	<ul>
		<?php echo categories_to_string($category['childs']); ?>
	</ul>
	<?php endif; ?>
</li>