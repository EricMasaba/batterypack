<?php 
session_start(); 
require_once("class.user.php"); 
require_once("class.core.php"); 
require_once "__pageconfig.php";
$pageName="Neales::About"; 
?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>
	    <?php include "inc/header.php"; ?>
		<?php include "inc/responsiveGridSystem.php"; ?>
		<?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
		<?php pcaPredict(PCAPREDICT_KEY); ?>		
		<title><?=$pageName?></title>
	</head>

	<body>
	
		<?php include "inc/navigation.php"; ?>
		<div id="wrapper"><!-- wrapper -->

			<div id="headcontainer">
				<header>
				<h1>On Demand Buses and Taxis</h1>
				<h2>Spectacularly Easy Transport</h2>
				</header>

			</div>
			<div id="maincontentcontainer">
				<div class="lightcontainer">
					<div class="maincontent intro-benefits">

						<div class="section group">
							<h2>Mobility as a service?</h2>

							<p>Neales Transport is not just taxis and coaches. <br />It's a whole new way of getting around, giving you flexibility and awesome value. It's a quick, easy <span class="and">&</span> flexible way to create a personal travel solution. </p>

					        <a class="button" href="signup.php"><i class="fa fa-code"></i> Get Started</a>

						</div>

						<div class="section group">

							<div class="col span_1_of_3">
								<img src="img/configuration.png" alt="" class="floatleft" />
								<h3>Buy Trip Packages</h3>
									<p>Don't be forced into having a fixed schedule and relying on a bus. For the same price, with our DRT system you can have a cab, whenever you need it.</p>
							</div>

							<div class="col span_1_of_3">
								<img src="img/full-screen.png" alt="" class="floatleft" />
								<h3>Scales to your needs</h3>
								<p>most people only do 960 trips per year. With Neales you can do all those trips with us, on demand, cheaper than a bus most of the time </p>
							</div>

							<div class="col span_1_of_3">
								<img src="img/badge.png" alt="" class="floatleft" />
								<h3>It's Smart</h3>
								<p>Rather than having a car sitting around 23 hours a day doing nothing but costing you money <strong class="code">Neales</strong> can take <strong class="code">You</strong>. </p>
							</div>

						</div>

					</div>
				</div>

				<div class="darkcontainer" id="example">
					<div class="maincontent">
						<div class="section group">
						<h2>Packages</h2>
						<p>Below you can see each some of our packages </p>
						</div>

						<div class="section group">
							<h3>Three Packages</h3>
						</div>

						<div class="section group">
							<div class="col span_1_of_3">
							    <?php include "pack1.php"; ?>
							</div>
							<div class="col span_1_of_3">
								<?php include "pack2.php"; ?>
							</div>
							<div class="col span_1_of_3">
								<?php include "pack3.php"; ?>
							</div>
						</div>

					</div>
				</div>

				<div class="standardcontainer">
					<div class="maincontent">
						<div class="section group">
						<h2>How can I use it?</h2>
						<p>There are eight core modes.</p>
						</div>
					</div>
				</div>

				<div>
					
					<div class="container containerhome">
					<!-- <div class="row"> -->
						<div class="col-sm-12 col-md-9 no-padding homecarousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									<li data-target="#carousel-example-generic" data-slide-to="3"></li>
									<li data-target="#carousel-example-generic" data-slide-to="4"></li>
									<li data-target="#carousel-example-generic" data-slide-to="5"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item">
										<img src="img/modes/modes03.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes04.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes05.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes06.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes07.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes08.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes09.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes10.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes11.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes12.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes13.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes14.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes15.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes16.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes17.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes18.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes01.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes19.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item">
										<img src="img/modes/modes02.jpg" class="img-responsive" alt="Commuter" />
									</div>
									<div class="item active">
										<img src="img/modes/modes20.jpg" class="img-responsive" alt="Cucine di Design" />
									</div>
									<div class="item">
										<img src="img/modes/modes21.jpg" class="img-responsive" alt="Cucine moderne" />
									</div>
									<div class="item">
										<img src="img/modes/modes22.jpg" class="img-responsive" alt="Cucine design moderno" />
									</div>
									<div class="item">
										<img src="img/modes/modes23.jpg" class="img-responsive" alt="Cucine Modulnova" />
									</div>
									<div class="item">
										<img src="img/modes/modes24.jpg" class="img-responsive" alt="Cucine Design" />
									</div>
									<div class="item">
										<img src="img/modes/modes25.jpg" class="img-responsive" alt="Design cucine" />
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
									<span class="icon-prev"><i class="fa fa-angle-left"></i></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
									<span class="icon-next"><i class="fa fa-angle-right"></i></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>

					<!-- </div> -->
					</div>

				</div>
				
				<div class="lightcontainer">
					<div class="maincontent">
						<div class="section group">
						<h2>Let's Go to Work</h2>
						<p>Don't drive. Don't take the bus. Get a personalised travel package for you.</p>
						</div>

						<div class="section group">
							<div class="col span_1_of_3">
							<h3>Buy a pre-packaged trip</h3>
							<p>What you need</p>
							<ul>
							<li>Your use case (work, school, lesiure)</li>
							<li>Number of weekly trips</li>
							<li>Average current time commuting</li>
							</ul>
							<p><a href="topup.php" class="button primary"><i class="fa fa-download"></i> Get StarterPack</a></p>
							<p>Or find this on <a href="#calculator">Texxi Trip Calc</a>.</p>
							</div>

							<div class="col span_1_of_3">
							<h3>Have a quick look at fares</h3>
							<p>Use the Trip Calculator <a href="#travelsystem">grab an example</a>.</p>


							</div>
						</div>
					</div>
				</div>
				<div class="standardcontainer">
					<div class="maincontent">
						<div class="section group">
						<h2 id="#calculator">Trip Calculator</h2>
						<p>Use the new <strong><a href="#calculator/">demand responsive trip calculator</a></strong> to find what package works for you. Decide the number of regualr trips you will need <span class="and">&</span> set the type (shared or single) you want to use.</p>
						</div>

						<div class="section group">
							<div class="col span_1_of_3">	
								<form action="#calculator/" method="post" id="calculator">
									
									<p><label for="columns">The number of trips in a week</label>
									
			                        <select id="columns" name="columns" required>
										<option value="2" >2</option>
										<option value="3" >3</option>
										<option value="4"  selected>4</option>
										<option value="5" >5</option>
										<option value="6" >6</option>
										<option value="7" >7</option>
										<option value="8" >8</option>
										<option value="9" >9</option>
										<option value="10" >10</option>
										<option value="11" >11</option>
										<option value="12" >12</option>
									</select></p>
								
									<p><label for="margin">Choose a vehicle type</label>
									<input type="text" id="margin" name="margin" value="1.6" required /></p>
																	
									<input type="submit" class="button" value="Calculate" />
								</form>

							</div>

							<div class="col span_1_of_3">
								<h3>What Package is Best?</h3>
								<p>A trip package of <b>&pound;60.00</b> would get you 40 local trips per month for only &pound;1.50 a trip. This is cheaper than many buses and for the longer journeys in our coaches or minibuses, much cheaper than the train.</p>
							</div>
							<div class="col span_1_of_3">
								<div class="note rounded">
								<p class="handwritten">Don't pay for a car that sits there 23 hours a day not moving and costing you money</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
				
			</div>

			<div class="want-a-website">

				<div class="maincontent">
			        <div class="section group">
			            <h2>Want Us  to Do It For You?</h2>
			            <div class="section group">
			            	<div class="col span_1_of_6"><img src="img/nealesnarrow.png" class="circular2" alt="graham miller" /></div>
			                <div class="col span_3_of_6">
				                <h3>SMS registers you</h3>
			                	<p>Just send you email address in an SMS to 01494 372 860.  </p>
			                	
			                    <h3>Confirm in Email</h3>
			                    <p>You can then click on the link we sent you.</p>
			            		<p>You can <a href="contactus.php" class="button"><i class="fa fa-envelope"></i> send us an email</a> or contact us in our <a href="http://www.nealesdrt.co.uk">High Wycombe Office</a>. </p>
			                </div>
			            	<div class="col span_2_of_6">
			                	<div class="er-logo">
			                	<a href="https://www.texxi.com"><img width="180" src="img/SocialGroups.jpg" alt="Texxi" /></a>
			                    </div>
			                </div>
			            </div>            
			        </div>
				</div>
			</div>
			


		</div><!-- end wrapper -->

		<?php include "inc/footer.php"; ?>
		<?php include "inc/end_header.php"; ?>


	</body>
</html>