<?php

$connect = new PDO('mysql:host=localhost;dbname=team09', 'team09', 'team09');

$data = array();
//$query = "SELECT * FROM todo ORDER BY idTodo";
$query = "SELECT * FROM todo ORDER BY _id";
$statement = $connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();

foreach($result as $row){
    $data[] = array(
    'id' =>$row["idTodo"],
    'title'=>$row["title"],
    'date'=>$row["date"],
    'time'=>$row["time"]);
}

/*foreach($result as $row){
    $data[] = array(
    'id' =>$row["_id"],
    'title'=>$row["title"],
    'start'=>$row["start"],
    'end'=>$row["end"]);
}*/

echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>
