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
include "session_timeout.php";

$id            = $_SESSION['loggedIn_cust_id'];

$sql0          = "SELECT * FROM customer WHERE cust_id=" . $id;
$sql1          = "SELECT * FROM journal" . $id . " WHERE trans_id=(
                    SELECT MAX(trans_id) FROM journal" . $id . ")";

$result0       = $conn->query($sql0);
$result1       = $conn->query($sql1);

if ($result0->num_rows > 0)
{
								while ($row           = $result0->fetch_assoc())
								{
																$fname         = $row["first_name"];
																$lname         = $row["last_name"];
																$gender        = $row["gender"];
																$dob           = $row["dob"];
																$social_number = $row["social_number"];
																$email         = $row["email"];
																$phno          = $row["phone_no"];
																$address       = $row["address"];
																$branch        = $row["branch"];
																$acno          = $row["account_no"];
																$pin           = $row["pin"];
																$cus_uname     = $row["uname"];
																$cus_pwd       = $row["pwd"];
								}
}

if ($result1->num_rows > 0)
{

								while ($row           = $result1->fetch_assoc())
								{
																$balance       = $row["balance"];
								}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_profile_action.php" method="post">
        <div class="flex-container-form_header">
            <h2 id="form_header">Your Account Details:</h2>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name : <label id="info_label"><?php echo $fname ?></label></label>
            </div>
            <div class=container>
                <label>Last Name : <label id="info_label"><?php echo $lname ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No : <label id="info_label"><?php echo $acno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance ($) : <label id="info_label"><?php echo number_format($balance) ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Gender :
                    <label id="info_label">
                    <?php
if ($gender == "male")
{
								echo "Male";
}
elseif ($gender == "female")
{
								echo "Female";
}
else
{
								echo "Others";
}
?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Date of Birth : <label id="info_label"><?php echo $dob ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Social Security Number : <label id="info_label"><?php echo $social_number ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Phone No. : <label id="info_label"><?php echo $phno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Address :</label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Bank Branch :
                    <label id="info_label">
                      <?php
if ($branch == "Atlanta")
{
								echo "Atlanta";
}
elseif ($branch == "Johns Creek")
{
								echo "Johns Creek";
}
elseif ($branch == "Sandy Springs")
{
								echo "Sandy Springs";
}
?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="http://localhost:8888/Bank/customer_home.php" class="button">Home</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
            <div class="container">
                <a href="http://localhost:8888/Bank/pass_change.php" class="password-button">Change Password/PIN</a>
            </div>
        </div>

    </form>

</body>
</html>
