<html>
<head> 
        <title> <?= $title ?? "blog" ?> </title> 
        <?php include_once 'shared/common_css.php';?>
        <?php include_once 'shared/common_js.php';?>
</head>
<body>
        <div class='container-sm' >
        <?= $content; ?>
        </div>
        <?php include_once 'shared/footer.php'?>
</body>
        <?php include_once 'shared/common_js.php';?>

</html>

