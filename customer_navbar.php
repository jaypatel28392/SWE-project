<?php

include "connect.php";
if (!isset($_SESSION))
{
								session_start();
}

if (isset($_SESSION['loggedIn_cust_id']))
{
								$sql0   = "SELECT * FROM customer WHERE cust_id=" . $_SESSION['loggedIn_cust_id'];
								$result = $conn->query($sql0);
								$row    = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url("fonts.css");

.nav-wrapper {
    height: 53px;
    background: #333;
}
.nav-wrapper .topnav {
    background-color: #201D1D;
    overflow: hidden;
    height: 53px;
}

.topnav a[id="hamburger"] {
    display: none;
}

.topnav a[id="user"] {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 27px;
    font-family: Roboto-Light;
}

.topnav a[id="profile"] {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 17px 17px;
    text-decoration: none;
    font-size: 17px;
    font-family: OpenSans-Bold;
    background-color: green;
    border-radius: 40px;
}

.topnav a[id="logout"] {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 17px 17px;
    text-decoration: none;
    font-size: 17px;
    font-family: OpenSans-Bold;
    background-color: #201D1D;
    border-radius: 30px;
}
.topnav a[id="profile"]:hover {
    color: white;
    background: linear-gradient(to bottom, #00cc00 0%, #003366 100%);
}

.topnav a[id="logout"]:hover {
    color: white;
    background: linear-gradient(to bottom, #990033 43%, #00cc00 100%);
}

@media screen and (max-width: 855px) {
    .topnav a[id="user"] {
        display: none;
    }

    .topnav a[id="hamburger"] {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 0px 16px;
        text-decoration: none;
        font-size: 45px;
        font-family: Roboto-Light;
    }
}

.nav-wrapper .navbar-fixed {
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;
    position: fixed;
}
</style>
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="nav-wrapper">
        <div class="topnav" id="theTopNav">
            <a href="javascript:void(0);" class="icon" onclick="openNav()" id="hamburger">
                &#9776;
            </a>
            <a id="user">Welcome, &nbsp<?php echo $row["first_name"]; ?> !</a>
            <a id="logout" href="./logout_action.php" onclick="return confirm('Are you sure?')">Logout</a>
            <a id="profile" href="./customer_profile.php">My Profile</a>
        </div>
    </div>

<script>

$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 120) {
      $("#theTopNav").addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 121) {
      $("#theTopNav").removeClass('navbar-fixed');
  }
  });
});
</script>

</body>
</html>
