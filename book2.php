<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Bootstrap and FontAwesome -->
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
      <link href="assets/css/basebook.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="css/idp.css">
    <title>IDP||Book2</title>
    <script>(function (a, c, b, e) {
        a[b] = a[b] || {}; a[b].initial = { accountCode: "NEALE11118", host: "NEALE11118.pcapredict.com" };
        a[b].on = a[b].on || function () { (a[b].onq = a[b].onq || []).push(arguments) }; var d = c.createElement("script");
        d.async = !0; d.src = e; c = c.getElementsByTagName("script")[0]; c.parentNode.insertBefore(d, c)
    })(window, document, "pca", "//NEALE11118.pcapredict.com/js/sensor.js");</script>

  </head>
  <body>

  Status:<div id="successStatus" style="display:none"></div>
  <!-- <button id="cufstomButton_1">Go</button> -->
  <div class="row">
    <div id="lookup_field" class="col-md-6">

        <div class="form-group input-group">
          <span class="input-group-addon full-width">
              <i id="custom" class="fa fa-2x fa-spin fa-globe" aria-hidden="true"></i>
          </span>
           <input id="originLookup" type="text" class="form-control ibtn text-field input-airport input-departure-airport" dvalue="L15 3JJ" placeholder="enter origin">
        </div>  
      </div>
    </div>

  <div class="row">
    <div id="lookup_field" class="col-md-6">

        <div class="form-group input-group">
          <span class="input-group-addon full-width">
              <i id="custom" class="fa fa-2x fa-spin fa-globe" aria-hidden="true"></i>
          </span>
           <input id="destinationLookup" type="text" class="form-control ibtn text-field input-airport input-departure-airport" dvalue="L15 3JJ" placeholder="enter destination">
        </div>  
      </div>
    </div>

    <div class="row">
        <div class="col-md-3">

          <div id="lookup_field"></div>

          <!-- Let's add some new input fields below to house the additional data points -->

          <label>Organisation Name</label>
          <input id="organisation_name" type="text">
          <label>Longitude</label>
          <input id="longitude" type="text">
          <label>Latitude</label>
          <input id="latitude" type="text">
          <label>Unique Delivery Point Reference Number</label>
          <input id="udprn" type="text">
              
          <label>Address Line One</label>
          <input id="first_line" type="text">
          <label>Address Line Two</label>
          <input id="second_line" type="text">
          <label>Address Line Three</label>
          <input id="third_line" type="text">
          <label>Post Town</label>
          <input id="post_town" type="text">
          <label>Postcode</label>
          <input id="postcode" type="text">

        </div>
        <div class="col-md-3">

          <div id="lookup_field_2"></div>

          <!-- Let's add some new input fields below to house the additional data points -->

          <label>Organisation Name</label>
          <input id="organisation_name" type="text">
          <label>Longitude</label>
          <input id="longitude" type="text">
          <label>Latitude</label>
          <input id="latitude" type="text">
          <label>Unique Delivery Point Reference Number</label>
          <input id="udprn" type="text">
              
          <label>Address Line One</label>
          <input id="first_line" type="text">
          <label>Address Line Two</label>
          <input id="second_line" type="text">
          <label>Address Line Three</label>
          <input id="third_line" type="text">
          <label>Post Town</label>
          <input id="post_town" type="text">
          <label>Postcode</label>
          <input id="postcode" type="text">

      </div>
      
    </div>

<!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
    <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.postcodes.min.js"></script>
    <script src="js/jquery.timepicker.js"></script>
    <script src="js/idplookup.js"></script>

</body>
</html>