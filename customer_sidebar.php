<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: center;
      color: #f2f2f2;
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
      font-size: 30px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #4CAF50;
      color: white;
    }
    </style>
</head>

<body>
  <center>
    <div class="topnav">
        <a  class="active" href="./customer_home.php">Home</a>
        <a  class="active" href="./customer_transactions.php">My Transactions</a>
        <a  class="active" href="./beneficiary.php">Transfer Funds</a>
        <a class="active" href="./complaints.php">Submit Complaints</a>
    </div>
</center>

</body>
</html>
