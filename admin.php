<?php
$data = json_decode(file_get_contents("data.json"), true);

// تغيير حالة المحل
if (isset($_POST["toggle"])) {
  $data["open"] = !$data["open"];
  file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
  header("Location: admin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>لوحة تحكم Red Zone</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>🎮 لوحة تحكم Red Zone</header>

<div class="container">

<form method="post">
  <button name="toggle">
    <?= $data["open"] ? "🔴 غلق المحل" : "🟢 فتح المحل" ?>
  </button>
</form>

<hr>

<h2>📋 الحجوزات</h2>

<?php if (empty($data["bookings"])): ?>
  <p>لا توجد حجوزات حالياً</p>
<?php else: ?>
  <ul>
    <?php foreach ($data["bookings"] as $b): ?>
      <li>
        👤 <?= htmlspecialchars($b["name"]) ?>
        | ⏰ <?= $b["from"] ?> → <?= $b["to"] ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

</div>
</body>
</html>
