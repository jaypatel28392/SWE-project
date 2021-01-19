<?php
include "validate_admin.php";
include "header.php";
include "user_navbar.php";
include "admin_sidebar.php";
include "session_timeout.php";
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
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

.flex-container-form_header {
    display: -webkit-flex;
    display: flex;
    margin-left: 256px;
    width: auto;
    height: auto;
    background-color: #FAFAFA;
    border-bottom: 3px solid #263238;
}

h1[id="form_header"] {
    margin-left: 20px;
    font-family: Roboto-Thin;
    color: #263238;
}

.flex-container-radio {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    background-color: #FAFAFA;
}

@media screen and (max-width: 855px) {
    .flex-container, .flex-container-form_header {
        margin-left: auto;
    }
}

form {
    border: 3px solid white;
    width: inherit;
    margin-left: 0px;
}

label {
    display: block;
    float: left;
    color: #212121;
    font-family: OpenSans-Bold;
    font-size: 20px;
}

label[id="info_label"] {
    display: block;
    float: left;
    margin-left: 6px;
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
}

input[type=text], input[type=password] {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
    width: auto;
    margin: 8px 0;
    padding: 1px 1px;
    border: 0;
    border-bottom: 1px solid #212121;
    box-sizing: border-box;
    background-color: transparent;
}

@media screen and (max-width: 480px) {
    input[type=text], input[type=password] {
        width: 300px;
    }

    label[id="info_label"] {
        display: block;
        float:none;
    }
}

@media screen and (max-width: 350px) {
    input[type=text], input[type=password] {
        width: 240px;
    }
}

.container {
    margin-top: 20px;
    margin-left: 20px;
    margin-left: 20px;
    float: left;
    display: inline-block;
}

input[type=radio] {
    display: none;
    background-color: white;
    float: left;
    padding: 1px 1px;
}

label[id="radio-label"] {
	background: url("images/radio_button_unchecked.png") left top no-repeat;
	display: block;
	min-height: 25px;
	padding-left: 35px;
}

input[type=radio]:checked + label {
	background: url("images/radio_button_checked.png") left top no-repeat;
}

textarea {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 24px;
    height: 100px;
    width:35vw;
    max-width: 720px;
    min-width: 240px;
    margin: 8px 0;
    padding: 1px 1px;
    border: 0;
    border: 1px solid #212121;
    box-sizing: border-box;
    background-color: transparent;
}

select {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 20px;
    background: url("images/down_arrow.png") 96% / 15% no-repeat #eee;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: transparent;
    width: 130%;
    padding: 4px 0;
    border: none;
    border-bottom: 1px solid #212121;
}

button {
    font-family: OpenSans-Regular;
    font-size: 18px;
    background-color: #00BCD4;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 3px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    font-family: OpenSans-Regular;
    font-size: 18px;
    padding: 14px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 3px;
    cursor: pointer;
}

.password-button {
    background-color: transparent;
    color: #d50000;
    font-family: OpenSans-Regular;
    font-size: 18px;
    padding: 14px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 3px;
    border: 2px solid #d50000;
    cursor: pointer;
}

.password-button:hover {
    background-color: #d32f2f;
    color: white;
    border: 2px solid #d32f2f;
}

button:hover, .button:hover {
    opacity: 0.8;
}

.reset {
    width: auto;
    background-color: #f44336;
}

</style>
</head>

<body>
    <form class="add_customer_form" action="customer_add_action.php" method="post">
        <div class="flex-container-form_header">
            <h2 id="form_header">Please fill in the following details:</h2>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
                <input name="fname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Last Name :</b></label><br>
                <input name="lname" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Gender :</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="gender" value="male" id="male-radio" checked>
                    <label id="radio-label" for="male-radio"><span class="radio">Male</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="female" id="female-radio">
                    <label id="radio-label" for="female-radio"><span class="radio">Female</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="others" id="other-radio">
                    <label id="radio-label" for="other-radio"><span class="radio">Others</span></label>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Date of Birth :</label><br>
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Social Security No :</label><br>
                <input name="social_number" size="25" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="email" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Phone No. :</b></label><br>
                <input name="phno" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Address :</label><br>
                <textarea name="address" required /></textarea>
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
                <input name="acno" size="25" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Initial Deposits:</label><br>
                <input name="o_balance" size="20" type="text" required />
            </div>
            <div  class=container>
                <label>PIN(4 digit) :</b></label><br>
                <input name="pin" size="15" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Username :</label><br>
                <input name="cus_uname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="text" required />
            </div>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>Status :</label>
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
                <button type="submit">Submit</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>

</body>
</html>
