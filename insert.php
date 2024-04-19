<?php
//1. POSTデータ取得
$title = $_POST["title"];
$text = $_POST["text"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO memo_an_table(id,title,text,indate)VALUES(NULL,:title,:text,sysdate())");
$stmt->bindValue(':title',   $title,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text',  $text,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
