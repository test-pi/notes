<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Главная</title>
    <link rel="shortcut icon" href="<?=PATH;?>images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--
    <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
    -->
</head>
<body>
<table class="mainCarcas" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2"><?php require_once "app/block/header.php";?></td>
    </tr>
    <tr class="Middle">
        <td class="leftMenu"><?php require_once "app/block/menu.php";?></td>
        <td class="content">
            <?php include 'app/views/'.$content_view; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"><?php require_once "app/block/footer.php";?></td>
    </tr>
</table>
    
</body>
</html>