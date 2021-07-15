<?php

/* Connection to database */


$username = "";
$db_password = "fachmann573";
$email = "";
$errors = array();

// connect to database
$conn = mysqli_connect('localhost', 'root', $db_password, 'blog');

	/* Check connection */
	if(mysqli_connect_error()) {
		echo "Connection failed";
		printf("Error : %s",mysqli_connect_error());
	}

?>
