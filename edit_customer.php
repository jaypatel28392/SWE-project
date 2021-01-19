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
								$_SESSION['cust_id']               = $_GET['cust_id'];
}

$sql0          = "SELECT * FROM customer WHERE cust_id=" . $_SESSION['cust_id'];
$sql1          = "SELECT * FROM journal" . $_SESSION['cust_id'] . " WHERE trans_id=(
                    SELECT MAX(trans_id) FROM journal" . $_SESSION['cust_id'] . ")";

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
																$Status        = $row["Status"];

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
    <form class="add_customer_form" action="./edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h2 id="form_header">Edit/View Customer details:</h2>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Customer ID : <label id="info_label"> <?php echo $_SESSION['cust_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
                <input name="fname" size="30" type="text" value="<?php echo $fname ?>" required />
            </div>
            <div  class=container>
                <label>Last Name :</b></label><br>
                <input name="lname" size="30" type="text" value="<?php echo $lname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance : <label id="info_label"> <?php echo number_format($balance) ?> </label></label><br>
								<label>Edit balance from here :</b></label><br>
								<input name="balance" size="30" type="INT" value="<?php echo $balance ?>" required />
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
                <label>Date of Birth :</label><br>
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Social Security No :</label><br>
                <input name="social_number" size="25" type="text" value="<?php echo $social_number ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div  class=container>
                <label>Phone No. :</b></label><br>
                <input name="phno" size="30" type="text" value="<?php echo $phno ?>" required />
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
                <label>Bank Branch :</label>
            </div>
            <div  class=container>
              <select name="branch">
                  <option value="Atlanta">Atlanta</option>
                  <option value="Johns Creek">Johns Creek</option>
                  <option value="Sandy Springs">Sandy Springs</option>
              </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No :</label><br>
                <input name="acno" size="25" type="text" value="<?php echo $acno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>PIN(4 digit) :</b></label><br>
                <input name="pin" size="15" type="text" value="<?php echo $pin ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="text" value="<?php echo $cus_pwd ?>" required />
            </div>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>Status : </label>
            </div>
            <div  class=container>
                <select name="Status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="flex-container">
            <div class="container">
                <a href="./manage_customers.php" class="button">Go Back</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
        </div>

    </form>

</body>
</html>
