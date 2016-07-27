<?php
  require_once("session.php");
  require_once("class.user.php");
  $auth_user = new USER();
  $user_id = $_SESSION['user_session'];
  $stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php 
    $home="_home.php";
    $debug = (isset($_GET['debug']) && !empty($_GET['debug'])) ? max(1, intval($_GET['debug'])) : 0;
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <!-- Bootstrap and FontAwesome -->
<!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
      <link href="assets/css/hiddenform.css" rel="stylesheet" type="text/css">
      <link href="css/jquery.timepicker.css" rel="stylesheet" type="text/css">
      <link href="css/jquery-ui.theme.css" rel="stylesheet" type="text/css">      
      <?php include "inc/ga.php"; ?>
      <?php include "inc/pcapredictMAMAE1113.php"; ?>
      <link rel="stylesheet" type="text/css" href="css/idp.css">
      <link href="assets/css/basebook.css" rel="stylesheet" type="text/css">
      <title>IDP||Book 3</title>
      <style type="text/css">
                  #map {
                    border:1px solid black;
                    margin: 0px;
                    padding: 0px;
                    min-width:320px;
                    min-height:600px;
                    width:100%;
                }
           
      </style>
  </head>
  <body>

      <div class="desktop maincnt">
          <div class="maincntinner">
              <div class="header">
                  <a id="top" href="<?=$home?>"><img alt="neales-header" scale="no" src="assets/img/header.png"></a>
                  <a class="button button-home" href="<?=$home?>">
                      <img class="neales-home" alt="neales-home" src="assets/img/home.png">
                  </a>
