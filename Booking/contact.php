<?php include 'serverside/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <script type="text/javascript" src="js/pageNav.js"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
<?php if(isset($_SESSION['success'])){
    echo "<h4 style='text-align: center'>" , $_SESSION['success'] , "</h4>";
    unset($_SESSION['success']);
}?>
<button id="home" onclick="goToPage('index.php')">Home</button>
<form id="contactform" action="contact.php" method="post">
    <?php include 'serverside/error.php' ?>
    Specify topic: <input type="text" id="title" name="title" autocomplete="off">
    Write your message: <textarea type="text" id="content" name="content" autocomplete="off"></textarea>
    Specify contact(optional): <textarea type="text" id="contact" name="contact" autocomplete="off"></textarea>
    <input type="submit" id="add_message" name="add_message" value="Add message">
    <script>navigate("contactform")</script>
</form>
</body>
</html>