<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Budget Calculator</title>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/emojione/1.3.0/assets/css/emojione.min.css'>
<style>


p {
  margin: 0 0 10px;
}

i {
  background-repeat: no-repeat;
  background-size: 25px;
  background-position: center;
  width: 50px;
  height: 25px;
  display: inline-block;
}

i.frown {
  background-image: url("//cdnjs.cloudflare.com/ajax/libs/twemoji/1.2.1/36x36/1f612.png");
}

i.tear {
  background-image: url("//twemoji.maxcdn.com/72x72/1f613.png");
}

i.happy {
  background-image: url("//twemoji.maxcdn.com/72x72/1f603.png");
}

.title {
  margin: 0;
  display: inline-block;
}

.emoji {
  margin: 0 100 0 0px;
}

input {
  display: block;
  padding: 10px;
  margin: 12px auto;
  width: 40%;
  border-radius: 60px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
}

.results {
  min-height: 20px;
  padding: 19px;
  margin: 20px 0;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 60px;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
.results .results-data {
  margin: 1.5rem 0;
}



.text-sucess {
  color: #468847;
}

.text-danger {
  color: #b94a48;
}

.center-ct {
  position: absolute;
  top: 80%;
  width: 50%;
}
.example_d {
color: #20bf6b !important;
text-transform: uppercase;
background: #ffffff;
padding: 20px;
border: 4px solid #20bf6b !important;
border-radius: 6px;
display: inline-block;
transition: all 0.3s ease 0s;
}
.example_d:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}


@media (max-width: 768px) {
  .center-ct {
    position: relative;
    top: 20;
    margin-top: 100 !important;
  }
}
</style>
</head>
<body>
<h1>
  <h1><center>Budget Calculator</center></h1>
    <h5><center>A better way to crunch the numbers</center></h5>

    <div class="col-sm-6 col-sm-offset-1">
      <div align="center">
              <form>
  <input class="form-control input-lg" type="text" id="income" placeholder="Monthly Income"/>
  <input class="form-control input-lg" type="text" id="rent" placeholder="Rent"/>
  <input class="form-control input-lg" type="text" id="food" placeholder="Food"/>
  <input class="form-control input-lg" type="text" id="utilities" placeholder="Utilities"/>
  <input class="form-control input-lg" type="text" id="insurance" placeholder="Insurance"/>
      </form>
      <button class="button_cont example_d" align="center">continue</button>
    </div>
    <div class="col-sm-4">
      <div class="results" align="center">
        <h1 class="title">Results</h1>
        <span class="emoji">
        </span>
        <div class="results-data">
          <p>Hit that submit button to see your results!</p>
        </div>
</div>
    </div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/emojione/1.3.0/lib/js/emojione.min.js'></script>
<script>
$("button")
    .click(gather)
$(document)
    .ready(centerme);
$(window)
    .resize(centerme);

function gather() {
    income = document.getElementById("income")
        .value;
    income = income.replace(/\D/g, '');
    rent = document.getElementById("rent")
        .value;
    rent = rent.replace(/\D/g, '');
    utilities = document.getElementById("utilities")
        .value;
    utilities = utilities.replace(/\D/g, '');
    food = document.getElementById("food")
        .value;
    food = food.replace(/\D/g, '');
    insurance = document.getElementById("insurance")
        .value;
    insurance = insurance.replace(/\D/g, '');
    result = income - rent - utilities - food - insurance;
    savings = (income * 0.20);
    $(".results-data")
        .empty();
    $(".emoji")
        .empty();
    if (result === 0) {
        $(".results-data")
            .append('<p class="text-danger convert-emoji"> You haven\'t enter anything. Or You didn\'t save anything. Either way you have $0 for month.</p>');
        $(".emoji")
            .append('<i class="frown">&nbsp;</i>');
    } else if (result < 0) {
        $(".results-data")
            .append('<p class="text-danger"> After your expenses you have $' + result + ' left in your budget. You might want to try and reduce your spending this month.</p>');
        $(".emoji")
            .append('<i class="tear">&nbsp;</i>');
    } else {
        $(".results-data")
            .append(
                '<p class="text-sucess"> After your expenses you have $' + result + ' left in your budget.</p>', '<p class="text-sucess">But you should save at least $' + savings + '.</p>');
        $(".emoji")
            .append('<i class="happy">&nbsp;</i>');
    }
}

function centerme() {
    height = $(".center-ct")
        .height();
    middle = height / 2;
    $(".center-ct")
        .css("margin-top", "-" + middle + "px");
    console.log(height);
}

</script>

</body>
</html>
