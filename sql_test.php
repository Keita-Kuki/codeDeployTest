<?php 

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  if (ctype_digit($id)) {
    $id = (int)$id;
  } else {
    exit("ERROR: ID must be INTEGER");
  }
}

try {
$pdo = new PDO('mysql:host=aws-study-170316.ca35pdjiawh5.ap-northeast-1.rds.amazonaws.com; dbname=sample; charset=utf8mb4','keita_kuki','aws_study');
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$stmt = $pdo -> prepare("SELECT * FROM users WHERE id=:id");
$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
$stmt -> execute();
$rows = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($rows) {
  var_dump($rows);
} else {
    exit("ERROR: such record dosent exist");
}

