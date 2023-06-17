<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    Chọn thời gian 
    <input type="date" value="<?php echo date('Y-m-d') ?>">
    <input type="week">
    <input type="month">
    <select>
        <?php for($i=date('Y'); $i >= 2021; $i--){ ?>
        <option>
            <?php echo $i ?>
        </option>
        <?php } ?>
    </select>
</body>
</html>