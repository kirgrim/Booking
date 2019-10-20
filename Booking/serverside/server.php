<?php
session_start();

// initializing variables

$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'admin',
    'password',
    'MySQL',
    '8889');
// REGISTER USER
if (isset($_POST['reg_user'])) {
    $nickname= '';
    $fname = '';
    $lname    = '';
    $password_1 = '';
    $password_2='';
// receive all input values from the form
$nickname = mysqli_real_escape_string($db, $_POST['nickname']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$password_1 = mysqli_real_escape_string($db, $_POST['password']);
$password_2 = mysqli_real_escape_string($db, $_POST['rpassword']);


// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($nickname)) { $errors[] = 'Nickname is required'; }
if (empty($fname)) { $errors[] = 'First name is required'; }
if (empty($lname)) { $errors[] = 'Last name is required'; }
if (empty($password_1)) { $errors[] = 'Password is required'; }
if ($password_1 !== $password_2) {
$errors[] = 'Passwords do not match';
}

// first check the database to make sure
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM users WHERE nickname='$nickname' ";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

// if user exists
    if ($user && $user['nickname'] === $nickname) {
        $errors[] = 'Username already exists';
    }

// Finally, register user if there are no errors in the form
if (count($errors) === 0) {
$password = md5($password_1);//encrypt the password before saving in the database

$query = "INSERT INTO users (nickname, fname,lname, password)
VALUES('$nickname', '$fname','$lname','$password')";
mysqli_query($db, $query);
$_SESSION['nickname'] = $nickname;
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
header('location: index.php');
}
}
if (isset($_POST['login'])) {
    //$nickname = mysqli_real_escape_string($db, $_POST['username']);
    $nickname = $_POST['username'];
    //$_SESSION['nickname'] = $nickname;
    //$_SESSION['success'] = 'You are now logged in';
    $password = $_POST['password'];
    if (empty($nickname)) {
        $errors[] = 'Username is required';
    }
    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    if (count($errors) === 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE nickname='$nickname' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) === 1) {
            $_SESSION['nickname'] = $nickname;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
           // $_SESSION['success'] = 'You are now logged in';
            header('location: index.php');
        }else {
            $errors[] = 'Wrong username/password';
        }
    }
}
if (isset($_POST['add_booking'])) {
    $date=date('Ymd');
    $nickname=$_SESSION['nickname'];
    $city = $_POST['city'];
    $hotel = $_POST['hotel'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $confirm = isset($_POST['confirm'])?$_POST['confirm']:'';
    if (empty($city)) {
        $errors[] = 'City is required';
    }
    if (empty($hotel)) {
        $errors[] = 'Hotel is required';
    }
    if ($sdate===null) {
        $errors[] = 'Start date is not set';
    }
    if ($edate === null) {
        $errors[] = 'End date is not set';
    }
    if (empty($confirm)) {
        $errors[] = 'Confirm booking';
    }
    $query="Select * from livingplaces where city='$city' and name='$hotel'";
    $result=mysqli_query($db,$query);
    if (mysqli_num_rows($result) === 0) {
        $errors[] = 'We do not have available hotels in given city';
    }
    if(count($errors)===0) {
        $query = "select place_number from livingplaces where name='$hotel'";
        $result=mysqli_query($db,$query);
        if (mysqli_num_rows($result) === 1) {
            $place_number=$result->fetch_assoc()['place_number'];
        }
        $query = "INSERT INTO bookings ( place_id,start_date, end_date,user,isPaid)
        VALUES('$place_number', '$sdate','$edate','$nickname','0')";
        mysqli_query($db, $query);
        $_SESSION['booking']='Booking is successfull!';
        header('location: index.php');
    }

}
if (isset($_POST['add_message'])) {
    $topic='';
    $text='';
    $contact='';
    $date=date('Y-m-d');
    if($_POST['title']===''){
        $errors[] = 'Specify title';
    }
    if($_POST['content']===''){
        $errors[] = 'Message is empty';
    }
    if(count($errors)===0) {
        $topic = $_POST['title'];
        $text = $_POST['content'];
        if ($_POST['contact'] !== '')
            $contact = $_POST['contact'];
        $query = "INSERT INTO messages (topic, text, date, contact) values ('$topic','$text','$date','$contact')";
        $results = mysqli_query($db, $query);
        $_SESSION['success']='Message was successfully sent!';
    }
}
if (isset($_POST['cancel'])) {
    $date=date('Y-m-d');
    $input='';
    $nickname=$_SESSION['nickname'];
    if($_POST['input']===''){
        $errors[] = 'Input field is empty';
    }
    $input=$_POST['input'];
    $query = "SELECT * FROM bookings where register_number='$input' AND user='$nickname'";
    $results = mysqli_query($db, $query);
    if($results->num_rows===0){
        $errors[]= 'No such booking exist';
        goto a;
    }
//    $query = "SELECT DATEDIFF($date,start_date) as diff FROM bookings where register_number='$input' AND user='$nickname'";
//    $results = mysqli_query($db, $query);
//    if($results->fetch_assoc()['diff']<7){
//        $errors[]= 'Too late to cancel this booking';
//    }
    if(count($errors)===0){
        $query = "DELETE FROM bookings WHERE register_number=$input";
        mysqli_query($db, $query);
        $_SESSION['success']='Booking under number  '.$input.' was successfully deleted';
        header('location: history.php');
    }
    a:
}

mysqli_close($db);

