<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.GETでidを取得
$id = $_GET["id"];




//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db21;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch();
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）


//4.select.phpと同じようにデータを取得（以下はイチ例）
// while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $name = $result["name"];
//    $email = $result["name"];
//  }


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ログインid：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>ログインpw：<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
     <label>管理権限：<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
     <label>使用状況：<input type="text" name="life_flg" value="<?=$row["life_flg"]?>"></label><br>
     <input type = "hidden" name ="id" value ="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>






