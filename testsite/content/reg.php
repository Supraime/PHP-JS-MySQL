<?php 
  	require_once "include/session.php";
	if($_SESSION["login"] != "") {
		header("Location: /");
	}
  require_once "include/msql.php";
  
  if(!empty($_POST)) {
		if( !db_connect() ) {
			
			$user = htmlentities(mysqli_real_escape_string($conn, $_POST["login"]));
			$password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));
			$repeatpassword = htmlentities(mysqli_real_escape_string($conn, $_POST["repeatpassword"]));
			
			if (!empty($user))
				if (!db_check_usr($user))
					if (strcmp($password, $repeatpassword) === 0)
						if(!empty($password) || !empty($repeatpassword)){
							
							add_usr($user, $password);
							
							header("Refresh: 1; url=auth.php");
							
						} else
							$error = "Пароль не может быть пустым";
					else
						$error = "Пароли не совпадают";
				else 
					$error = "Пользователь с таким именем уже существует";
			else
				$error = "Логин не может быть пустым";
			
			db_close();
			$ok = "Вы зарегистрировались";
		} else 
			$error = "Ошибка подключения";
	}
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
		<h1 class="title">Регистрация</h1>
   		<form class="main_cont" id="reg" method="post">
				
				<input id=emal name="login" placeholder="Введите ваш e-mail" required><br>
				<input id=passwd type="password" name="password" placeholder="Придумайте пароль" required><br>
				<input id=repp type="password" name="repeatpassword" placeholder="Повоорите пароль" required><br>
				<input id=but2 type="submit" value="Зарегестрироваться">
		</form>
</div>