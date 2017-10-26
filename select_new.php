<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();
$pdo = db_con();
$id = $_SESSION["id"];

$view="";
$user="you";
$base="";
$title="";
$photo="";
$title_id="";
$title_id2="";
$title_id3="";
$title_id4="";
$title_id5="";
$other="";

//sns_tableとsns_title_tableを結合し，image, title, photoを取得
$stmt = $pdo->prepare("SELECT image, title, photo FROM gs_sns_table INNER JOIN gs_sns_title_table ON gs_sns_table.id = gs_sns_title_table.id WHERE gs_sns_table.id =$id");
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view = '<image class="view" width="193" height="130" src="upload/'.$result["image"].'">';
      
      $title .= '<p>';
      $title .= $result["title"];
      $title .= '</p>';
      $base = $result["title"];
      
      $photo .= '<image class="photo" width="193" height="130" src="upload/'.$result["photo"].'">';
}};

//sns_title_tableからidを取得
//以下の$baseは一番最後のtitleしか取れていない点，要修正。
      $stmt = $pdo->prepare("SELECT DISTINCT id FROM gs_sns_title_table WHERE title = '$base'");
      $status = $stmt->execute();
      
if($status==false){
    queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $title_id .= $result["id"];
//以下は今登録されているスカラありきのコード。汎用的なコードへ修正したい。
      $title_id2 =str_split($title_id,2);
      $title_id3 = $title_id2[0];
      $title_id4 = $title_id2[1];
      $title_id5 = $title_id2[2];
        }};

//sns_title_tableでtitleが同一のidをsns_tableへ返す
      $stmt = $pdo->prepare("SELECT image FROM gs_sns_table WHERE id = '$title_id3'or'$title_id4'or'$title_id5'");
      $status = $stmt->execute();
     
if($status==false){
    queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $other .= '<image class="other" src="upload/'.$result["image"].'">';
  }}



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
                margin-left: 100px;
                
            }
            
/*
            div.photo{
                
                width:150px;
                height:150px;
                background-color:lawngreen
            }
            
            div.title{
                    width:150px;
                height:50px;
                     background-color:lightblue
            }
*/



        </style>
    </head>

    <body id="main">
        <!-- Head[Start] -->
        <header id="header">
            <h1 class="logo">
                My Page
            </h1>
        </header>
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
                    
                    </li>
                    <li>メニュー</li>
                </ul>
            </div>
            <div class="box_C">
               <ul class="parent">
                   <li class="child">
                      <div class="photo">
                       <?= $photo ?>
                      </div>
                       <div class="title">
                        <?= $title ?>
                       </div>
                   </li>
                    <li class="child">
                        <div class="photo">
                        <form method="POST" action="insert_item.php" enctype="multipart/form-data">
                            <fieldset>
                                <label>title：<input type="text" name="title"></label><br>
                                <label>写真：<input type="file" name="upfile"></label><br>
                                <input type="submit" value="送信">
                            </fieldset>
                    </form>
                    </div>
                   </li>
               </ul>
                </div>
            </div>

        </div>
        <!-- Main[End] -->
    </body>

    </html>
