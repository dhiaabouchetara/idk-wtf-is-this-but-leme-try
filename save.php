<?php
$data = json_decode(file_get_contents("data.json"), true);

$name = $_POST["name"];
$from = $_POST["from_time"];
$to   = $_POST["to_time"];

$data["bookings"][] = [
  "name" => $name,
  "from" => $from,
  "to"   => $to
];

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
