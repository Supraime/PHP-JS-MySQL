<?php
  	require_once "include/session.php";
?>

<!DOCTYPE html>
<div class="header">
	<div class="menu">
		<ul id="menu" class="menu">
			<li><a href="index.php">Главная</a></li>
			<li><a href="hoteat.php">Горячие блюда</a>
			<ul class="submenu">
			<li><a href="hotcat.php?ca='Супы'">Супы</a></li>
			<li><a href="hotcat.php?ca='Котлеты'">Котлеты</a></li>
			<li><a href="hotcat.php?ca='Гарнир'">Гарнир</a></li>
			<li><a href="hotcat.php?ca='Запеканки'">Запеканки</a></li>
			</ul>
			</li>
			<li><a href="coldeat.php">Холодные блюда</a>
			<ul class="submenu">
			<li><a href="coldcat.php?ca='Салаты'">Салаты</a></li>
			<li><a href="coldcat.php?ca='Закуски'">Закуски</a></li>
			<li><a href="coldcat.php?ca='Роллы'">Роллы</a></li>
			</ul>
			</li>
			<li><a href="deserts.php">Десерты</a>
			<ul class="submenu">
			<li><a href="desertcat.php?ca='Торты'">Торты</a></li>
			<li><a href="desertcat.php?ca='Конфеты'">Конфеты</a></li>
			<li><a href="desertcat.php?ca='Мороженное'">Мороженное</a></li>
			<li><a href="desertcat.php?ca='Пряники'">Пряники</a></li>
			</ul>
			</li>
<?php
			if($_SESSION["login"] != "")
			{
				echo '
					<li><a href="lk.php">Личный кабинет</a></li>
					<li><a href="include/logout.php">Выход</a></li> ';
			}
			else
			{
				echo '
					<li><a href="auth.php">Вход</a></li>
					<li><a href="registr.php">Регистрация</a></li> ';
			}
			?>
		</ul>
	</div>
</div>