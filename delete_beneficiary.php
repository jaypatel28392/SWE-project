<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
if (!isset($_SESSION))
{
								session_start();
}

include "validate_customer.php";
include "connect.php";
include "header.php";
include "customer_navbar.php";
include "customer_sidebar.php";
include "session_timeout.php";

if (isset($_GET['cust_id']))
{
								$sql0    = "DELETE FROM beneficiary" . $_SESSION['loggedIn_cust_id'] . " WHERE benef_cust_id=" . $_GET['cust_id'];
}

$success = 0;
if (($conn->query($sql0) === true))
{
								$sql0    = "SELECT MAX(benef_id) FROM beneficiary" . $_SESSION['loggedIn_cust_id'];
								$result  = $conn->query($sql0);
								$row     = $result->fetch_assoc();

								$id      = $row["MAX(benef_id)"] + 1;
								$sql1    = "ALTER TABLE beneficiary" . $_SESSION['loggedIn_cust_id'] . " AUTO_INCREMENT=" . $id;

								$conn->query($sql1);
								$success = 1;
}

if (isset($_GET['redirect']))
{
								$_SESSION['auto_delete_benef']         = true;
								header("location:./beneficiary.php");
}
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
if ($success = 1)
{ ?>
                        <p id="info"><?php echo "Payee Deleted Successfully !"; ?></p>
                    <?php
}
else
{ ?>
                        <p id="info"><?php echo "Error: " . $conn->error . "<br>"; ?></p>
                    <?php
}
?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
