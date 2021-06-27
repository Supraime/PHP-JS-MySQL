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
    $name = $_POST['id'];
	$ca = $_POST['category'];
	if($ca == "Горячие блюда")
	{
		$sql = "SELECT * FROM hoteat WHERE title='$name'";
	}
	else if($ca == "Холодные блюда")
	{
		$sql = "SELECT * FROM coldeat WHERE title='$name'";
	}
	else if($ca == "Десерты")
	{
		$sql = "SELECT * FROM desert WHERE title='$name'";
	}
	$result = mysqli_query($conn, $sql);
	$arr = mysqli_fetch_assoc($result);
	$_SESSION['titlemuz'] = $arr['title'];
	$_SESSION['kr_descriptmuz'] = $arr['kr_descript']; 	
	$_SESSION['descriptmuz'] = $arr['descript']; 	
	$_SESSION['photomuz'] = $arr['photo']; 	
	$_SESSION['cater'] = $arr['category']; 	
	$_SESSION['ider'] = $arr['id']; 
	
	if($_SESSION['titlemuz'] != "")
	{
		header("Location: izmrec.php");
	}
	else
	{
		$er = "Рецепт не обнаружен ".$arr['title'];
		
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
		if(isset($er))
			echo <<<_OUT
					<div class="main_cont">$er</div>
				</div>
_OUT;
		?>
	  <div class="content">	
   <h1 class="title" id=dobtovar>Редактирование рецептов</h1>	
		<form id="product" class="add" method="POST">	
				<label>Выберите категорию</label>
				<select class="title2" name="category">
					<option value="Горячие блюда" selected>Горячие блюда</option>
					<option value="Холодные блюда">Холодные блюда</option>
					<option value="Десерты">Десерты</option>
				</select>
				<label>Введите название рецепта</label>
				<input class="title2" type="text" placeholder="название" name="id" maxlength="50" required>
			<input type="submit" name="product" value="Найти">	
		</form>	
	    <a href="lk.php" class="title">Назад</a>
	</div>
	  <?php include_once 'footer.php'; ?>
</body>