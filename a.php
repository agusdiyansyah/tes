<?php 
	$servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "portal";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// $sql  = ;
	$result = mysqli_query($conn, 'select * from kategori');
	(object) $row['data'] = mysqli_fetch_object($result);
	extract($row);
	echo $data->kategori;
	var_dump($row);
?>