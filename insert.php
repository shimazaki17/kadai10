<?php

include("functions.php");
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["lid"]) || $_POST["lid"]==""||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""||
    !isset($_POST["title"]) || $_POST["title"]==""
){
  exit('ParamError');
}

//POSTデータ取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
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

$pw = password_hash($lpw, PASSWORD_DEFAULT);

//データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO gs_sns_table(id, lid, lpw, image, title) VALUES(NULL, :a1, :a2, :image, :title)");
$stmt->bindValue(':a1', $lid);
$stmt->bindValue(':a2', $pw);
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//  $error = $stmt->errorInfo();
//  exit("QueryError:".$error[2]);
     queryError($stmt);

}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}

?>
