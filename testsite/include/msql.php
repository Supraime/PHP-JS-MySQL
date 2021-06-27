<?php 
    $host = "localhost";
	$login = "root";
	$password = "";
	$db = "recepti";
	
	$conn = false;
		
	function db_connect($host = "localhost", $login = "root", $password = "", $db = "recepti") {
	global $conn;
	$err = false;
		
	$conn = @mysqli_connect($host, $login, $password, $db);
	if($conn) 
		return $err; 
	else {
			//echo mysqli_connect_errno() . " - " . mysqli_connect_error();
		return $err = true; 
	}
	}
	
		function db_close() {
		@mysqli_close($GLOBALS["conn"]);
	}
	
	function add_usr($login, $password, $status = "user") {
	global $conn;
	$salt = get_salt();
	$password = hash("sha256", $password . $salt);
		
	$query = "INSERT INTO user VALUES(NULL, '$login', '$password', '$salt', '$status')";
	mysqli_query($conn, $query);
	}
	
	function db_check_usr($login) {
	global $conn;
	$query = "SELECT * FROM user WHERE login = '$login'";
		
	$result = mysqli_query($conn, $query);
		
	return mysqli_num_rows($result) != 0; 
	}
	
	function get_salt() {
		return md5(uniqid() . time . mt_rand());
	}
	function rowSet($result) {
		$fetchArray = array();
		
		while($row = mysqli_fetch_assoc($result))
			array_push($fetchArray, $row);
		
		return $fetchArray;
	}
	function db_login($login, $password) {
	global $conn;
	$query = "SELECT * FROM user WHERE login = '$login'";
		
	$result = mysqli_query($conn, $query);
	if( mysqli_num_rows($result) != 0 ) {
		
		$row = mysqli_fetch_assoc($result);
		$password = hash("sha256", $password . $row["salt"]);
			
		return strcmp($password, $row["password"]);
		} else
			return TRUE;
	}
	
	function get_user_status($login) {
	global $conn;
	$query = "SELECT status FROM user WHERE login = '$login'";
		
	//var_dump($query);
		
	$result = mysqli_query($conn, $query);
	if( mysqli_num_rows($result) != 0 ) {
		
		$row = mysqli_fetch_assoc($result);
		$st = $row["status"];
			
	}
	return $st;
	}
	
	function add_product($name, $description, $img, $descriptionfull) {
	global $conn;
	$query = "INSERT INTO museums VALUES('$img', '$name', '$description', $descriptionfull)";
		
	var_dump($query);
	
	mysqli_query($conn, $query);
	}
	
	function db_delete_product($id) {
	global $conn;
	$query = "DELETE FROM product WHERE id=$id";
		
	//var_dump($query);
		
	mysqli_query($conn, $query);
		
	}
	
	
	function db_select($table = "", $where = "") {
	global $conn;
	$table = $table == "" ? "product" : $table;
	$where = $where == "" ? "" : " WHERE $where";
	$query = "SELECT * FROM $table $where"; 
		
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
			return rowSet($result);
	}
	
	function get_product($id = ""){
		global $conn;
		$query = $id === "" ? "SELECT * FROM product" : "SELECT * FROM product WHERE id = $id";

		//var_dump($query);
		
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		return rowSet($result);
	}
	
	function db_update_product($id, $category, $img, $name, $description, $property, $price) {
		global $conn;
		$query = "UPDATE product SET name='$name', description='$description', property='$property', price='$price', category='$category', img='$img' WHERE id=$id";
		
		//var_dump($query);
		
		mysqli_query($conn, $query);
	}
?>