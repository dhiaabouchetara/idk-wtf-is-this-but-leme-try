<?php
$data = json_decode(file_get_contents("data.json"), true);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Red Zone Cyber Café</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>🔥 Red Zone Cyber Café 🔥</header>

<div class="container">

<?php if ($data["open"]): ?>
  <div class="status open">🟢 المحل مفتوح</div>
<?php else: ?>
  <div class="status closed">🔴 المحل مغلق</div>
<?php endif; ?>

<h2>حجز War 5vs5</h2>

<form action="save.php" method="post">
  <input type="text" name="name" placeholder="الاسم الكامل" required>

  <label>من الساعة</label>
<select name="from_time" required>
  <option value="">اختر البداية</option>
  <?php
  for ($i = 18; $i <= 24; $i++) {
    echo "<option value='$i:00'>$i:00</option>";
  }
  echo "<option value='01:00'>01:00</option>";
  ?>
</select>

<label>إلى الساعة</label>
<select name="to_time" required>
  <option value="">اختر النهاية</option>
  <?php
  for ($i = 19; $i <= 24; $i++) {
    echo "<option value='$i:00'>$i:00</option>";
  }
  echo "<option value='01:00'>01:00</option>";
  ?>
</select>

  <button type="submit">تأكيد الحجز</button>
</form>

</div>
</body>
</html>
