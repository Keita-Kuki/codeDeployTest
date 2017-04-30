<?php 

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  try{
    $id = (int)$id;
  } catch {
    echo "not int";
  }
}

try {
$pdo = new PDO('mysql:host=localhost; dbname=aws_study; charset=utf8mb4','root','aws_study');
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}
$stmt = $pdo -> prepare("SELECT * FROM users WHERE id=:id");
$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
$stmt -> execute();
$rows = $stmt -> fetch(PDO::FETCH_ASSOC);
var_dump($rows);


