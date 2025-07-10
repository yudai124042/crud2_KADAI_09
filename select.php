<?php
require_once('funcs.php');
require_once('session.php');  // ← ログインチェックを追加
checkSession();               // ← セッション確認

$pdo = connectToDb();
$stmt = $pdo->prepare('SELECT * FROM hotel_reservations');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>予約一覧</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>予約一覧</h2>

  <p style="text-align:right;">
    ログイン中：管理者 ｜ <a href="logout.php">ログアウト</a>
  </p>

  <?php foreach($result as $r): ?>
    <div class="card">
      <p>
        <strong><?= htmlspecialchars($r['hotel_name']) ?></strong><br>
        宿泊者：<?= htmlspecialchars($r['guest_name']) ?><br>
        宿泊期間：<?= date("Y年m月d日", strtotime($r['checkin_date'])) ?>
         ～ <?= date("Y年m月d日", strtotime($r['checkout_date'])) ?><br>
        <a href="update.php?id=<?= $r['id'] ?>">編集</a>
        <a href="delete.php?id=<?= $r['id'] ?>">削除</a>
      </p>
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>
