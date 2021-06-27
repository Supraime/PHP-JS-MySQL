<?php
  	require_once "include/session.php";
	if($_SESSION["login"] == "" || $_SESSION["vibor"] == "") {
		header("Location: /");
	}
	require_once "include/msql.php";
	
	db_connect();

	/*if(!empty($_POST)) 
		if(isset($_POST["product"])) {
		
			// экранируем всё лишнее
			$name = htmlentities(mysqli_real_escape_string($conn,$_POST["name"]));
			$description = htmlentities(mysqli_real_escape_string($conn,$_POST["description"]));
			$descriptionfull = htmlentities(mysqli_real_escape_string($conn,$_POST["descriptionfull"]));
			$img = htmlentities(mysqli_real_escape_string($conn,$_POST["img"]));
			add_product($name, $description, $img, $descriptionfull);
		}*/
	if (isset($_POST["product"])){

    // Переменные с формы
    $name = $_POST['name'];
    $img = "images/".$_POST['img'];
	$dis = $_POST['description'];
    $disfull = $_POST['descriptionfull'];
	$categ = $_POST['category'];
    if($_SESSION["vibor"] == "Горячие блюда")
	{
		$query = "INSERT INTO hoteat (photo,title,kr_descript,descript,category) VALUES ('$img','$name','$dis','$disfull','$categ')";
	}
	else if($_SESSION["vibor"] == "Холодные блюда")
	{
		$query = "INSERT INTO coldeat (photo,title,kr_descript,descript,category) VALUES ('$img','$name','$dis','$disfull','$categ')";
	}
	else if($_SESSION["vibor"] == "Десерты")
	{
		$query = "INSERT INTO desert (photo,title,kr_descript,descript,category) VALUES ('$img','$name','$dis','$disfull','$categ')";
	}
    $result = mysqli_query($conn, $query);
    if ($result == true){
    	$oket= "Информация занесена в базу данных";
    }else{
    	$oket= "Информация не занесена в базу данных";
    }
}

	db_close();
?>
<!DOCTYPE HTML>
<head>
      <? include_once 'links.php'; ?>
	  <!--<script src="js/add.js"></script>-->
</head>

<body>
	<?php include_once 'header.php'; ?>
<?php
		if(isset($oket))
			echo <<<_OUT
					<div class="main_cont">$oket</div>
				</div>
_OUT;
		?>
	  <div class="content">	
   <h1 class="title" id=dobtovar>Добавление рецепта</h1>	
		<form id="product" class="add" method="POST">	
				<label>Название рецепта</label>
				<input class="title2" type="text" placeholder="Название" name="name" maxlength="50" required>
				
				<label>Введите название изображения</label>
				<input class="title2" type="text" name="img" placeholder="Название изображения из Images" maxlength="50" required>
				
				<label>Краткое описание</label>
				<textarea class="title2" placeholder="Краткое описание выдаваемое при поиске" name="description" required rows="4" style="resize: none;" maxlength="255"></textarea>
				
				<label>Полное описание</label>
				<textarea class="title2" placeholder="Полное описание" name="descriptionfull" required rows="4" style="resize: none;" maxlength="255"></textarea>
				
				<label>Выберите категорию</label>
<?php
				if($_SESSION["vibor"] == "Горячие блюда")
				{
					echo '
					<select class="title2" name="category">
						<option value="Супы" selected>Супы</option>
						<option value="Котлеты">Котлеты</option>
						<option value="Гарнир">Гарнир</option>
						<option value="Запеканки">Запеканки</option>
					</select> ';
				}
				else if($_SESSION["vibor"] == "Холодные блюда")
				{
					echo '
					<select class="title2" name="category">
						<option value="Салаты" selected>Салаты</option>
						<option value="Закуски">Закуски</option>
						<option value="Роллы">Роллы</option>
					</select> ';
				}
				else if($_SESSION["vibor"] == "Десерты")
				{
					echo '
					<select class="title2" name="category">
						<option value="Торты" selected>Торты</option>
						<option value="Конфеты">Конфеты</option>
						<option value="Мороженное">Мороженное</option>
						<option value="Пряники">Пряники</option>
					</select> ';
				}
?>
			<input type="submit" name="product" value="Записать в БД">	
		</form>	
	    <a href="lk.php" class="title">Назад</a>
	</div>
	  <?php include_once 'footer.php'; ?>
</body>