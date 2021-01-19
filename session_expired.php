<?php

include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    background-color: #FAFAFA;
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
}

img[id="session"] {
    max-width: 100%;
    max-height: 100%;
}

.flex-item {
    width: auto;
    height: auto;
    margin: 10px;
    margin-left: auto;
    margin-right: auto;
}

.flex-item-message {
    width: auto;
    max-width: 500px;
    height: auto;
    margin: 10px;
    margin-left: auto;
    margin-right: auto;
}

h1[id="session"] {
    font-size: 40px;
    text-align: center;
    font-family: Roboto-Light;
    margin: 10px;
    margin-bottom: 20px;
    color: black;
    line-height: normal;
    border-bottom: 2px solid black;
}

h1[id="session-sub"] {
    font-size: 40px;
    text-align: center;
    font-family: Roboto-Light;
    margin: 10px;
    color: black;
    line-height: normal;
}

p[id="session-sub"] {
    font-size: 30px;
    text-align: center;
    font-family: Roboto-Regular;
    margin: 10px;
    margin-bottom: 20px;
    line-height: normal;
    border-bottom: 2px solid black;
}

p[id="session"] {
    font-size: 24px;
    font-family: Roboto-Regular;
    margin: 10px;
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
    margin: 10px;
    cursor: pointer;
    border-radius: 3px;
}

.button:hover {
    opacity: 0.8;
}

@media screen and (max-width: 480px) {
    h1[id="session"] {
        margin-top: 0px;
    }

    .button {
        margin-top: 0px;
    }
}
</style>

</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
        </div>
        <div class="flex-item-message">
            <h1 id="session">Session Expired !</h1>
            <p id="session">
                For security reasons if your account remains inactive for more
                than 15 minutes, you are automatically logged out.<br><br>
                Please sign-in again
            </p>
        </div>
        <div class="flex-item">
            <a href="./home.php" class="button">Go Home</a>
        </div>
    </div>

</body>
</html>
