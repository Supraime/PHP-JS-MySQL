<?php
  	require_once "include/session.php";
	if($_SESSION["login"] == "" || $_SESSION["getid"] == "") {
		header("Location: /");
	}
	require_once "include/msql.php";
	
	db_connect();
	$getid = $_SESSION["getid"];
	$log = $_SESSION["login"];
	$sad = $_SESSION["catersd"];
    $query = "INSERT INTO trash (getid,userlog,cat) VALUES ('$getid','$log', '$sad')";
    $result = mysqli_query($conn, $query);
	header("Location: trash.php");

	db_close();
?>