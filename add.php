<?php     require_once 'functions/connect.php';

if(isset($_POST['submit'])){
mysqli_query($connection, 
            "INSERT INTO
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
                 "
             );
?>
<h4><?php echo "Книга добавлена";?></h4>
<?php } ?>
<?php 
if(isset($_POST['send'])){
mysqli_query($connection, 
            "INSERT INTO
                    `author` 
             SET
                 `name_author` = '". $_POST['Author'] ."'
                 "
             );
?>
<h4><?php echo "Добавили автора";?></h4>
<?php } ?>
<?php 

if(isset($_POST['send_ph'])){
mysqli_query($connection, 
            "INSERT INTO
                    `publishing_house` 
             SET
                 `name_publishing_house` = '". $_POST['publishing_house'] ."'
                 "
             );
?>
<h4><?php echo "Добавили издательство";?></h4>
<?php } ?>
<?php 

if(isset($_POST['send_c'])){
mysqli_query($connection, 
            "INSERT INTO
                    `city` 
             SET
                 `city` = '". $_POST['city'] ."'
                 "
             );
?>
<h4><?php echo "Добавлен город";?></h4>
<?php } ?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Добавление книги</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="pageAdd">
        <?php require_once "header.php";
          require_once "functions/functions.php"; ?>

<h2>Добавляем</h2>
<div class="tab-wrapper">
  
  <ul class="tab-menu">
    <li class="active">Книгу</li>
    <li>Автора</li>
    <li>Издательство</li>
    <li>Город</li>
  </ul>
  
  <div class="tab-content">
    <div>

<form method = "POST" action= "">
      <div class="group">
                <input type="text" name="title" placeholder="Введите название книги"/><span class="highlight"></span><span class="bar"></span>
    </div>
<div class="group">
<label>Автор: </label>
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
            <label for="name">  УДК шифр: </label>
                <input type="text" name="UDC_cipher" placeholder=""/>
                <span class="highlight"></span><span class="bar"></span>
</div>
<div class="group">
            <label for="name"> Количество страниц: </label>
                <input type="text" name="page" placeholder=""/>
                <span class="highlight"></span><span class="bar"></span>
</div>
<div class="group">
            <label for="name"> Год: </label>

                <input type="text" name="year" placeholder=""/>
                <span class="highlight"></span><span class="bar"></span>
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

        <input type="submit" id="submit" name="submit" value="Добавить" class="button buttonBlue">


        </form>
    </div>




    <div>
        <form method = "POST" action= "" class="frm">
 <div class="group">
                <label for="name"> ФИО Автора: </label>
                <br><br>
                <input type="text" name="Author" placeholder=""/>
                 <span class="highlight"></span><span class="bar"></span>
</div>
        <input type="submit" id="send" name="send" value="Добавить" class="button buttonBlue">

        </form>
    </div>

    <div>
        <form method = "POST" action= "">
 <div class="group">
                <label for="name"> Наименование издательства: </label>
                <br><br>
                <input type="text" name="publishing_house" placeholder=""/>
                <span class="highlight"></span><span class="bar"></span>
    </div>
        <input type="submit" id="send_ph" name="send_ph" value="Добавить" class="button buttonBlue">

        </form>        
     </div>
    <div>
        <form method = "POST" action= "">
 <div class="group">
                <label for="name"> Город: </label>
                <br><br>
                <input type="text" name="city" placeholder=""/>
                <span class="highlight"></span><span class="bar"></span>
</div>
        <input type="submit" id="send_c" name="send_c" value="Добавить" class="button buttonBlue">

        </form>        
    </div>
  </div><!-- //tab-content -->
  
</div><!-- //tab-wrapper -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>








































<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>