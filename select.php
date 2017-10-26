<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();
$pdo = db_con();
$id = $_SESSION["id"];

//２.データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_sns_table WHERE id = $id");
$status = $stmt->execute();

//３.データ表示
$view="";
$user="you";
$base="";
$title="";
$title1="";
$title2="";
$title3="";
$title4="";
$photo="";
$photo1="";
$photo2="";
$photo3="";
$photo4="";

if($status==false){
    queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//      $view .= '<p>';
      $view = '<image class="view" src="upload/'.$result["image"].'">';
      $title .= '<p>';
      $title .= $result["title"];
      $title .= '</p>';
      $photo = '<image class="photo" width="193" height="130" src="upload/'.$result["photo"].'">';
      $base = $result["title"];
      
      $title1 .= '<p>';
      $title1 .= $result["title1"];
      $title1 .= '</p>';
      $photo1 = '<image class="photo1" width="193" height="130" src="upload/'.$result["photo1"].'">';
      $base = $result["title1"];
      
//      $view .= '<a href="detail.php?id='. $result["id"].'">';
//      $view .= $result["name"];
//      $view .= '</a>';
//      $view .= '<a href="delete.php?id='. $result["id"].'">';
//      $view .='[削除]';
//      $view .= '</a>';
//      $view .= '</p>';
  
$stmt = $pdo->prepare("SELECT * FROM gs_sns_table WHERE title = '$base'");
$status = $stmt->execute();
     
$other="";
if($status==false){
    queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//      imageが複数ある
      $other .= '<image class="other" src="upload/'.$result["image"].'">';
  }}
  }
};

?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー情報</title>
        <link rel="stylesheet" href="css/range.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div.navbar-header {
                align-content: center;
            }
            
            div.other {
                background-color: burlywood;
                display: box;
                height: 150px;
                width: 1200px;
                width: auto;
            }
            
            
            li.other{
                display: inline;
                margin-top: 30px;
            }

            
            div.container {
                padding-left: 0px;
                background-color: aqua;
                display: grid;
                grid-template-rows: 150px 800px;
                grid-template-columns: 200px 900px;
                height: 1000px;
                height: auto;
                width: 1200px;
                width: auto;
            }
            
            div.box_A {
                background-color: dodgerblue;
                /*            flex: 0 0 100px;*/
                grid-row-start: 1;
                grid-column-start: 2;
            }
            
            div.box_B {
                background-color:beige;
                /*            flex: 0 0 100px;*/
                grid-row-start: 1;
                grid-row-end: span 2;
                grid-column-start: 1;
            }
            
            div.box_C {
                background-color:beige;
                /*            flex: 0 0 100px;*/
                grid-row-start: 2;
                grid-column-start: 2;
                display: flex;
            }
            
            div.child {
                display: inline;
                width: 100px;
                height: 100px;
                background-color: azure;
                /*
                padding-left: 10px;
                margin:20px, 50px,20px,50px;
*/
            }
            
            div.image {
                /*                filter: blur(1px);*/
                margin-left: 400px;
                margin-right: auto;
                margin-top: 30px;
                margin-bottom: 30px;
                object-fit: cover;
            }
            
            ul.menu{
                display: inline;
                margin-left: 0px;
                width: 100px;
            }
            
            li.menu{
                display: inline;
                margin-left: 0px;
                width: 50px;
            }
            
            img.view {
                border-radius: 50px;
                margin-left: auto;
                margin-right: auto;
                margin-top: auto;
                margin-bottom: auto;
                height: 100px;
                width: 100px;
                object-fit: cover;
            }
            

            
            img.other {
                border-radius: 50px;
                margin-left: auto;
                margin-right: auto;
                margin-top: auto;
                margin-bottom: auto;
                height: 100px;
                width: 100px;
                object-fit: cover;
            }
            
            header{
                background-color:dodgerblue;
            }
            
            h1.logo{
                margin-left: 500px;
                margin-right: auto;
                margin-top: auto;
                margin-bottom: auto;
            }
            
            ul.parent{
                margin-top:30px;
                
                
            }
            
            li.child{
                 display:inline;
                float: left;
                margin-left: 50px;
                
            }
            

        </style>
    </head>

    <body id="main">
        <!-- Head[Start] -->
        <header id="header">
            <h1 class="logo">
                My Page
            </h1>
        </header>
<!--
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <?= $user ?>
                        </a>
                    </div>
                </div>
            </nav>
        </header>
-->
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <div class="other">
            <ul>
                <li class="other"></li>
                <?= $other ?>
                    <li class="other"></li>
            </ul>

        </div>
        <div class="container">
            <div class="box_A">
                <div class="image">
                    <?= $view ?>
                </div>
            </div>
            <div class="box_B">
                <ul class="menu">
                    <li class="menu">
                    <form method="POST" action="insert_item.php" enctype="multipart/form-data">
                        <div class="jumbotron">
                            <fieldset>
                                <label>title：<input type="text" name="title"></label><br>
                                <label>写真：<input type="file" name="upfile"></label><br>
                                <input type="submit" value="送信">
                            </fieldset>
                        </div>
                    </form>
                    </li>
                    <li>メニュー</li>
                    <li>メニュー</li>
                    <li>メニュー</li>
                </ul>
            </div>
            <div class="box_C">
<!--
                <div class="child">
                        <?= $photo ?>
                        <?= $title ?>
                    </div>
-->

               <ul class="parent">
                   <li class="child">
                       <?= $photo ?>
                        <?= $title ?>
                   </li>
                    <li class="child">
                       <?= $photo1 ?>
                        <?= $title1 ?>
                   </li>
                    <li class="child">
                       <?= $photo2 ?>
                        <?= $title2 ?>
                   </li> 
                   <li class="child">
                       <?= $photo3 ?>
                        <?= $title3 ?>
                   </li>
                    <li class="child">
                       <?= $photo4 ?>
                        <?= $title4 ?>
                   </li>
                   
               </ul>
                </div>
            </div>

        </div>
        <!-- Main[End] -->
    </body>

    </html>
