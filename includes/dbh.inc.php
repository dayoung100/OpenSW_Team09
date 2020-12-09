<?php

$servername = "localhost";
$dBUsername = "team09";
$dBPassword = "team09";
$dBName = "team09";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn){
	die("Connection failed: ".mysqli_connect_error());
}