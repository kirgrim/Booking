<?php include 'serverside/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancel</title>
    <script type="text/javascript" src="js/pageNav.js"></script>
    <link rel="stylesheet" type="text/css" href="css/history.css">
</head>
<body>
<button onclick="goToPage('history.php')">Back</button><br><br>
<form action="cancel.php" method="post">
    <?php include 'serverside/error.php' ?>
    Enter number of booking you wish to cancel: <input name="input" type="text" autocomplete="off"/>
    <input type="submit" name="cancel" value="Cancel" "/>
</form>
</body>
</html>