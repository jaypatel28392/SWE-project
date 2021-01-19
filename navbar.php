<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url("fonts.css");

.nav-wrapper {
    height: 50px;
    background: #333;
}

.topnav {
    background-color: #fafafa;
    overflow: hidden;
    height: 50px;
}

.topnav a {
    float: right;
    display: block;
    color: #000000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    font-family: Roboto-Bold;
}

.topnav a:hover {
    color: #737373;
    border-bottom: thick solid #000000;
}

.topnav .icon {
    display: none;
}
.navbar-fixed {
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
    position: fixed;
}

@media screen and (max-width: 855px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 855px) {
  .topnav.responsive {
      position: relative;
      height: auto;
  }

  .navbar-fixed.responsive {
      top: 0;
      z-index: 100;
      position: fixed;
      width: 99.15%;
  }

  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

  .topnav.responsive a:hover {
    background-color: #EEEEEE;
    color: #212121;
    border-bottom: none;
  }
}
</style>
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="nav-wrapper">
    <div class="topnav" id="theTopNav">
      <a href="./budget.php">BUDGET CALCULATOR</a>
      <a href="./contact.php">CONTACT</a>
      <a href="./news.php">NEWS</a>
      <a href="./home.php">HOME</a>
        <a href="javascript:void(0);" class="icon" onclick="respFunc()">&#9776;</a>
    </div>
    </div>

<script>
function respFunc() {
        var x=document.getElementById("theTopNav");
        console.log(x);

        if (x.className==="topnav") {
                x.className+=" responsive";
                return 0;
        }

        if (x.className==="topnav navbar-fixed") {
                x.className+=" responsive";
                return 0;
        }

        if (x.className==="topnav responsive") {
                x.className="topnav";
                return 0;
        }

        if (x.className==="topnav navbar-fixed responsive"|| x.className==="topnav responsive navbar-fixed") {
                x.className="topnav navbar-fixed";
                return 0;
        }
}

$(document).ready(function() {
                $(window).scroll(function () {
                                if ($(window).scrollTop() > 120) {
                                        $("#theTopNav").addClass('navbar-fixed');
                                }

                                if ($(window).scrollTop() < 121) {
                                        $("#theTopNav").removeClass('navbar-fixed');
                                }
                        }

                );
        }

);
</script>

</body>
</html>
