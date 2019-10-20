<?php include 'serverside/server.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript" src="js/pageNav.js"></script>

</head>
<body>
<form>
    <div id="top">
        <input type="button" id="home" class="top" value="Sign in" onclick="goToPage('login.php')"/>
        <input type="button" id="info" class="top" value="Contact us" onclick="goToPage('contact.php')"/>
    </div>
</form>
<p>Registration</p>
<div id="registration_container">
    <form id="regform" action="register.php" method="post">
        <?php include 'serverside/error.php' ?>
        <div class="row">
            <label for="fname" class="label">First Name<small style="color: red">*</small> </label>
            <input type="text" class="input" id="fname" name="fname" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="lname" class="label">Last Name<small style="color: red">*</small> </label>
            <input type="text" class="input" id="lname" name="lname" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="nickname" class="label">Create Nickname<small style="color: red">*</small> </label>
            <input type="text" class="input" id="nickname" name="nickname" autocomplete="off" />
        </div>
        <div class="row">
            <label for="password" class="label">Password<small style="color: red">*</small> </label>
            <input type="password" class="input" id="password" name="password" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="rpassword" class="label" >Repeat password<small style="color: red">*</small> </label>
            <input type="password" class="input" id="rpassword" name="rpassword" autocomplete="off"/>
        </div>
        <small style="color: red">Fields marked with * are required</small>
        <div class="row">
            <div class="submit">
                <input type="submit" class="field" id="reg_user" name="reg_user" value="Register" />
            </div>
        </div>
        <script>navigate("regform")</script>
    </form>
</div>
<h4 style="text-align: center">Watch this short video to see how to use our web site:</h4>
<video id="video" controls>
        <source src="video/howToUse.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>