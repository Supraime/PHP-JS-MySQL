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
	$_SESSION["vibor"] = $_POST["category"];
	header("Location: dobrecept.php");
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
   <h1 class="title" id=dobtovar>Добавление рецепта</h1>	
		<form id="product" class="add" method="POST">	
				<label>Выберите категорию</label>
				<select name="category">
					<option value="Горячие блюда" selected>Горячие блюда</option>
					<option value="Холодные блюда">Холодные блюда</option>
					<option value="Десерты">Десерты</option>
				</select>
			<input type="submit" name="product" value="Продолжить">	
		</form>	
	    <a href="lk.php" class="title">Назад</a>
	</div>
	  <?php include_once 'footer.php'; ?>
</body>