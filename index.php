<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index.php</title>
</head>
<body>
    <?php if (isset($_SESSION['id'])) {
    echo("BRAVO ".$_SESSION['username'].", c'est ce qui était attendu -;)");
//session_destroy();
} else {
        header('Location: login.php');
    }
    ?>
    <a href="logout.php">LOG OUT</a>
</body>
</html>