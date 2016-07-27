<!DOCTYPE html>
<html>
<head>
	<title>Vehicle</title>
</head>
<body>

<style type="text/css">
h1 {
  margin: 2em 0 0;
  font-size: 2em;
  font-family: helvetica, ariel, sans-serif;
  text-align: center;
}

h2 {
  margin: 1em 0 2em;
  font-size: 1.4em;
  font-family: helvetica, ariel, sans-serif;
  text-align: center;
}

.codepen-wrapper {
  width: 25%;
  margin: 0 37.5%;
}

.registration-ui {
  background: linear-gradient(to bottom, #f8d038 0%, #f5ca2e 100%);
  padding: .25em 1em .25em 1.75em;
  font-weight: bold;
  font-size: 2em;
  border-radius: 5px;
  border: 1px solid #000;
  box-shadow: 1px 1px 1px #ddd;
  position: relative;
  font-family: helvetica, ariel, sans-serif;
}

.registration-ui:before {
  content: 'GB';
  display: block;
  width: 30px;
  height: 100%;
  background: #063298;
  position: absolute;
  top: 0;
  border-radius: 5px 0 0 5px;
  color: #f8d038;
  font-size: .5em;
  line-height: 85px;
  padding-left: 5px;
}

.registration-ui:after {
  content: '';
  display: block;
  position: absolute;
  top: 7px;
  left: 5px;
  width: 20px;
  height: 20px;
  border-radius: 30px;
  border: 1px dashed #f8d038;
}

</style>

<h1> UK Car Registration Number Plate </h1>
<h2> One div, two ::pseudo elements and no images</h2>

<div class="codepen-wrapper">
  <span class="registration-ui">N606 GUR</span>
</div>
    

</body>
</html>