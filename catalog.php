<?php
$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = categories_to_string($categories_tree);

if(isset($_GET['category'])){
	$id_category = (int)$_GET['category'];
	// хлебные крошки
	// return true (array not empty) || return false
	$breadcrumbs_array = breadcrumbs($categories, $id_category);
	
	if($breadcrumbs_array){
		$breadcrumbs = "<a href='/'>Главная</a> / ";
		foreach($breadcrumbs_array as $id_category => $name_category){
			$breadcrumbs .= "<a href='?category={$id_category}'>{$name_category}</a> / ";
		}
		$breadcrumbs = rtrim($breadcrumbs, " / ");
		$breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
	}else{
		$breadcrumbs = "<a href='library'>Главная</a> / Каталог";
	}

	// ID дочерних категорий
	$ids = cats_id($categories, $id_category);
	$ids = !$ids ? $id_category : rtrim($ids, ",");

	if($ids) $bookss = get_books($ids);
		else $bookss = null;

}else{
	$bookss = get_books();
}

?>