<!--                   <div style="display: none;"></div> -->
              </div>

              <div class="icontent">
                  <div class="iitems">

                <div class="row">
                      <div class="col-md-6">
                      Status:<div id="successStatus" style="display:none"></div>
                          <div class="panel with-nav-tabs panel-default">
                              <div class="panel-heading flush1">
                                      <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab1default" data-toggle="tab"><i class="fa fa-2x fa-clock-o" aria-hidden="true"></i><i class="fa fa-2x fa-globe" aria-hidden="true"></i></a></li>
                                          <li><a href="#tab2default" data-toggle="tab">
                                            <i class="fa fa-2x fa-male" aria-hidden="true"></i><i class="fa fa-2x fa-female" aria-hidden="true"></i>
                                          </a></li>

                                          <li><a href="#tab3default" data-toggle="tab"><i class="fa fa-2x fa-credit-card" aria-hidden="true"></i></a></li>

                                          <li><a href="#tab3default" data-toggle="tab"><i class="fa fa-2x fa-map-o" aria-hidden="true"></i></a></li>
                                         
                                      </ul>
                              </div>
                              <div class="panel-body flush2">
                                  <div class="tab-content">
                                      <div class="tab-pane fade in active" id="tab1default">

                                          <div class="ipanel form-panel-header">
                                              <div class="iitems">
                                                  <i class="fa fa-2x fa-globe" aria-hidden="true"></i> Where do you wish to go?
                                              </div>
                                          </div>

                                          <div id="where" class="accounttype">
                                              <input type="radio" value="None" id="radioOne" name="account" checked/>
                                              <label for="radioOne" class="radio">Single</label>
                                              <input type="radio" value="None" id="radioTwo" name="account" />
                                              <label for="radioTwo" class="radio">Shared</label>
                                          </div>


                                          <div class="ipanel form-panel-body3">
                                              <div class="iitems">
                                                <div class="form-group input-group">
                                                  <span class="input-group-addon full-width">
                                                      <i id="custom" class="fa fa-2x fa-spin fa-globe" aria-hidden="true"></i>
                                                  </span>
                                                   <input id="originLookup" type="text" class="form-control ibtn text-field input-airport input-departure-airport" placeholder="enter origin">
                                                </div> 

                                                <div class="form-group input-group">
                                                  <span class="input-group-addon full-width">
                                                      <i id="custom" class="fa fa-2x fa-spin fa-globe" aria-hidden="true"></i>
                                                  </span>
                                                   <input id="destinationLookup" type="text" class="form-control ibtn text-field input-airport input-departure-airport" placeholder="enter destination">
                                                </div>  
                                            </div>
                                          </div>
                                          
                                          <div class="ipanel form-panel-header">
                                              <div class="iitems"><i class="fa fa-2x fa-clock-o" aria-hidden="true"></i> When</div>
                                          </div>
                                          <div class="ipanel form-panel-body">
                                              <div class="iitems">
                                                  <div class="iitem formfield ">
                                                      <div class="iboxh">

                                                          <span class="ivalue left">
                                                            <input id="departDate" class="ibtn text-field input-normal input-date" type="text" value="<?php echo date("D j M"); ;?>">
                                                          </span>

                                                          <span class="ivalue left">
                                                              <input class="ibtn text-field input-normal input-time" id="departTime" type="text" value="<?php echo date("H:i ");?>">
                                                          </span>

                                                      </div>
                                                  </div>

                                              </div>
                                          </div>

                                      </div>



                                      <div class="tab-pane fade" id="tab2default">
                                        
                                          <div class="ipanel form-panel-header">
                                              <div class="iitems"><i class="fa fa-2x fa-male" aria-hidden="true"></i><i class="fa fa-2x fa-female" aria-hidden="true"></i> Passengers</div>
                                          </div>


                                          <div class="ipanel form-panel-body">
                                              <div class="iitems">
                                                  <div class="iitem formfield">
                                                      <div class="iboxh">
                                                          <span class="ilabel"><i class="fa fa-2x fa-user-plus" aria-hidden="true"></i>Adults
                                                              <span class="hint">(16+)</span>
                                                          </span>
                                                          <span class="ivalue">
                                                              <select class=" input-small" id="numAdults">
                                                                <option selected="true" value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                              </select>
                                                            </span>
                                                      </div>
                                                  </div>
                                                  <div class="iboxh">
                                                      <div class="iitem formfield">
                                                          <div class="ilabel" style="width: 60%; float: left;">
                                                              <i class="fa fa-2x fa-child" aria-hidden="true"></i> Children
                                                          </div>
                                                          <div class="ilabel" style="width: 40%; float: left;">
                                                              <span class="ivalue">
                                                                  <div class="ipanel ibtns">
                                                                  <i class="fa fa-2x fa-plus" aria-hidden="true"></i>
                                                                    <input class="ibtn button ibtn addChildInfantButton" id="selectPassengers" type="submit" value="0">
                                                                    <i class="fa fa-2x fa-minus" aria-hidden="true"></i>
                                                                  </div>
                                                              </span>
                                                              <div style="float: right; font-size: 28px; margin: 0px 15px 0px 0px">
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="iboxh">
                                                      <div class="iitem formfield">
                                                          <div class="ilabel" style="width: 60%; float: left;">
                                                              <i class="fa fa-2x fa-suitcase" aria-hidden="true"></i>&nbsp;Luggage
                                                          </div>
                                                          <div class="ilabel" style="width: 40%; float: left;">
                                                              <span class="ivalue">
                                                                  <div class="ipanel ibtns">
                                                                    <input class="ibtn button ibtn addChildInfantButton" id="selectPassengers" type="submit" value="0">
                                                                  </div>
                                                              </span>
                                                              <div style="float: right; font-size: 28px; margin: 0px 15px 0px 0px">
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>  
                                              </div>
                                          </div>
                                      </div>


                                      <div class="tab-pane fade" id="tab3default">
                                        <div class="ipanel form-panel-body">
                                          <div id="map"></div>
                                        </div>
                                      </div>

                                      <div class="tab-pane fade" id="tab4default">

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
</div>
</div>
</div>
</div>

  <!-- Scripts -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
      <script src="js/jquery-ui.js"></script>
      <script src="js/jquery.postcodes.min.js"></script>
      <script src="js/jquery.timepicker.js"></script>

        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg"></script>

       <script>
            var map;
            var drgflag=false;

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.6290494864026, lng: -0.749108865905153},
                draggable:drgflag,
                scrollwheel: false,
                zoom: 11
              });
            }

            $(function() {
        
              $("#departTime").timepicker({ 'scrollDefault': 'now' });
              $("#departDate").datepicker({ minDate: -0, maxDate: "+11M +10D" });
              initMap();
              map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.6290494864026, lng: -0.749108865905153},
                draggable:drgflag,
                scrollwheel: false,
                zoom: 11
              });

            });
      </script>

  </body>
</html>