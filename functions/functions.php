<?php

/**
* Распечатка массива
**/
function print_arr($array){
	echo "<pre>" . print_r($array, true) . "</pre>";
}

/**
* Получение массива категорий
**/
function get_cat(){
	global $connection;
	$query = "SELECT * FROM category";
	$res = mysqli_query($connection, $query);

	$arr_cat = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr_cat[$row['id_category']] = $row;
	}
	return $arr_cat;
}

/**
* Построение дерева
**/
function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id_category=>&$node) {    
		if (!$node['parent']){
			$tree[$id_category] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id_category] = &$node;
		}
	}

	return $tree;
}

/**
* Дерево в строку HTML
**/
function categories_to_string($data){
	foreach($data as $item){
		$string .= categories_to_template($item);
	}
	return $string;
}

/**
* Шаблон вывода категорий
**/
function categories_to_template($category){
	ob_start();
	include '/functions/category_template.php';
	return ob_get_clean();
}

/**
* Хлебные крошки
**/
function breadcrumbs($array, $id_category){
	if(!$id_category) return false;

	$count = count($array);
	$breadcrumbs_array = array();
	for($i = 0; $i < $count; $i++){
		if($array[$id_category]){
			$breadcrumbs_array[$array[$id_category]['id_category']] = $array[$id_category]['name_category'];
			$id_category = $array[$id_category]['parent'];
		}else break;
	}
	return array_reverse($breadcrumbs_array, true);
}

/**
* Получение ID дочерних категорий
**/
function cats_id($array, $id_category){
	if(!$id_category) return false;

	foreach($array as $item){
		if($item['parent'] == $id_category){
			$data .= $item['id_category'] . ",";
			$data .= cats_id($array, $item['id_category']);
		}
	}
	return $data;
}

/**
* Получение товаров
**/
function get_books($ids = false){
	global $connection;
	if($ids){
	
		$query = "SELECT * FROM books
			INNER JOIN author on author.id_author = books.id_author
			INNER JOIN type_ph on type_ph.id_type_ph = books.id_type_ph
		    INNER JOIN publishing_house on publishing_house.id_publishing_house = books.id_publishing_house
		    INNER JOIN city on city.id_city = books.id_city
	WHERE parent IN($ids) ORDER BY title";
	}else{
		$query = "SELECT * FROM books
	INNER JOIN category on category.id_category = books.parent
    INNER JOIN author on author.id_author = books.id_author
	INNER JOIN type_ph on type_ph.id_type_ph = books.id_type_ph
    INNER JOIN publishing_house on publishing_house.id_publishing_house = books.id_publishing_house
    INNER JOIN city on city.id_city = books.id_city
    ORDER BY title";
	}
	$res = mysqli_query($connection, $query);
	$books = array();
		while($row = mysqli_fetch_assoc($res)){
		$bookss[] = $row;
	}
	return $bookss;
}