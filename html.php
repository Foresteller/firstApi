<?php
require __DIR__ . '/vendor/autoload.php';
$heroes = require 'Service.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Герои Dota 2</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
        }
        td {
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2 align="center"> Информация о героях</h2>
<table>
    <tr>
        <th>localized_name</th>
        <th>primary_attr</th>
        <th>attack_type</th>
        <th>legs</th>
    </tr>
    <?php foreach ($heroes as $hero): ?>
    <tr>
        <td><?=htmlspecialchars($hero['localized_name']) ?></td>
        <td><?=htmlspecialchars($hero['primary_attr']) ?></td>
        <td><?=htmlspecialchars($hero['attack_type']) ?></td>
        <td><?=htmlspecialchars($hero['legs'])?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
