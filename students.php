<?php

$pdo = new PDO('mysql:host=localhost;dbname=epcst', 'root', '');

$query = 'SELECT * FROM students';


if(isset($_GET['limit'])){
    $query .=' LIMIT '.$_GET['limit'];
}

if(isset($_GET['order']) && isset($_GET['column'])){
    $query .= ' ORDER by '.$_GET['order'].' '.$_GET['column'];
}

$stmt = $pdo->prepare($query);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("Content-Type: application/json");
echo json_encode($students);

?>