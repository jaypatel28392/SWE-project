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
        -webkit-flex-direction: column;
        flex-direction: column;
        margin-left: 256px;
        width: auto;
        height: auto;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .flex-item {
        width: auto;
        height: auto;
        margin: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    h1[id="customer"] {
        margin: 20px;
        line-height: normal;
        font-family: Roboto-Light;
        font-size: 40px;
        text-align: center;
        color: #212121;
        line-height: 55px;
        border-bottom: 2px solid #212121;
        padding: 30px 100px;
    }

    p[id="customer"] {
        max-width: 600px;
        margin: 20px;
        font-size: 30px;
        font-family: Roboto-Regular;
        color: #212121;
        line-height: 42px;
        padding: 10px 100px;
    }

    @media screen and (max-width: 1080px) {
        h1[id="customer"] {
            padding: 30px 0px;
        }

        p[id="customer"] {
            padding: 10px 0px;
        }
    }

    @media screen and (max-width: 855px) {
        .flex-container {
            margin: auto;
        }
    }

    </style>
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Welcome Admin !
            </h1>
          <center>
            <p style="max-width:800px">
                "With great power comes great responsibility."
            </p></center>
<!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" preloader-text="Loading..." data-fw-param="140181/"></script> <!-- end feedwind code -->      </div>
    </div>

</body>
</html>
