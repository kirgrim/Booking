<?php
//include 'php/server.php';
session_start();

if (!isset($_SESSION['nickname'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['nickname']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/logout.js"></script>
    <script type="text/javascript" src="js/pageNav.js"></script>
</head>
<body>
<?php
if (isset($_SESSION['booking'])) {
    echo "<h2 style='color: #f2f2f2;text-align: center'>" , $_SESSION['booking'] ,"</h2>";
    unset($_SESSION['booking']);
}
     if (isset($_SESSION['nickname'])) : ?>
    <div id="topbtns">
        <button style="float: right" onclick="logout()">Log out</button>
        <button onclick="goToPage('contact.php')">Contact us</button>
        <button onclick="goToPage('history.php')">My history <img src="css/cart.jpg" height="20" width="20"/> </button>
    </div>
        <h1 id="welcome">Welcome, <strong><?php echo $_SESSION['nickname'];?></strong></h1>
        <button id="bookingbtn" onclick="goToPage('newtrip.php')">Start journey!</button>
    <?php endif ?>
</body>
</html>