<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="login.css" />
<title>ログイン</title>
</head>
<body>


<?php
    // メッセージがある場合は表示
    if (isset($_SESSION["message"])) {
        echo "<p>" . $_SESSION["message"] . "</p>";
        // メッセージを削除
        unset($_SESSION["message"]);
    }
?>

<?php
    // エラーメッセージがある場合は表示
    if (isset($_SESSION["error_message"])) {
        echo "<p style='color: red;'>" . $_SESSION["error_message"] . "</p>";
        unset($_SESSION["error_message"]);
    }
?>

<!-- フォームコンテナ -->
<div class="form-container">
  <div class="form-wrapper">
    <form name="form1" action="login_act.php" method="post">
      <div class="form-group">
        <label for="lid">ID:</label>
        <input type="text" name="lid" id="lid" class="form-control">
      </div>
      <div class="form-group">
        <label for="lpw">PW:</label>
        <input type="password" name="lpw" id="lpw" class="form-control">
      </div>
      <input type="submit" value="ログイン" class="btn-primary">
    </form>
  </div>
</div>
</body>
</html>