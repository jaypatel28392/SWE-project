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

if (isset($_SESSION['loggedIn_cust_id']))
{
								$sql              = "SELECT * FROM journal" . $_SESSION['loggedIn_cust_id'];
}
if (isset($_GET['sort']))
{
								$sort             = $_GET['sort'];
}
if (isset($_POST['search_term']))
{
								$_SESSION['search_term']                  = $_POST['search_term'];
}
if (isset($_POST['date_from']))
{
								$_SESSION['date_from']                  = $_POST['date_from'];
}
if (isset($_POST['date_to']))
{
								$_SESSION['date_to']                  = $_POST['date_to'];
}
$filter_indicator = "None";

if (empty($_SESSION['search_term']))
{
								if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to']))
								{
																$sql .= " WHERE trans_date > '" . $_SESSION['date_from'] . " 00:00:00'";
																$filter_indicator = "Date From";
								}
								if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to']))
								{
																$sql .= " WHERE trans_date < '" . $_SESSION['date_to'] . " 23:59:59'";
																$filter_indicator = "Date To";
								}
								if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to']))
								{
																$sql .= " WHERE trans_date BETWEEN '" . $_SESSION['date_from'] . " 00:00:00' AND '" . $_SESSION['date_to'] . " 23:59:59'";
																$filter_indicator = "Date From & Date To";
								}
}

if (isset($_GET['sort']))
{
								if ($sort == 'tid_down')
								{
																$sql .= " ORDER BY trans_id ASC";
								}
								if ($sort == 'tid_up')
								{
																$sql .= " ORDER BY trans_id DESC";
								}
								if ($sort == 'date_down')
								{
																$sql .= " ORDER BY trans_date ASC";
								}
								if ($sort == 'date_up')
								{
																$sql .= " ORDER BY trans_date DESC";
								}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Style>
    .flex-container {
        display: -webkit-flex;
        display: flex;

        width: auto;
        height: auto;
        padding-top: 20px;
        flex-direction: column;
        overflow-x: auto;
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

    label[id="sort"] {
        display: block;
        float: left;
        color: #212121;
        font-family: OpenSans-Regular;
        font-size: 26px;
        background-color: #D4EDD3;


        margin: 12px;
        margin-right: 0px;
        height: 45px;
        padding-top: 5px;
        padding-left: 5px;
    }

    select {
        font-family: OpenSans-Regular;
        color: #212121;
        font-size: 24px;
        background: url("images/down_arrow.png") 96% / 15% no-repeat #eee;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #D4EDD3;
        margin: 12px;
        margin-left: 10px;
        height: 56px;
        width: 150%;
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

    @media screen and (max-width: 400px) {
        select {
            width: 100%;
        }

        label[id="sort"] {
            background: url("images/sort.png") no-repeat ;
            background-color: white;
            margin-right: -50px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

        button[id="search"] {
            background: url("images/filter.png") no-repeat ;
            background-color: white;
            margin-right: -40px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }
    }

    .flex-container-bb {
        display: -webkit-flex;
        display: flex;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 27px;
    }

    button[id="search"] {
        font-family: OpenSans-Regular;
        color: #212121;
        font-size: 26px;
        background-color: white;
        cursor: pointer;
        height: 40px;
        margin-top: 12px;
        padding-top: 5px;
        padding-bottom: 45px;
        border: 3px solid #212121;
    }


    button[id="search"]:hover {
        background-color: #BDBDBD;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #448AFF;
        box-sizing: border-box;
        border-radius: 3px;
        background-color: transparent;
        color: black;
    }

    label {
        display: block;
        float: left;
        color: #212121;
        font-family: OpenSans-Bold;
        font-size: 20px;
    }

    button[id="submit"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        font-family: OpenSans-Bold;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        margin-left: 40%;
        margin-top: 5%;
        cursor: pointer;
        box-shadow: 2px 2px 4px #888888;
        border-radius: 3px;
    }

    button[id="submit"]:hover {
        box-shadow: 5px 5px 20px #888888;
    }

    .imgcontainer {
        text-align: center;
        margin-right: -20px;
        margin-top: -5px;
        position: relative;
    }

    .container {
        padding: 16px;
    }

    .duration-container {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        width: 100%;
    }

    .date-container {
        width: 150px;
    }

    h1[id="filter"] {
        color: #212121;
        font-family: OpenSans-Light;
    }

    p[id="filter"] {
        color: #212121;
        margin-top: -25px;
        border-bottom: 3px solid #212121;
        font-family: OpenSans-Regular;
        font-size: 20px;
    }


    p[id="minus"] {
        margin-right: 10px;
        margin-left: 10px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    .model {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    .model-content {
        background-color: #FAFAFA;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 3px;
    }

    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
    }

    @keyframes animatezoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }

    @media screen and (max-width: 300px) {
        span.psw {
           display: block;
           float: none;
        }
    }
    @media screen and (max-width: 855px) {
        .flex-container, .search-bar-wrapper .search-bar {
            margin-left: auto;
        }
    }

    #transactions {
        font-family: OpenSans-Regular;
        border-collapse: collapse;
        width: 80%;
        margin: auto;
    }

    @media screen and (max-width: 1280px) {
        #transactions {
            width: 95%;
        }
    }

    @media screen and (max-width: 855px) {
        #transactions {
            width: 85%;
        }
    }

    #transactions td, #transactions th {
        text-align: center;
        border: 1px solid #ddd;
        padding: 8px;
    }

    #transactions tr:nth-child(even){background-color: #f2f2f2;}

    #transactions tr:hover {background-color: #ddd;}

    #transactions th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #4CAF50;
        color: white;
    }

    p[id="none"] {
        margin: auto;
        font-size: 40px;
        color: #212121;
        font-family: Roboto-Regular;
    }

    </style>
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <button id="search" onclick="document.getElementById('id01').style.display='block'">Filter</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="flex-item-by">
                    <label id="sort">Sort By :</label>
                </div>
