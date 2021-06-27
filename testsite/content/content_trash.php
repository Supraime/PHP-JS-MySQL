<div class="content">
	<h1>Мои рецепты</h1>
	<?
		// запрещаем вывод предупреждений
		error_reporting(0);
		include('connect_bd.php');
		require_once "include/session.php";
		$uselg = $_SESSION["login"];
		$ami = mysql_query("SELECT * FROM trash WHERE userlog='$uselg'"); 
		$num_ami = mysql_num_rows($ami);
		for ($i = 0; $i<$num_ami; $i++) {
			$rowami = mysql_fetch_array($ami);
			if($rowami["cat"] == "Горячие")
			{
			$result = mysql_query("SELECT * FROM hoteat WHERE id=".$rowami['getid']); 
			$row = mysql_fetch_array($result);
			echo '<a href="hot_full.php?id='. $row["id"].'"><div class="mus_close">
					<div><img class="mus_img" src="' . $row["photo"] . '"></div>
					<div style="padding-left: 10px;"><h2 class="mus_title">' . $row["title"] . '</h2><br /> 
					<p class="mus_description">' . $row["kr_descript"] . '</p></div>
				</div></a><br>';
				
			}
			else if($rowami["cat"] == "Холод")
			{
			$result = mysql_query("SELECT * FROM coldeat WHERE id=".$rowami['getid']); 
			$row = mysql_fetch_array($result);
			echo '<a href="cold_full.php?id='. $row["id"].'"><div class="mus_close">
					<div><img class="mus_img" src="' . $row["photo"] . '"></div>
					<div style="padding-left: 10px;"><h2 class="mus_title">' . $row["title"] . '</h2><br /> 
					<p class="mus_description">' . $row["kr_descript"] . '</p></div>
				</div></a><br>';
			}
			else if($rowami["cat"] == "Дес")
			{
			$result = mysql_query("SELECT * FROM desert WHERE id=".$rowami['getid']); 
			$row = mysql_fetch_array($result);
			echo '<a href="des_full.php?id='. $row["id"].'"><div class="mus_close">
					<div><img class="mus_img" src="' . $row["photo"] . '"></div>
					<div style="padding-left: 10px;"><h2 class="mus_title">' . $row["title"] . '</h2><br /> 
					<p class="mus_description">' . $row["kr_descript"] . '</p></div>
				</div></a><br>';
			}
		}
	?>
</div>