<?php
//１．PHP
$id = $_GET["id"];
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM memo_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$value = "";
if($status==false) {
  sql_error($stmt);
} else {
  $value = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="enter.css">
  <title>メモ編集</title>
</head>
<body id="main">
<div class="container form-container">
  <div class="form-wrapper">
    <h2 class="mb-4">編集画面</h2>
    <form method="POST" action="update.php">
      <div class="form-group">
        <input type="text" class="form-control" id="title" name="title" value="<?=$value["title"]?>">
      </div>
      <div class="form-group">
        <textarea class="form-control" id="text" name="text" rows="4"><?=$value["text"]?></textarea>
      </div>
      <input type="hidden" name="id" value="<?=$value["id"]?>"> 
      <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>
</div>
</body>
</html>