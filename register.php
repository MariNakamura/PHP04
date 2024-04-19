<?php
include "funcs.php";

//フォームからの値をそれぞれ変数に代入
$name      = filter_input( INPUT_POST, "name" );
$mail      = filter_input( INPUT_POST, "mail" );
$lid       = filter_input( INPUT_POST, "lid" );
$lpw       = filter_input( INPUT_POST, "lpw" );
$kanri_flg = filter_input( INPUT_POST, "kanri_flg" );
$lpw       = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化

$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO memo_user_table(name,mail,lid,lpw,kanri_flg,life_flg)VALUES(:name,:mail,:lid,:lpw,:kanri_flg,0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    session_start();
    $_SESSION["message"] = "会員登録が完了しました";
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $kanri_flg; // 管理者フラグも必要であれば保存
    $_SESSION["name"] = $name; // ユーザー名をセッションに保存
    $_SESSION["user_id"] = $pdo->lastInsertId(); // 最後に挿入された行のIDを取得して保存
    redirect("login.php");
}
