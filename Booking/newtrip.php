<?php include 'serverside/server.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="css/newtrip.css">
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript" src="js/pageNav.js"></script>
    <script type="text/javascript" src="js/minDate.js"></script>
</head>
<body>
<form>
    <div id="top">
        <input type="button" id="home" class="top" value="Home" onclick="goToPage('index.php')"/>
        <input type="button" id="info" class="top" value="Contact us" onclick="goToPage('contact.php')"/>
    </div>
</form>
<h1>Select booking details</h1>
<div id="registration_container">
    <form id="tripform" action="newtrip.php" method="post">
        <?php include 'serverside/error.php' ?>
        <div class="row">
            <label for="city" class="label">City<small style="color: red">*</small> </label>
            <input type="text" class="input" id="fname" name="city" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="hotel" class="label">Hotel<small style="color: red">*</small> </label>
            <input type="text" class="input" id="hotel" name="hotel" autocomplete="off"/>
        </div>
        <div class="row">
            <label for="sdate" class="label">Start date<small style="color: red">*</small> </label>
            <input type="date" data-date="" data-date-format="DD MMMM YYYY" class="input" id="sdate" name="sdate"  />
        </div>
        <div class="row">
            <label for="edate" class="label">End date<small style="color: red">*</small> </label>
            <input type="date" class="input" id="edate" name="edate" />
        </div>
        <div class="row">
            <label for="checkbox" class="label">I confirm that data is correct<small style="color: red">*</small> </label>
            <input type="checkbox" class="input" id="confirm" name="confirm"/>
        </div>
        <small style="color: red">Fields marked with * are required</small>
        <div class="row">
            <div class="submit">
                <input type="submit" class="field" id="add_booking" name="add_booking" value="Complete booking" />
            </div>
        </div>
        <script>navigate("tripform")</script>
        <script>setMinDate()</script>
    </form>
</div>
</body>
</html>