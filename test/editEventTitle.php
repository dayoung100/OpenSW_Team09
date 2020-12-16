<?php

require_once('connect.php');

if (isset($_POST['delete']) && isset($_POST['type']) && isset($_POST['id'])){


	$id = $_POST['id'];
	$type =$_POST['type'];

	if($type == '#0071c5'){
		$sql = "DELETE FROM diary WHERE id = '$id'";
	}

	else if($type == '#008000'){
		$sql = "DELETE FROM todolist WHERE id = '$id'";
	}

	else{
		$sql = "DELETE FROM account WHERE id = '$id'";
	}

	$query = $bdd->prepare($sql);
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}

}
elseif (isset($_POST['title']) && isset($_POST['type']) && isset($_POST['content']) && isset($_POST['id'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$content = $_POST['content'];

	if($type == '#0071c5'){
		$sql = "UPDATE diary SET  title = '$title', content = '$content' WHERE id = '$id'";
	}

	else if($type == '#008000'){
		$sql = "UPDATE todolist SET  title = '$title', content = '$content' WHERE id = '$id'";
	}

	else if($type == '#FFD700'){
		$sql = "UPDATE account SET  title = '$title', content = '$content' WHERE id = '$id'";
	}

	echo $sql;

	$query = $bdd->prepare($sql);

	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}

}

// elseif (isset($_POST['title']) && isset($_POST['type']) && isset($_POST['content']) && isset($_POST['id']) && isset($_POST['start']) && isset($_POST['end'])){

// 	$id = $_POST['id'];
// 	$title = $_POST['title'];
// 	$type = $_POST['type'];
// 	$content = $_POST['content'];
// 	$start = $_POST['start'];
// 	$start = $_POST['end'];

// 	if($type == '#0071c5'){
// 		$sql = "UPDATE diary SET  title = '$title', content = '$content', start = '$start', end='$end' WHERE id = '$id'";
// 	}

// 	else if($type == '#008000'){
// 		$sql = "UPDATE todolist SET  title = '$title', content = '$content', start = '$start', end='$end' WHERE id = '$id'";
// 	}

// 	else if($type == '#FFD700'){
// 		$sql = "UPDATE account SET  title = '$title', content = '$content', start = '$start', end='$end' WHERE id = '$id'";
// 	}

// 	echo $sql;

// 	$query = $bdd->prepare($sql);

// 	if ($query == false) {
// 	 print_r($bdd->errorInfo());
// 	 die ('Error prepare');
// 	}
// 	$sth = $query->execute();
// 	if ($sth == false) {
// 	 print_r($query->errorInfo());
// 	 die ('Error execute');
// 	}

// }
header('Location: calendar.php');


?>
