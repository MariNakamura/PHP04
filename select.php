<?php
//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM memo_an_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="display.css">
<title>メモ表示</title>
</head>
<body id="main">

<!-- Main[Start] -->
<div class="container mt-5">
  <h2 class="mb-4">メモ一覧</h2>
  <div class="row">
    <?php foreach($values as $value){ ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?=$value["title"]?></h5>
          <p class="card-text"><?=$value["text"]?></p>
          <p class="card-text"><small class="text-muted"><?=$value["indate"]?></small></p>
          <a href="detail.php?id=<?=h($value["id"])?>">編集</a>
          <a href="delete.php?id=<?=h($value["id"])?>">削除</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<div class="fixed-bottom d-flex justify-content-end p-3">
  <a href="index.php" class="btn btn-create">新しく作成する</a>
</div>
<!-- Main[End] -->

</body>
</html>


