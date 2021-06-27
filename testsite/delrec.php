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
	$ca = $_POST['category'];
	if($ca == "Горячие блюда")
	{
		$query = "DELETE FROM hoteat WHERE title='$name'";
	}
	else if($ca == "Холодные блюда")
	{
		$query = "DELETE FROM coldeat WHERE title='$name'";
	}
	else if($ca == "Десерты")
	{
		$query = "DELETE FROM desert WHERE title='$name'";
	}
    $result = mysqli_query($conn, $query);
    if ($result == true){
    	$asd = "Удаление прошло успешно";
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
<?php
		if(isset($asd))
			echo <<<_OUT
					<div class="main_cont">$asd</div>
				</div>
_OUT;
?>
	  <div class="content">	
   <h1 class="title" id=dobtovar>Удаление рецепта</h1>	
		<form id="product" class="add" method="POST">	
				<label>Выберите категорию</label>
				<select class="title2" name="category">
					<option value="Горячие блюда" selected>Горячие блюда</option>
					<option value="Холодные блюда">Холодные блюда</option>
					<option value="Десерты">Десерты</option>
				</select>
				<label>Название рецепта</label>
				<input class="title2" type="text" placeholder="Название" name="name" maxlength="50" required>
			<input type="submit" name="product" value="Удалить">	
		</form>	
	    <a href="lk.php" class="title">Назад</a>
	</div>
	  <?php include_once 'footer.php'; ?>
</body>