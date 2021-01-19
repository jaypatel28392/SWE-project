<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body, html {
    height: 100%;
    background: url("images/home2.jpg") no-repeat center fixed;

    background-size: cover;
}

.flex-container-background {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    overflow: auto;
    width: auto;
}

.flex-container {
    display: -webkit-flex;
    display: flex;
}

.flex-item {
    margin: auto;
    margin-top: 0px;
    margin-left: 10px;
    background: transparent;
}

.flex-item-0 {
    margin: auto;
    width: 100%;
    background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
}

.flex-item-1 {
    margin: auto;
    margin-top: 50px;
    background: rgba(0, 0, 0, .5);
    width: 500px;
    border-radius: 20px;
}

@media screen and (max-width: 540px) {
    .flex-item-1 {
        margin-top: 0px;
        width: 300px;
    }
}

@media screen and (max-width: 340px) {
    .flex-item-1 {
        margin-top: 0px;
        width: auto;
    }
}

h1[id="form_header"] {
    line-height: 60px;
    font-family: Roboto-Thin;
    font-size: 70px;
    text-align: center;
    color: Black;
}

form {
    border: 0px solid #f1f1f1;
    border-radius: 50px;
}

h2 {
    font-family: OpenSans-Light;
    color: white;
    font-size: 40px;
    margin-left: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
}

.flex-item-login {
    margin: auto;
    margin-top: 0px;
    margin-bottom: 5px;
    background-color: transparent;
}

input[type=text], input[type=password] {
    font-family: Roboto-Regular;
    color: #212121;
    font-size: 18px;
    width: 90%;
    height: 40px;
    margin: 10px;
    padding: 1px 1px;
    bottom: 0;
    border: 0;
    box-sizing: border-box;
    background-color: white;
    border-radius: 100px;
}

button {
    background-color: #4CAF50;
    border: none;
    color: white;
    font-family: OpenSans-Regular;
    padding: 10px 100px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 10px;
    cursor: pointer;
    border-radius: 10px;
}
button:hover {
    opacity: 0.8;
}


</style>
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Together We Grow</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="customer_login_action.php" method="post">
                    <div class="flex-item-login">
                        <h2><center>Welcome</center></h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" style="text-align:center;"name="cust_uname" placeholder="Enter your Username" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" style="text-align:center;"name="cust_psw" placeholder="Enter your Password" required>
                    </div>
<center>
                    <div class="flex-item">
                        <button type="submit" >Login</button>
                    </div>
                  </center>
                </form>
                <center>
                <form action="https://www.tidio.com/talk/n92zwve9zduhpy50gd0qaq3bxtpzjlvd">
                <div class="flex-item">
                    <button type="submit" >Forget Password</button>
                </div>
                </form>
              </center>
            </div>
        </div>

    </div>

</body>
</html>
