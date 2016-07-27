<?php
  require_once ("__appconfig.php");
  require_once("class.core.php");
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
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/hiddenform.css" rel="stylesheet" type="text/css">
      <link href="css/jquery.timepicker.css" rel="stylesheet" type="text/css">
      <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
      <link href="css/simplecounter.css" rel="stylesheet" type="text/css">
      <link href="assets/css/basebook.css" rel="stylesheet" type="text/css">
      <?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
      <?php pcaPredict(PCAPREDICT_KEY); ?>
      <title>Book 5</title>
  </head>
  <body>
      <?php googleTagManager(GOOGLE_TAG_MANAGER);?>

      <div class="desktop maincnt style:="width:300px;">
          <div class="maincntinner">
              <div class="header">
                  <a id="top" href="<?=$home?>"><img alt="neales-header" scale="no" src="assets/img/header.png"></a>
                  <a class="button button-home" href="<?=$home?>">
                      <img class="neales-home" alt="neales-home" src="assets/img/home.png">
                  </a>
                  <div style="display: none;"></div>
              </div>

              <div class="icontent">
                  <div class="iitems">
                      Status: <div id="successStatus" style="display:inline-block"><?php echo $userRow['user_email']; ?></div>
                          <button class="button-submit" id="BookGo">Book</button>
                          <div class="panel with-nav-tabs panel-default">
                              <div class="panel-heading flush1">
                                      <ul class="nav nav-tabs">

                                          <li class="active"><a href="#tab1default" data-toggle="tab"><i class="fa fa-2x fa-clock-o" aria-hidden="true"></i></a></li>

                                          <li><a href="#tab2default" data-toggle="tab"><i class="fa fa-2x fa-globe" aria-hidden="true"></i></a></li>

                                          <li><a href="#tab3default" data-toggle="tab">
                                            <i class="fa fa-2x fa-male" aria-hidden="true"></i><i class="fa fa-2x fa-female" aria-hidden="true"></i>
                                          </a></li>

                                          <li><a href="#tab4default" data-toggle="tab"><i class="fa fa-2x fa-credit-card" aria-hidden="true"></i></a></li>

                                          <li><a href="#tab5default" data-toggle="tab"><i class="fa fa-2x fa-map-o" aria-hidden="true"></i></a></li>
                                         
                                      </ul>
                              </div>


                              <div class="panel-body flush2">
                                  <div class="tab-content">

                                      <div class="tab-pane fade in active" id="tab1default">
                                        <?php include "tab_when.php"; ?>
                                      </div>

                                      <div class="tab-pane fade" id="tab2default">
                                        <?php include "tab_where.php"; ?>
                                      </div>

                                      <div class="tab-pane fade" id="tab3default">
                                        <?php include "tab_paxCount.php"; ?>
                                      </div>

                                      <div class="tab-pane fade" id="tab4default">
                                        <?php include "tab_payment.php"; ?>
                                      </div>

                                      <div class="tab-pane fade" id="tab5default">
                                        <?php include "tab_map.php"; ?>
                                      </div>

                                  </div>

                              </div><!-- End of tab content -->

                          </div><!-- End of Nav tabs + content -->
                      </div>
                  </div>

                  <?php include "book5modal.php"; ?>

              </div>
            </div>

  <!-- Scripts -->
  <?php
      $list = [
          "//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js",
          "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",
          "js/jquery-ui.js",
          "js/jquery.postcodes.min.js",
          "js/jquery.timepicker.js",
          "js/simplecounter.js",
          "js/mapGeoloc.js",
          "js/book5listeners.js",
          googleMapsAPI(GOOGLE_MAPS_KEY)."&callback=pol"
          //"https://maps.googleapis.com/maps/api/js?key=AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg&callback=pol"          
      ];

      addScripts($list);
  ?>

  </body>
</html>