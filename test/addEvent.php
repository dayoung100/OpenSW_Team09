<?php

require_once('connect.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['type']) && isset($_POST['content'])){

	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$type = $_POST['type'];
	$content = $_POST['content'];
	$userId = 'test';

	if($type == '#0071c5'){
		$sql = "INSERT INTO diary(title, start, end, content, userId) values ('$title','$start','$end','$content', '$userId')";
	}

	else if($type == '#008000'){
		$sql = "INSERT INTO todolist(title, start, end, content, userId) values ('$title','$start','$end','$content', '$userId')";
	}

	else if($type == '#FFD700'){
			$sql = "INSERT INTO account(title, start, end, content, userId) values ('$title', '$start', '$end', '$content', '$userId')";
	}

	echo $sql;
	//$req = $bdd->prepare($sql);
	//$req->execute();

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
header('Location: '.$_SERVER['HTTP_REFERER']);

?>
