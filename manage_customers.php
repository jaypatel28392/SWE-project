<?php
include "validate_admin.php";
include "connect.php";
include "header.php";
include "user_navbar.php";
include "admin_sidebar.php";
include "session_timeout.php";

if (isset($_POST['submit']))
{
								$back_button = true;
								$search      = $_POST['search'];
								$by          = $_POST['by'];

								if ($by == "name")
								{
																$sql0        = "SELECT cust_id, first_name, last_name, account_no, Status FROM customer
            WHERE first_name LIKE '%" . $search . "%' OR last_name LIKE '%" . $search . "%'
            OR CONCAT(first_name, ' ', last_name) LIKE '%" . $search . "%'";
								}
								else
								{
																$sql0        = "SELECT cust_id, first_name, last_name, account_no, Status FROM customer
            WHERE account_no LIKE '$search'";
								}
}
else
{
								$back_button = false;

								$sql0        = "SELECT cust_id, first_name, last_name, account_no, Status FROM customer";
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
    margin-left: 256px;
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
    width: 18vw;
    max-width: 280px;
    margin-top: 12px;
    padding: 10px 1px;
    bottom: 0;
    border-radius: 40px;
    border:3px;
    box-sizing: border-box;
    background-color: ;
    text-align: center;
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
label {
    display: block;
    float: left;
    color: #212121;
    font-family: OpenSans-Regular;
    font-size: 26px;
    background-color: white;
    border: 0px solid #212121;
border-radius: 10px;
    margin: 12px;

    height: 45px;
    padding-top: 5px;
    padding-left: 5px;
}

select {
    font-family: OpenSans-Regular;
    color: #212121;
    font-size: 20px;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: white;

    margin: 12px;
    margin-left: 0px;
    height: 56px;
    width: 95px;
    text-align: center;
}

@media screen and (max-width: 855px) {
    label {
        display: none;
    }
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
    background-color: #E0E0E0;
    border-radius: 3px;
    box-shadow: 0px 2px 2px #888888;
}

.flex-item-1 {
    flex: 1;
    height: 80px;
    margin: 5px;
    background-color: transparent;
}

.flex-item-2 {
    width: 360px;
    height: auto;
    margin: 5px;
    background-color: transparent;
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
    border: 2px solid #00BCD4;
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
    text-align: center;
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


    <div class="flex-container">
        <?php
$result      = $conn->query($sql0);

if ($result->num_rows > 0)
{
								$i           = 0;
								while ($row         = $result->fetch_assoc())
								{
																$i++; ?>

                <div class="flex-item">

                    <div class="flex-item-2">
                        <p id="name"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></p>
                        <p id="acno"><?php echo "Account Number: : " . $row["account_no"]; ?></p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p id="acno"><?php echo "Status : " . $row["Status"]; ?></p>
                    </div>
                    <div class="flex-item-1">
                        <div class="dropdown">
                          <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                          <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                            <a href="./edit_customer.php?cust_id=<?php echo $row["cust_id"] ?>">View / Edit</a>
                            <a href="./transactions.php?cust_id=<?php echo $row["cust_id"] ?>">Transactions</a>
                            <a href="./delete_customer.php?cust_id=<?php echo $row["cust_id"] ?>"
                                 onclick="return confirm('Are you sure?')">Delete</a>
                          </div>
                        </div>
                    </div>
                </div>

            <?php
								}
}
else
{ ?>
                <p id="none"> No results found </p>
            <?php
}
if ($back_button)
{ ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="./manage_customers.php" class="button">Go Back</a>
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

    </script>

</body>
</html>
