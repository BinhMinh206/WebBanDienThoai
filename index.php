<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>

<body>
    <h1>
        <?php
        spl_autoload_register(function($class){
            include_once 'system/libs/'.$class.'.php';
        });
        include_once 'app/config/config.php';
        $main=new Main();
        ?>
    </h1>

</body>

</html>