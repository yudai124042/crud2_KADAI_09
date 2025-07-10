<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $pw = $_POST['pw'];
    $correct_id = 'admin';
    $correct_pw = 'yudai1226';

    if ($userid === $correct_id && $pw === $correct_pw) {
        $_SESSION['chk_login'] = true;
        header('Location: select.php');
        exit();
    } else {
        $error = 'ユーザーIDまたはパスワードが間違っています';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="login-container">
    <h2>ホテル予約ログイン</h2>
    <?php if (!empty($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
      <input type="text" name="userid" placeholder="ユーザーID">
      <input type="password" name="pw" placeholder="パスワード">
      <input type="submit" value="ログイン">
    </form>
  </div>
</body>
</html>
