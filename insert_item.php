<?php
session_start();

include("functions.php");
$id = $_SESSION["id"];

//入力チェック(受信確認処理追加)
if(
    !isset($_POST["title"]) || $_POST["title"]==""
){
  exit('ParamError');
}

//POSTデータ取得
$title = $_POST["title"];

//写真
//Fileアップロードチェック
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    //情報取得
    $file_name = $_FILES["upfile"]["name"];         //"1.jpg"ファイル名取得
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
    $file_dir_path = "upload/";  //画像ファイル保管先

    
    //***File名の変更***
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成とパス

    $img="";  //画像表示orError文字を保持する変数
    // FileUpload [--Start--]
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path . $file_name ) ) {
            chmod( $file_dir_path . $file_name, 0644 );
        } else {
            $img = "Error:アップロードできませんでした。"; //Error文字
        }
    }
    // FileUpload [--End--]
}else{
    $img = "画像が送信されていません"; //Error文字
}


//2. DB接続します(エラー処理追加)
$pdo = db_con();

//$pw = password_hash($lpw, PASSWORD_DEFAULT);

//データ登録SQL作成
//    $stmt = $pdo->prepare("UPDATE gs_sns_title_table SET title=:title, photo=:photo WHERE id= $id");
    $stmt = $pdo->prepare("INSERT INTO gs_sns_title_table (uid, title, photo, id) VALUES(NULL, :title, :photo, :id)");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':photo', $file_name, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録処理後
if($status==false){
     queryError($stmt);

}else{
  header("Location: index.php");
  exit;
}

?>
