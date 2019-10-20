<?php include 'serverside/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/slideshow.css">
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript" src="js/pageNav.js"></script>
</head>
<body>
<form>
    <div id="top">
    <input type="button" id="info" class="top" value="Contact us" onclick="goToPage('contact.php')"/>
    </div>
</form>
<p>Please authorise</p>
<div id="login_container">
    <form id="logform" action="login.php" method="post">
        <?php include 'serverside/error.php' ?>
        <div class="row">
        <label for="username" class="label">Username: </label>
        <input type="text" class="input" value="" id="username" name="username" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="password" class="label">Password:</label>
        <input type="password" class="input" value="" id="password" name="password" autocomplete="off"/>
        </div>
        <div class="row">
            <div class="submit">
            <input type="submit" class="field" id="login" name="login" value="Log in"/>
            </div>
        </div>
        <script>navigate("logform")</script>
    </form>
</div>
<div id="text">
<bold>New user here?<a href="register.php">Sign up for free</a></bold>
</div>
<div class="slideshow-container">
    <img class="mySlides" src="css/1.jpg" >
    <img class="mySlides" src="css/2.jpg" >
    <img class="mySlides" src="css/3.jpg" >
    <img class="mySlides" src="css/4.jpg" >
    <img class="mySlides" src="css/5.jpg" >
</div>
<div class="dots" style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script type="text/javascript" src="js/slides.js"></script>
</body>
</html>