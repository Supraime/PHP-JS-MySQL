<div class="content">
		<form name="search" method="post" action="poiskdes.php">
		<input type="search" name="query" placeholder="Поиск">
		<button type="submit">Найти</button> 
		</form>
	<?
		// запрещаем вывод предупреждений
		error_reporting(0);
		include('connect_bd.php');
		$result = mysql_query("SELECT * FROM desert"); 
		$num_result = mysql_num_rows($result);
		for ($i = 0; $i<$num_result; $i++) {
			$row = mysql_fetch_array($result);
			echo '<a href="des_full.php?id='. $row["id"].'"><div class="mus_close">
					<div><img class="mus_img" src="' . $row["photo"] . '"></div>
					<div style="padding-left: 10px;"><h2 class="mus_title">' . $row["title"] . '</h2><br /> 
					<p class="mus_description">' . $row["kr_descript"] . '</p></div>
				</div></a><br>';
		}
	?>
</div>