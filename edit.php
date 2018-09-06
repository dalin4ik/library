<?php     require_once '/functions/connect.php'; 
$id = $_GET['id'];
$result = mysqli_query($connection, "SELECT * FROM books
    INNER JOIN category on category.id_category = books.parent
    INNER JOIN author on author.id_author = books.id_author
    INNER JOIN type_ph on type_ph.id_type_ph = books.id_type_ph
    INNER JOIN publishing_house on publishing_house.id_publishing_house = books.id_publishing_house
    INNER JOIN city on city.id_city = books.id_city
    WHERE id_books='$id'

    ");

$row = mysqli_fetch_assoc($result);  

if(isset($_POST['save'])){
mysqli_query($connection, 
             "UPDATE
                    `books` 
             SET
                 `title` = '". $_POST['title'] ."',
                 `id_author` = '". $_POST['name_author'] ."',
                 `UDC_chipher` = '". $_POST['UDC_cipher'] ."',
                 `page` = '". $_POST['page'] ."',
                 `year` = '". $_POST['year'] ."',
                 `id_publishing_house` = '". $_POST['name_publishing_house'] ."',
                 `id_type_PH` = '". $_POST['name_type_ph'] ."',
                 `id_city` = '". $_POST['city'] ."',
                 `parent` = '". $_POST['name_category'] ."'
                 WHERE id_books='$id'

                 ");
?>
<h4><?php echo "Успех!";?></h4>
<?php } ?>
<?php 

if(isset($_POST['del'])){
mysqli_query($connection,
                "DELETE
                 FROM   books  
                 WHERE id_books='$id'
                 ");

?>
<h3><?php echo "Книга Удалена";?></h3>
<?php } ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Редактирование</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="pageAdd">
        <?php require_once "header.php";
          require_once "functions/functions.php"; ?>

<h2>Редактируем</h2>

<div class="tab-wrapper">
  
  <ul class="tab-menu">
  </ul>
  
  <div class="tab-content">
    <div>

<form method = "POST" action= "">

<div class="group">
            <label for="name"> Название книги: </label>
            <br><br>
                <input type="text" name="title" value="<?php  echo $row['title'];  ?>"/>
</div>

<div class="group">
            <label for="name">  УДК шифр: </label>
            <br><br>
                <input type="text" name="UDC_cipher" value="<?php  echo $row['UDC_chipher'];  ?>"/>
</div>

<div class="group">
            <label for="name"> Количество страниц: </label>
            <br><br>
                <input type="text" name="page" value="<?php  echo $row['page'];  ?>"/>
</div>

<div class="group">
            <label for="name"> Год: </label>
            <br><br>
                <input type="text" name="year" value="<?php  echo $row['year'];  ?>"/>
</div>

<div class="group">
<label for = "ph">Автор: </label>
<br><br>
<?php
    echo "<select name = 'name_author'>";
    $query = "SELECT * FROM author";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id_author']."'>".$row['name_author']."</option>";
    }
echo "</select>";
?>
</div>

<div class="group">
<label for = "city">Город: </label>
<br><br>
<?php
    echo "<select name = 'city'>";
    $query = "SELECT * FROM city";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id_city']."'>".$row['city']."</option>";
    }
echo "</select>";
?>
</div>

<div class="group">
<label for = "ph">Издательство: </label>
<br><br>
<?php
    echo "<select name = 'name_publishing_house'>";
    $query = "SELECT * FROM publishing_house";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id_publishing_house']."'>".$row['name_publishing_house']."</option>";
    }
echo "</select>";
?>
</div>

<div class="group">
<label for = "ph">Тип издательства: </label>
<br><br>
<?php
    echo "<select name = 'name_type_ph'>";
    $query = "SELECT * FROM type_ph";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id_type_ph']."'>".$row['name_type_ph']."</option>";
    }
echo "</select>";
?>
</div>

<div class="group">
<label for = "ph">Категория: </label>
<br><br>
<?php
    echo "<select name = 'name_category'>";
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id_category']."'>".$row['name_category']."</option>";
    }
echo "</select>";
?>
</div>

        <input type="submit" id="save" name="save" value="Сохранить" class="button buttonBlue">
<br><br>

        <input type="submit" id="del" name="del" value="Удалить книгу" class="button buttonBluedel">
        </form>
    </div>

  </div><!-- //tab-content -->
  
</div><!-- //tab-wrapper -->


    <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>








































<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>