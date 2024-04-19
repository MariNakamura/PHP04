<?php

//1. POSTデータ取得
$title   = $_POST["title"];
$text  = $_POST["text"];
$id    = $_POST["id"]; //追加

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE memo_an_table SET title=:title, text=:text WHERE id=:id"; //追加
$stmt = $pdo->prepare($sql); //sqlに書き換え
$stmt->bindValue(':title',   $title,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text',  $text,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',    $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php"); //selectに書き換え
}

?>
