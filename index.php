<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTユーザー登録</title>
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
<form method="POST" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
          <label>lid：<input type="text" name="lid"></label><br>
          <label>lpw：<input type="text" name="lpw"></label><br>
           <label>写真：<input type="file" name="upfile"></label><br>
           <label>タイトル：<input type="text" name="title"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
