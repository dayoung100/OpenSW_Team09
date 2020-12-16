<?php

// Connexion à la base de données
require_once('connect.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2]) && isset($_POST['Event'][3])){


	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];
	$type = $_POST['Event'][3];

	if($type == '#0071c5'){
		$sql = "UPDATE diary SET  start = '$start', end = '$end' WHERE id = $id ";
	}

	else if($type == '#008000'){
		$sql = "UPDATE todolist SET  start = '$start', end = '$end' WHERE id = $id ";
	}

	else if($type == '#FFD700'){
			$sql = "UPDATE account SET  start = '$start', end = '$end' WHERE id = $id ";
	}

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);


?>
