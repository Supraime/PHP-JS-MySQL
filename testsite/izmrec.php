<?php
  	require_once "include/session.php";
	if($_SESSION["login"] == "") {
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
	$ca = $_POST['category'];
	$id = $_SESSION["ider"];
		if($_SESSION["cater"] == "Cупы" || $_SESSION["cater"] == "Котлеты" || $_SESSION["cater"] == "Гарнир" || $_SESSION["cater"] == "Запеканки")
		{
			$query = "UPDATE hoteat SET title='$name', photo='$img', kr_descript='$dis', descript='$disfull', category='$ca' WHERE id='$id'";
		}
		else if($_SESSION["cater"] == "Салаты" || $_SESSION["cater"] == "Закуски" || $_SESSION["cater"] == "Роллы")
		{
			$query = "UPDATE coldeat SET title='$name', photo='$img', kr_descript='$dis', descript='$disfull', category='$ca' WHERE id='$id'";
		}
		else if($_SESSION["cater"] == "Торты" || $_SESSION["cater"] == "Конфеты" || $_SESSION["cater"] == "Мороженное" || $_SESSION["cater"] == "Пряники")
		{
			$query = "UPDATE desert SET title='$name', photo='$img', kr_descript='$dis', descript='$disfull', category='$ca' WHERE id='$id'";
		}
    $result = mysqli_query($conn, $query);
    if ($result == true){
    	echo "Информация занесена в базу данных";
		header("Refresh: 2; url=lk.php");
    }else{
    	echo "Информация не занесена в базу данных";
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
	  <div class="content">	
   <h1 class="title" id=dobtovar>Редактирование рецепта</h1>	
		<form id="product" class="add" method="POST">	
				<label><?php echo ' ' .$_SESSION['cater']. ' '?></label>
				<label><br>Новое название рецепта</label>
				<input class="title2" type="text" placeholder="Название" name="name" value="<?php echo '' .$_SESSION['titlemuz']. ''?>"maxlength="50" required>
				
				<label>Введите название изображения</label>
				<input class="title2" type="text" name="img" placeholder="Название изображения из Images" value="<?php echo ' ' .$_SESSION['photomuz']. ' '?>"maxlength="50" required>
				
				<label>Краткое описание</label>
				<textarea class="title2" placeholder="Краткое описание выдаваемое при поиске" name="description" required rows="4" style="resize: none;" maxlength="255"><?php echo ' ' .$_SESSION['kr_descriptmuz']. ' '?></textarea>
				
				<label>Полное описание</label>
				<textarea class="title2" placeholder="Полное описание" name="descriptionfull" required rows="4" style="resize: none;" maxlength="255"><?php echo ' ' .$_SESSION['descriptmuz']. ' '?></textarea>
				
				<label>Выберите категорию</label>
<?php
				if($_SESSION["cater"] == "Супы" || $_SESSION["cater"] == "Котлеты" || $_SESSION["cater"] == "Гарнир" || $_SESSION["cater"] == "Запеканки")
				{
					echo '
					<select class="title2" name="category">
						<option value="Супы" '; if($_SESSION["cater"] == "Супы") { echo ' selected '; } echo '>Супы</option>
						<option value="Котлеты" '; if($_SESSION["cater"] == "Котлеты") { echo ' selected '; } echo '>Котлеты</option>
						<option value="Гарнир" '; if($_SESSION["cater"] == "Гарнир") { echo ' selected '; } echo '>Гарнир</option>
						<option value="Запеканки" '; if($_SESSION["cater"] == "Запеканки") { echo ' selected '; } echo '>Запеканки</option>
					</select> ';
				}
				else if($_SESSION["cater"] == "Салаты" || $_SESSION["cater"] == "Закуски" || $_SESSION["cater"] == "Роллы")
				{
					echo '
					<select class="title2" name="category">
						<option value="Салаты" '; if($_SESSION["cater"] == "Салаты") { echo 'selected '; }  echo '>Салаты</option>
						<option value="Закуски" '; if($_SESSION["cater"] == "Закуски") { echo 'selected '; }  echo '>Закуски</option>
						<option value="Роллы" '; if($_SESSION["cater"] == "Роллы") { echo 'selected '; }  echo '>Роллы</option>
					</select> ';
				}
				else if($_SESSION["cater"] == "Торты" || $_SESSION["cater"] == "Конфеты" || $_SESSION["cater"] == "Мороженное" || $_SESSION["cater"] == "Пряники")
				{
					echo '
					<select class="title2" name="category">
						<option value="Торты" '; if($_SESSION["cater"] == "Торты") { echo 'selected '; }  echo '>Торты</option>
						<option value="Конфеты" '; if($_SESSION["cater"] == "Конфеты") { echo 'selected '; }  echo '>Конфеты</option>
						<option value="Мороженное"'; if($_SESSION["cater"] == "Мороженное") { echo 'selected '; }  echo '>Мороженное</option>
						<option value="Пряники" '; if($_SESSION["cater"] == "Пряники") { echo 'selected '; }  echo '>Пряники</option>
					</select> ';
				}
				else {
										echo '
					<select class="title2" name="category">
						<option value="Торты" selected>afd</option>
					</select> ';
				}
?>
			<input type="submit" name="product" value="Записать в БД">	
		</form>	
	    <a href="lk.php" class="title">Назад</a>
	</div>
	  <?php include_once 'footer.php'; ?>
</body>