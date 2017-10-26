<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1　データ取得
$id = $_GET["id"];
//$name= "";
//$email= "";
//$naiyou="";

//２　接続
try {
  $pdo = new PDO('mysql:dbname=gs_db21;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//３　SQLの作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
//$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
//$stmt->bindValue(':email', $email, PDO::PARAM_STR);
//$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

//４　エラー
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
  
}else{
  header("Location: select.php");
  exit;
}








?>