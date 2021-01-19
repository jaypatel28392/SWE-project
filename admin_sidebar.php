<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.sidenav {
    width: 230px;
    background-color: #201D1D;
    height: 70vh;
    float: right;
    overflow-y: auto;
    box-shadow: 1px 1px 5px #888888;
}

.sidenav a {
    font-family: OpenSans-Regular;
    font-size: 19px;
    color: #201D1D;
    display: block;
    padding: 22px 16px;
    text-decoration: none;
}

.sidenav a:hover {
    background-color: #ddd;
}

.sidenav a[id="label"] {
    font-family: OpenSans-Bold;
    font-size: 22px;
    color:  green;
    display: block;
    padding: 11px;
    text-decoration: none;
    border-top: 1px solid #212121;
    border-bottom: 1px solid #212121;
}

.sidenav a[id="label"]:hover {
    background-color: transparent;
}

.sidenav a.active {
    background-color: green;
}

.sidenav-fixed {
    height: auto;
    top: 53px;
    z-index: 100;
    bottom: 0;
    position: fixed;
}

.sidenav a[id="closebtn"] {
    display: none;
}

@media screen and (max-width: 855px) {
    .sidenav {
        height: 100vh;
        width: 0;
        margin-top: -53px;
        z-index: 100;
        top: 131px;
        background-color: #eee;
        overflow-x: hidden;
        transition: 0.5s;
        box-shadow: 3px 3px 20px #000000;
    }

    .sidenav a[id="closebtn"] {
        font-family: OpenSans-Regular;
        font-size: 19px;
        color: #212121;
        display: block;
        margin-left: 200px;
    }

    .sidenav.sidenav-fixed.responsive {
        top: 53px;
        z-index: 100;
    }
}
</style>
</head>

<body>
    <div class="sidenav" id="theSideNav">
        <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">&times;</a>
        <a href="./admin_home.php" style="color:white">Home</a>
        <a id="label">My Customers</a>
        <a href="./customer_add.php" style="color:white">Add Customer</a>
        <a href="./manage_customers.php" style="color:white">Manage Customers</a>
        <a href="https://www.tidio.com/panel/login" style="color:white">Customer Service - Tidio</a>
        <a id="label">Website Management</a>
        <a href="./post_news.php" style="color:white">Post News</a>
    </div>

<script>
for (var i = 0; i < document.links.length; i++) {
    if (document.URL.indexOf('?') > 0) {
        americaURL = document.URL.substring(0, document.URL.indexOf('?'));
    } else {
        americaURL = document.URL;
    }
    if (document.links[i].href == americaURL) {
        document.links[i].className = 'active';
    }
}

function openNav() {
    document.getElementById("theSideNav")
        .style.width = "256px";
    var x = document.getElementById("theSideNav");
    if (x.className === "sidenav sidenav-fixed") {
        x.className += " responsive";
    }
}

function closeNav() {
    if (document.documentElement.clientWidth < 856) {
        document.getElementById("theSideNav")
            .style.width = "0";
    }
}

$(document)
    .ready(function () {
        $(window)
            .resize(function () {
                if ($(window)
                    .width() > 855)
                    document.getElementById("theSideNav")
                    .style.width = "256px";

                if (($(window)
                        .width()) < 856) {
                    $('#closebtn')
                        .trigger('click');
                }
            });
    });
$(document)
    .ready(function () {
        $(window)
            .scroll(function () {
                var x1 = document.getElementById("theSideNav")
                    .style.width;

                if ($(window)
                    .scrollTop() > 120) {
                    $("#theSideNav")
                        .addClass('sidenav-fixed');

                    if (($(window)
                            .width()) < 856 && x1 == "256px") {
                        $('#hamburger')
                            .trigger('click');
                    }
                }

                if ($(window)
                    .scrollTop() < 121) {
                    $("#theSideNav")
                        .removeClass('sidenav-fixed');
                }
            });
    });

</script>

</body>
</html>
