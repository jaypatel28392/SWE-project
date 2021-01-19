 <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url("fonts.css");

body {
    margin: 0;
    padding: 0;
    background-color: #ebebeb;
}

.flex-container-header {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: 150px;
    background-color: #201D1D;
}

.flex-item-header {
    width: auto;
    height: 100px;
    margin: 10px;
}

h1 {
    font-family: OpenSans-Light;
    color: white;
    font-size: 120px;
    line-height: 3rem;
    margin-top: calc((1.5rem - 2rem) + 2.5rem);
    margin-bottom: 1.5rem;
}

@media screen and (max-width: 855px) {
  h1 {
      font-size: 2.5rem;
      line-height: 2.5rem;
      margin-top: calc((1.5rem - 2rem) + 2rem);
      margin-bottom: 1.5rem;
  }
}

@media screen and (max-width: 510px) {
  h1 {
      font-size: 2rem;
      line-height: 2rem;
      margin-top: calc((1.5rem - 2rem) + 1.5rem);
      margin-bottom: 1.5rem;
  }
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
</head>
<body>
    <div class="flex-container-header"class="center">
        <div class="flex-item-header"class="center">
            <img src="images/GrowMore.gif" width="200" height="120"class="center">
        </div>
        <div class="flex-item-header"class="center">
            <h1><font style="color:green">Grow</font>More</h1>
        </div>
    </div>
</body>
</html>
