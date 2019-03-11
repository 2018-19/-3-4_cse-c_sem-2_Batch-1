<?php

	$dbHost = "localhost";

	$dbpass = "";

	$dbusr = "root";

	$conn = new mysqli($dbHost, $dbusr, $dbpass);

	$sql= "CREATE DATABASE project";

	$conn->query($sql);

?>