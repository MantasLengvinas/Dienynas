<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sveiki</title>
</head>
<body>
    <?php
        foreach($users as $user){
            echo $user->username.' ';
        }
    ?>
</body>
</html>