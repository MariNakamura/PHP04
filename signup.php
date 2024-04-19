<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員登録</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <div class="form-container">
    <div class="form-wrapper">
      <h1>新規会員登録</h1>
      <form action="register.php" method="post">
        <div class="form-group">
          <label>
            名前：
            <input type="text" name="name" class="form-control" required>
          </label>
        </div>
        <div class="form-group">
          <label>
            メールアドレス：
            <input type="text" name="mail" class="form-control" required>
          </label>
        </div>
        <div class="form-group">
          <label>
            ログインID：
            <input type="text" name="lid" class="form-control" required>
          </label>
        </div>
        <div class="form-group">
          <label>
            パスワード：
            <input type="password" name="lpw" class="form-control" required>
          </label>
        </div>
        <div class="form-group">
          <label>
            ユーザータイプ：
            <label>
              <input type="radio" name="kanri_flg" value="0"> 一般
            </label>
            <label>
              <input type="radio" name="kanri_flg" value="1"> 管理者
            </label>
          </label>
        </div>
        <input type="submit" value="新規登録" class="btn-primary">
      </form>
    </div>
  </div>
</body>
</html>