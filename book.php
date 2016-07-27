<?php
  require_once ("__appconfig.php");
  require_once ("__pageconfig.php");
  require_once("class.core.php");
  require_once("class.user.php");
  require_once("session.php");
  //session_start();
  $auth_user = new USER();
  $user_id = $_SESSION['user_session'];
  $stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $debug = (isset($_GET['debug']) && !empty($_GET['debug'])) ? max(1, intval($_GET['debug'])) : 0;
?>
<!DOCTYPE html>
<html>
  <head>
      <?php include "inc/head.php"; ?>
      <?php // include "inc/responsiveGridSystem.php"; ?>      
      <?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
      <?php pcaPredict(PCAPREDICT_KEY); ?>
      <title>Book::<?php print($userRow['user_name']); ?></title>
  </head>

  <style type="text/css">
    
        .modal-dialog,
        .modal-content {
            /* 80% of window height */
            height: 80%;
        }

        .modal-body {
            /* 100% = dialog height, 120px = header + footer */
            height: calc(100% - 120px);
            overflow-y: scroll;
            border:1px solid black;
          }

        .tab-end {
          width:36px;
          border: 1px solid black;
        }

        #BookGo {display: none;}
        .tabtop {
          width: 16.5%; 
          padding: 0px -1px;
          margin: 0px -1px;
        }
        
        #NealesCard {

          padding-left:4px;
          margin-left: 12px;
          align:center;
          border:1px solid white;
          background-color: #511d21;
          border-radius: 12px;
          width: 90%;
          min-height: 20px;
          height: 200px;
        }


  </style>

  <body>
      <div class="desktop maincnt">
          <div class="maincntinner" style="max-width:500px;">

              <div class="header">
                <a id="top" href="<?=$home?>"><img alt="neales-header" scale="no" src="assets/img/header.png"></a>
                <a class="button button-home" href="<?=$home?>">
                  <img class="neales-home" alt="neales-home" src="assets/img/home.png">
                 </a>
                 <div style="display: none;"></div>
              </div>
 
              <header>
                  <?php// include "inc/nav_main.php"; ?>
              </header>

              <div class="icontent">
                  <div class="iitems">
                      Status: <div id="successStatus" style="display:inline-block"></div>

                          <div class="panel with-nav-tabs panel-default">
                              <div class="panel-heading flush1">
                                      <ul class="nav nav-tabs"  style="align:center; width:105%;">

                                          <li class="tabtop active"><a href="#tab1default" data-toggle="tab"><i class="fa fa-2x fa-clock-o" aria-hidden="true"></i></a></li>

                                          <li class="tabtop"><a href="#tab2default" data-toggle="tab"><i class="fa fa-2x fa-globe" aria-hidden="true"></i></a></li>

                                          <li class="tabtop"><a href="#tab3default" data-toggle="tab">
                                            <i class="fa fa-2x fa-male" aria-hidden="true"></i>
                                          </a></li>

                                          <li class="tabtop"><a href="#tab4default" data-toggle="tab"><i class="fa fa-2x fa-credit-card" aria-hidden="true"></i></a></li>

                                          <li class="tabtop"><a href="#tab5default" data-toggle="tab"><i class="fa fa-2x fa-taxi" aria-hidden="true"></i></a></li>

                                          <li class="tabtop"><a href="#tab6default" data-toggle="tab"><i class="fa fa-2x fa-map-o" aria-hidden="true"></i></a></li>


                                      </ul>
                              </div>


                              <div class="panel-body flush2 frame">

                                  <div class="tab-content" style="margin:0px;">

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
                                        <?php include "tab_vehicle.php"; ?>
                                      </div>

                                      <div class="tab-pane fade" id="tab6default">
                                        <?php include "tab_map.php"; ?>
                                      </div>

                                  </div>

                                  <button class="push button-submit" id="BookGo">Book</button>
                              </div><!-- End of tab content -->

                          </div><!-- End of Nav tabs + content -->
                      </div>
                  </div>

                  <?php include "book5modal.php"; ?>

              </div>
            </div>

        <?php include "inc/end_header.php"; ?>
     <?php
          $list = [
              "//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js",
              "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",
              "js/jquery-ui.js",
              "js/jquery.postcodes.min.js",
              "js/jquery.timepicker.js",
              "js/simplecounter.js",
              "js/mapGeoloc.js",
              "js/book5listeners.js"
          ];

          addScripts($list);
      ?>        

        <script>
            $(document).ready(function() {
                appMaster.maps();
            });
        </script>

        <script>
        var StartDate = '<?php echo date("l, j M, Y");?>';
          console.log(StartDate);
          $("#departDate").text("j");
        </script>


  </body>
</html>