<?php
if (!isset($_SESSION))
{
								session_start();
}

include "validate_admin.php";
include "connect.php";
include "header.php";
include "user_navbar.php";
include "admin_sidebar.php";
include "session_timeout.php";

if (isset($_GET['cust_id']))
{
								$_SESSION['cust_id']      = $_GET['cust_id'];
}

$sql0 = "DELETE FROM customer WHERE cust_id=" . $_SESSION['cust_id'];
$sql1 = "DROP TABLE journal" . $_SESSION['cust_id'];
$sql2 = "DROP TABLE beneficiary" . $_SESSION['cust_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
if (($conn->query($sql0) === true))
{ ?>
                    <p id="info"><?php echo "Customer Deleted Successfully !"; ?></p>
                <?php
}
else
{ ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
}
?>
        </div>

        <div class="flex-item">
            <?php
if (($conn->query($sql1) === true))
{ ?>
                    <p id="info"><?php echo "Customer's journal Deleted Successfully !"; ?></p>
                <?php
}
else
{ ?>
                    <p id="info"><?php echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
}
?>
        </div>

        <div class="flex-item">
            <?php
if (($conn->query($sql2) === true))
{ ?>
                    <p id="info"><?php echo "Customer's Payee Deleted Successfully !"; ?></p>
                <?php
}
else
{ ?>
                    <p id="info"><?php echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
}
?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./manage_customers.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
