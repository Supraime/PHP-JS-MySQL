<?php
  	require_once "include/session.php";
	if($_SESSION["login"] == "") {
		header("Location: /");
	}
	$sas="Администратор";
?>
<!DOCTYPE HTML>
<head>
      <? include_once 'links.php'; ?>
</head>

<body>
   <?php include_once 'header.php'; ?>

  <div class="content">
<?php
	if($_SESSION["status"] != "user")
	{
		echo '
	<h1 class="title">Панель Администратора</h1>
	<h2 class="main_cont">Пользователь: '. $_SESSION["login"] .'</h2>
	<a href="viborcat.php" class="title">Добавление рецепта</a>
    <a href="findrec.php" class="title">Редактирование рецепта</a>
	<a href="delrec.php" class="title">Удаление рецепта</a>
	<a href="trash.php" class="title">Мои рецепты</a>
	<a href="include/logout.php" class="title">Выход</a> ';
	}
	else
	{
		echo '
	<h1 class="title">Личный кабинет</h1>
	<h2 class="main_cont">Пользователь: '. $_SESSION["login"] .'</h2>
	<a href="viborcat.php" class="title">Добавление рецепта</a>
	<a href="trash.php" class="title">Мои рецепты</a>
	<a href="include/logout.php" class="title">Выход</a> ';
	}
?>
</div>
  <?php include_once 'footer.php'; ?>
</body>