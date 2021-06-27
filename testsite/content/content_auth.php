<?php

	require_once "include/session.php";
	require_once "include/msql.php";

	if($_SESSION["login"] != "") {
		header("Location: lk.php");
	}

	if(!empty($_POST))
		if( !db_connect() ) {
			
			$usr= htmlentities(mysqli_real_escape_string($conn,$_POST["login"]));
			$passwd = htmlentities(mysqli_real_escape_string($conn,$_POST["password"]));
			
			if (!empty($usr))
				if (!db_login($usr, $passwd)) {
						$ok = "Вы успешно авторизовались!!";
						$_SESSION["status"] = get_user_status($usr); //права пользователя
						$_SESSION["login"] = $usr; //сохраняем имя пользователя
						//var_dump(get_user_status($usr));
						header("Refresh: 2; url=lk.php");
						
				} else {
					$error = "Не правильный логин или пароль";
				}
			else 
				$error = "Логин не может быть пустым";
			
			// закрываем соединение
			db_close();			
		} else 
			$error = "Ошибка подключения";
	
?>
<div class="content">
<?php
		if(isset($error))
			echo <<<_OUT
					<div class="main_cont">$error</div>
				</div>
_OUT;
		else if(isset($ok))
			echo <<<_OUT
					<div class="main_cont">$ok</div>
				</div>
_OUT;
		?>
<div class="content">
	<h1 class="title">Личный Кабинет</h1>
			 <form class="main_cont" id="sign-up" method="POST">
   <legend>Авторизация</legend>
			<input id=log name="login" placeholder="Login" required>
			<input id=ps type="password" name="password" placeholder="Password" required>
			<input id=but type="submit" name="sign-up-submit" value="Вход">
	</form>
</div>