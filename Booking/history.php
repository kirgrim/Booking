<link rel="stylesheet" type="text/css" href="css/history.css">
<script type="text/javascript" src="js/pageNav.js"></script>
<body>
<button onclick="goToPage('index.php')">Back</button>
<?php
session_start();
$nickname='';
if (!isset($_SESSION['nickname'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('location: login.php');
}
if (isset($_SESSION['success'])) {
    echo '<h1 style="text-align: center">', $_SESSION['success'] , '</h1>';
    unset($_SESSION['success']);
}
//if (isset($_SESSION['success'])) {
//    echo "<h4 style='text-align: center'>", $_SESSION['success'] , "</h4>";
//    unset($_SESSION['success']);
//}
if(isset($_SESSION['nickname'])) {
    $nickname = $_SESSION['nickname'];
    $db = mysqli_connect('localhost', 'admin',
        'password',
        'MySQL',
        '8889');
    $user_check_query = "SELECT register_number,name,city,address,start_date,end_date,isPaid,cost_per_night,datediff(end_date,start_date) as diff FROM bookings,livingplaces,users WHERE user=nickname and place_id=place_number and nickname='$nickname'" ;
    $result = mysqli_query($db, $user_check_query);
    if ($result->num_rows > 0) {
        ?>

        <button onclick="alert('This function is not yet available!')">Pay</button>
        <button style="width: 70px;" onclick="goToPage('cancel.php')">Cancel</button>
        <table id="records">
            <tr>
                <th>REGISTER NUMBER</th>
                <th>NAME</th>
                <th>CITY</th>
                <th>ADDRESS</th>
                <th>From</th>
                <th>To</th>
                <th>PAID?</th>
                <th>TO PAY</th>
            </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            $toPay= $row['diff']*$row['cost_per_night'];
            echo "<tr>", "<td>" , "<strong>" , $row['register_number'] , "</strong>" , "<td>" , "<strong>" , $row['name'] , "</strong>" , "</td>" , "<td>" , "<strong>" , $row['city'] , "</strong>" , "</td><td>" , "<strong>" , $row['address'] , "</strong>" , "</td><td>" , $row['start_date'] , "</td><td>" , $row['end_date'] , "</td> <td> " , $row['isPaid'] == 0 ? 'No' : 'Yes' , "</td><td> " , $row['isPaid'] == 1 ? 0 : $toPay , '€' ,"</td> </tr>";
        }
    } else {
        echo "<h1 style='text-align: center'>" , 'No records found' , '</h1>';
    }
    mysqli_close($db);
}?>
</body>