&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="flex-item-search-by">
                    <select name="by" onChange="window.location.href=this.value">
                        <option selected disabled hidden>
                            <?php if (empty($_GET['sort']))
{ ?>&nbsp;Date &darr;<?php
}
else
{ ?>
                                <?php if ($sort == 'tid_down')
								{ ?>&nbsp;&nbsp;Transaction ID &darr;<?php
								} ?>
                                <?php if ($sort == 'tid_up')
								{ ?>&nbsp;&nbsp;Transaction ID &uarr;<?php
								} ?>
                                <?php if ($sort == 'date_down')
								{ ?>&nbsp;Date &darr;<?php
								} ?>
                                <?php if ($sort == 'date_up')
								{ ?>&nbsp;Date &uarr;<?php
								} ?>
                            <?php
} ?>
                        </option>
                        <option value="customer_transactions.php?sort=date_down">Date &darr;</option>
                        <option value="customer_transactions.php?sort=date_up">Date &uarr;</option>
                        <option value="customer_transactions.php?sort=tid_down">Transaction ID &darr;</option>
                        <option value="customer_transactions.php?sort=tid_up">Transaction ID &uarr;</option>

                    </select>
                </div>

            </div>
        </div>
    </div>

    <div id="id01" class="model">

      <form class="model-content animate" action="" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Filter">&times;</span>
        </div>

        <div class="container">
            <h2 id="filter">Filter</h2>

          <label>Duration (yyyy-mm-dd) :</label>
          <div class="duration-container">
              <div class="date-container">
                  <input id="date" type="text" placeholder="From" name="date_from">
              </div>
              <p id="minus">&minus;<b</p>
              <div class="date-container">
                  <input id="date" type="text" placeholder="Upto" name="date_to">
              </div>
          </div>


          <button id="submit" type="submit">Go</button>
        </div>

      </form>
    </div>



    <div class="flex-container">

        <?php
$result       = $conn->query($sql);

if ($result->num_rows > 0)
{ ?>
                <table id="transactions">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Date & Time</th>
                        <th>Remarks</th>
                        <th>Debit </th>
                        <th>Credit </th>
                        <th>Balance </th>
                    </tr>
        <?php
								while ($row          = $result->fetch_assoc())
								{ ?>
                    <tr>
                        <td><?php echo $row["trans_id"]; ?></td>
                        <td>
                            <?php
																$time         = strtotime($row["trans_date"]);
																$america_time = date("m/d/Y, g:i A", $time);
																echo $america_time;
?>
                        </td>
                        <td><?php echo $row["remarks"]; ?></td>
                        <td><?php echo number_format($row["debit"]); ?></td>
                        <td><?php echo number_format($row["credit"]); ?></td>
                        <td><?php echo number_format($row["balance"]); ?></td>
                    </tr>
            <?php
								} ?>
            </table>
            <?php
}
else
{ ?>
                <p id="none"> No results found</p>
            <?php
}
$conn->close(); ?>

    </div>

    <script>
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

            var model = document.getElementById('id01');

            window.onclick = function (event) {
                if (event.target == model) {
                    model.style.display = "none";
                }
            }
        });
    </script>

</body>
</html>
