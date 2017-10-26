<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.POSTでParamを取得
$id=$_POST["id"];
$name=$_POST["name"];
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];
$kanri_lfg=$_POST["kanri_flg"];
$life_lfg=$_POST["life_flg"];


$pdo = db_con();

//2.DB接続など
//try {
//  $pdo = new PDO('mysql:dbname=gs_db21;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('データベースに接続できませんでした。'.$e->getMessage());
//}

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_user_table SET name =:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
  
}else{
  header("Location: select.php");
  exit;
}
?>
