<div class="content">
		<form name="search" method="post" action="poiskhot.php">
		<input type="search" name="query" placeholder="Поиск">
		<button type="submit">Найти</button> 
		</form>
	<?
		// запрещаем вывод предупреждений
		error_reporting(0);
		include('connect_bd.php');
		$text = $_POST['query'];
		$res = mysql_query("SELECT * FROM `coldeat` WHERE `title` LIKE '%$text%' OR `kr_descript` LIKE '%$text%'");
$ar = mysql_fetch_array($res);
if ($text == null)
{
	echo "<p>не введены данные для поиска</p>";
}
if ($text != null)

{
	if ($ar['id']== null){
		echo "<p>Поиск не дал результатов</p>";
	}
	else {
		echo "<p> Результаты поиска:</p>";
		$result = mysql_query("SELECT * FROM `coldeat` WHERE `title` LIKE '%$text%' OR `kr_descript` LIKE '%$text%'");
				$num_result = mysql_num_rows($result);
		for ($i = 0; $i<$num_result; $i++) {
			$row = mysql_fetch_array($result);
			echo '<a href="cold_full.php?id='. $row["id"].'"><div class="mus_close">
					<div><img class="mus_img" src="' . $row["photo"] . '"></div>
					<div style="padding-left: 10px;"><h2 class="mus_title">' . $row["title"] . '</h2><br /> 
					<p class="mus_description">' . $row["kr_descript"] . '</p></div>
				</div></a><br>';
		}
	}
}
	?>
</div>