<?php
include "header.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body, html {
    height: 100%;
    background: url("images/home2.jpg") no-repeat center center fixed;
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

.flex-container-heading {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, 0));
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    width: auto;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    background: rgba(0, 0, 0, .3);
    border: 2px solid #f1f1f1;
}

.flex-item {
    width: 500px;
    height: 200px;
    margin: 10px;
    margin-left: auto;
    margin-right: auto;
}

@media screen and (max-width: 500px) {
    .flex-item {
        width: auto;
        height: auto;
    }
}

h1[id="contact"] {
    line-height: normal;
    font-family: Roboto-Thin;
    font-size: 50px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    color: white;
}

h1[id="sub-contact"] {
    margin-top: 0px;
    margin-left: 10px;
    font-size: 30px;
    font-family: Roboto-Regular;
    color: white;
    line-height: normal;
}

p[id="sub-contact"] {
    margin-top: -10px;
    margin-left: 10px;
    font-size: 24px;
    font-family: Roboto-Regular;
    color: white;
    line-height: normal;
}

@media screen and (max-width: 1000px) {
    h1[id="sub-contact"] {
        text-align: center;
    }

    p[id="sub-contact"] {
        text-align: center;
    }
}
</style>
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container-heading">
            <h1 id="contact">Contact Us</h1>
        </div>

        <div class="flex-container" style="border-radius: 18px;">
            <div class="flex-item">
                <h1 id="sub-contact">Corporate Headquarters</h1>
                <p id="sub-contact">
                    GrowMore Bank<br>
                    Address - Georgia State University,<br>
                    Atlanta, GA 30302
                </p>
            </div>
            <div class="flex-item">
                <h1 id="sub-contact">General Contact</h1>
                <p id="sub-contact">
Atlanta	404-413-2000<br>
Alpharetta	678-240-6000<br>
Clarkston	678-891-3200<br>
Dunwoody	770-274-5000<br>
Email: office@growmorebank.com
                </p>
            </div>
        </div>
        <script src="//code.tidio.co/n92zwve9zduhpy50gd0qaq3bxtpzjlvd.js" async>  </script>
</body>
</html>
