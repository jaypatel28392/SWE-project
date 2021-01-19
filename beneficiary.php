<?php
if (!isset($_SESSION))
{
								session_start();
}

include "validate_customer.php";
include "connect.php";
include "header.php";
include "customer_navbar.php";
include "customer_sidebar.php";
include "verify_beneficiary.php";
include "session_timeout.php";

if (isset($_SESSION['loggedIn_cust_id']))
{
								$sql0           = "SELECT * FROM beneficiary" . $_SESSION['loggedIn_cust_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .flex-container {
        display: -webkit-flex;
        display: flex;
        width: auto;
        height: auto;
        padding-top: 20px;
        margin-bottom: 100px;
        flex-direction: column;
    }

    .flex-container-bb {
        display: -webkit-flex;
        display: flex;
        margin: 30px;
        margin-left: auto;
        margin-right: auto;
    }

    .search-bar-wrapper {
        height: 100px;
    }

    .search-bar-wrapper .search-bar {
        display: -webkit-flex;
        display: flex;
        position: relative;
        width: auto;
        height: 100px;
        flex-direction: column;
        background-color: #D4EDD3;
        box-shadow: 0 8px 8px -6px black;
        overflow: hidden;
    }

    form {
        display: -webkit-flex;
        display: flex;
        flex-direction: row;
        width: inherit;
        height: inherit;
    }

    input[type=text] {
        font-family: Roboto-Regular;
        color: #212121;
        font-size: 24px;
        height: 56px;
        width: 108vw;
        max-width: 280px;
        margin-top: 12px;
        padding: 1px 1px;
        bottom: 0;
        border: 3px solid #212121;
        box-sizing: border-box;
        background-color: white;
        border-radius: 20px;
    }

    button[id="search"] {
        font-family: Roboto-Regular;
        background: url(images/search.png) no-repeat;
        background-color: white;
        cursor: pointer;
        width: 55px;
        height: 40px;
        padding-bottom: 50px;
        border: 3px solid #212121;
        border-radius: 20px;

    }

    .add-button {
        font-family: OpenSans-Regular;
        color: #212121;
        font-size: 26px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        background-color: white;
        cursor: pointer;
        margin-top: 12px;
        margin-right: 12px;
        height: 40px;
        padding: 5px 16px;
        border: 3px solid #212121;
    }

    @media screen and (max-width: 855px) {
        .add-button {
            margin-right: 0px;
            border-right: 0;
            padding: 5px 8px;
        }
    }

    button[id="search"]:hover {
        background-color: #BDBDBD;
    }

    label {
        display: block;
        float: left;
        color: #212121;
        font-family: OpenSans-Regular;
        font-size: 26px;
        background-color: #D4EDD3;
        border: 0px solid #212121;
        border-right: 0;
        margin: 12px;
        margin-right: 0px;
        height: 45px;
        padding-top: 5px;
        padding-left: 5px;
    }

    select {
        font-family: OpenSans-Regular;
        color: #212121;
        font-size: 20px;
        background: url("images/down_arrow.png") 96% / 15% no-repeat #eee;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: white;
        border: 3px solid #212121;
        border-radius: 30px;
        margin: 12px;
        margin-left: 0px;
        height: 56px;
        width: 95px;
    }

    @media screen and (max-width: 855px) {
        label {
            display: none;
        }
    }

    .flex-item-search-bar {
        display: -webkit-flex;
        display: flex;
        flex-direction: row;
        margin: auto;
        width: auto;
        height: auto;
    }

    .search-bar-wrapper .search-bar-fixed {
        width: 100%;
        top: 53px;
        bottom: 0;
        z-index: 1;
        position: fixed;
    }

    .fi-search-bar-fixed {
        position: relative;
        left: -128px;
    }

    .flex-container-label {
        width: auto;
        flex: 1 1 100px;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        font-family: OpenSans-Bold;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        margin-left: 20px;
        margin-right: 20px;
        cursor: pointer;
        box-shadow: 2px 2px 4px #888888;
        border-radius: 3px;
    }

    .button:hover {
        box-shadow: 5px 5px 20px #888888;
    }

    .flex-item {
        display: -webkit-flex;
        display: flex;
        flex-direction: row;
        margin: auto;
        margin-top: 10px;
        width: auto;
        height: auto;
        background-color: #D4EDD3;
        border-radius: 3px;
        box-shadow: 0px 2px 2px #888888;
    }

    .flex-item-1 {
        flex: 1;
        height: 80px;
        margin: 5px;
        background-color: #D4EDD3;
    }

    .flex-item-2 {
        width: 360px;
        height: auto;
        margin: 5px;
        background-color: #D4EDD3;
    }

    @media screen and (max-width: 855px) {
        .flex-container, .search-bar-wrapper .search-bar {
            margin-left: auto;
        }

        .flex-item-2 {
            width: 250px;
        }
    }

    @media screen and (max-width: 370px) {
        .flex-container {
            margin-left: auto;
            overflow-x: scroll;
        }
    }

    p[id="info"] {
        text-align: center;
        font-size: 40px;
        color: #212121;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 12px 32px;
        font-family: Roboto-Regular;
        border: 2px solid #D4EDD3;
        border-radius: 7px;
        background-color: #F5F5F5;
    }

    p[id="id"] {
        text-align: center;
        font-size: 40px;
        color: #212121;
        margin: auto;
        font-family: Roboto-Regular;
    }

    p[id="name"] {
        margin-top: 0px;
        margin-left: 20px;
        font-size: 40px;
        color: #212121;
        font-family: Roboto-Regular;
    }

    p[id="acno"] {
        margin-top: -35px;
        margin-left: 20px;
        font-size: 20px;
        color: #212121;
        font-family: Roboto-Regular;
    }

    p[id="none"] {
        margin: auto;
        font-size: 40px;
        color: #212121;
        font-family: Roboto-Regular;
    }

    .dropbtn {
        background: url("menu.png") no-repeat;
        margin-left: 10px;
        margin-top: 10px;
        padding-top: 46px;
        padding-left: 36px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
        opacity: 0.8;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        margin-top: -10px;
        margin-left: 20px;
    }

    @media screen and (max-width: 1100px) {
        .dropdown-content {
            right: 0;
            margin-right: 17px;
        }
    }
    .dropdown-content a {
        font-family: OpenSans-Regular;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}
    .show {display:block;}
    </style>
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <a class="add-button" href="./add_beneficiary.php">Add</a>


                </form>

            </div>
        </div>
    </div>

    <div class="flex-container">
        <p id="info">Send to, Add/Delete Payees</p>
        <?php
$result         = $conn->query($sql0);
$isBenefPresent = 0;
$back_button    = false;

if ($result->num_rows > 0)
{
								$i              = 0;
								while ($row            = $result->fetch_assoc())
								{
																$i++;

																if (isset($_POST['submit']))
																{
																								$back_button    = true;
																								$search         = $_POST['search'];
																								$by             = $_POST['by'];

																								if ($by == "name")
																								{
																																$sql1           = "SELECT cust_id, first_name, last_name, account_no FROM customer
                        WHERE cust_id=" . $row["benef_cust_id"] . " AND (first_name LIKE '%$search%'
                        OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%')";
																								}
																								else
																								{
																																$sql1           = "SELECT cust_id, first_name, last_name, account_no FROM customer
                        WHERE cust_id=" . $row["benef_cust_id"] . " AND account_no LIKE '$search'";
																								}
																}
																else
																{
																								$sql1           = "SELECT cust_id, first_name, last_name, account_no
                             FROM customer WHERE cust_id=" . $row["benef_cust_id"];
																}

																$result1        = $conn->query($sql1);
																if ($result1->num_rows > 0)
																{
																								$isBenefPresent = 1;
																								$row1           = $result1->fetch_assoc();
?>

                    <div class="flex-item">

                        <div class="flex-item-2">
                            <p id="name"><?php echo $row1["first_name"] . " " . $row1["last_name"]; ?></p>
                            <p id="acno"><?php echo "Account Number: : " . $row1["account_no"]; ?></p>
                        </div>
                        <div class="flex-item-1">
                            <div class="dropdown">

                              <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                              <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                                <a href="./send_funds.php?cust_id=<?php echo $row1["cust_id"] ?>">Send</a>
                                <a href="./delete_beneficiary.php?cust_id=<?php echo $row1["cust_id"] ?>"
                                     onclick="return confirm('Are you sure?')">Delete</a>
                              </div>
                            </div>
                        </div>
                    </div>

            <?php
																}
								}
}

if ($isBenefPresent == 0)
{ ?>
                <p id="none"> No beneficiaries found :(</p>
            <?php
}
if ($back_button)
{ ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="./beneficiary.php" class="button">Go Back</a>
                    </div>
                </div>
            <?php
}
$conn->close(); ?>
    </div>

    <script>
    function dropdown_func(i) {
        var doc_id = "dropdown".concat(i.toString());

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

        document.getElementById(doc_id)
            .classList.toggle("show");
        return false;
    }

    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;

            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    $(document)
        .ready(function () {
            var curr_scroll;

            $(window)
                .scroll(function () {
                    curr_scroll = $(window)
                        .scrollTop();

                    if ($(window)
                        .scrollTop() > 120) {
                        $("#the-search-bar")
                            .addClass('search-bar-fixed');

                        if ($(window)
                            .width() > 855) {
                            $("#fi-search-bar")
                                .addClass('fi-search-bar-fixed');
                        }
                    }

                    if ($(window)
                        .scrollTop() < 121) {
                        $("#the-search-bar")
                            .removeClass('search-bar-fixed');

                        if ($(window)
                            .width() > 855) {
                            $("#fi-search-bar")
                                .removeClass('fi-search-bar-fixed');
                        }
                    }
                });
            $(window)
                .resize(function () {
                    var class_name = $("#fi-search-bar")
                        .attr('class');

                    if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window)
                            .width() < 856)) {
                        $("#fi-search-bar")
                            .removeClass('fi-search-bar-fixed');
                    }

                    if ((class_name == "flex-item-search-bar") && ($(window)
                            .width() > 855) && (curr_scroll > 120)) {
                        $("#fi-search-bar")
                            .addClass('fi-search-bar-fixed');
                    }
                });
        });

    </script>

</body>
</html>
