<?php
include "header.php";
include "navbar.php";
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body, html {
    height: 100%;
    background-color: #fafafa;
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
}

.flex-item {
    -webkit-flex-direction: column;
    flex-direction: column;
    flex: 5 2 400px;
    background-color: #EEEEEE;
    width: auto;
    height: auto;
    max-height: 65vh;
    margin: 10px;
    overflow-y: auto;
    border-radius: 50px;
}

.flex-container-title {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    background-color: #201D1D;
}

.flex-container-body {
    display: -webkit-flex;
    display: flex;
    background-color: #2E7D32;
}

h3[id="title"] {
    margin-left: 40px;
    font-family: Roboto-Thin;
    font-weight: bold;
    font-size: 50px;
    color: #FAFAFA;
}

p[id="date"] {
    font-size: 20px;
    color: #FAFAFA;
    margin-left: 20px;
    font-family: Roboto-Regular;
}

p[id="news_body"] {
    font-size: 24px;
    margin-left: 20px;
    font-family: Roboto-Regular;
}
</style>
</head>

<body>
  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "Nasdaq 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "BTC/USD"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "ETH/USD"
    }
  ],
  "colorTheme": "dark",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
    <div class="flex-container">
        <?php
$sql0    = "SELECT id, title, created FROM news ORDER BY created DESC";
$result  = $conn->query($sql0);

if ($result->num_rows > 0)
{
								// output data of each row
								while ($row     = $result->fetch_assoc())
								{
																$id      = $row["id"];
																$sql1    = "SELECT body FROM news_body WHERE id=$id";
																$result1 = $conn->query($sql1); ?>

                <div class="flex-item">
                    <div class="flex-container-title">
                        <h3 id="title"><?php echo $row["title"] . "<br>"; ?></h3>
                    </div>
                    <div class="flex-container-title">
                        <p id="date"><?php echo "Date : " . date("m/d/Y", strtotime($row["created"])); ?></p>
                    </div>
                    <div class="flex-container-body">
                        <p id="news_body"><?php while ($row1 = $result1->fetch_assoc())
																{
																								echo $row1["body"];
																} ?></p>
                    </div>
                </div>

            <?php
								}
}
else
{
								echo "No news available ! Please post some.";
}
$conn->close();
?>
    </div>

</body>
</html>
