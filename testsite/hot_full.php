<?php
  	require_once "include/session.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Горячие блюда</title>
		<? include 'links.php'; ?>
	</head>
	<body>
	
	<?
		/*Здесь находятся логотип и меню сайта*/
		include_once 'header.php';
		/*Здесь находятся контент*/
		echo '<div class="content_f">';
		$bd = mysqli_connect("localhost", "root", "", "recepti");
		$id = $_GET['id'];
		$_SESSION["getid"]=$id;
		$_SESSION["catersd"]="Горячие";
		$result = mysqli_query($bd, "SELECT * FROM hoteat WHERE id=$id") or die(mysql_error());
		$num_result = mysqli_num_rows($result);
		for ($i = 0; $i<$num_result; $i++) {
		$row = mysqli_fetch_array($result);
				echo '<div class="slider">
						<div class="item">
						<a name="' . $row["name"] . '"><img src="' . $row["photo"] . '"></a>
						<div class="slideText">' . $row["title"] . '</div>
						</div>
						</div>
						<div style="padding: 30px 140px 0 140px;"><p class="mus_description">' . $row["descript"] . '</p></div>
		<br>';}
		if($_SESSION["login"] != "")
		{
			echo '<a class="butmen" href="dobmyre.php">В мои рецепты</a>';
		}
		echo '</div>';
		/*Здесь находятся футер*/
		echo '<div class="pre__footer">
				<div class="footer">
				<p>Сайт разработан в учебных целях. Выполнил студент группы ПС-16 Воронов Даниил.</p>
				</div>
			</div>';
	?>
	
	</body>
</html>