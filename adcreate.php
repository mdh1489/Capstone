<?php
    session_start();
	if(!isset($_SESSION['name'])){ //if login in session is not set
    header("Location: login.html");
	}
?>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Creating New</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>GoLocal</strong></a>
					<nav id="nav">
						<a href="bizaccount.php">My Account</a>
						<a href="bizads.php">Ad Management</a>
						<a href="login.html">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
			<?PHP
	     echo $_SESSION['name'];
		 ?>
		<!-- Form -->
        <!-- <h3>Customer Signup</h3>-->
		<div class="6u$ 12u$(xsmall)">
        <h3>New Ad</h3>
		</div>
		<form method="post" action="adcreatesub.php" align = "left">
			<div class="row uniform">
				<style>
				#slidecontainer {
					width: 100%;
				}

				.slider {
					-webkit-appearance: none;
					width: 48%;
					height: 25px;
					background: #d3d3d3;
					outline: none;
					opacity: 0.7;
					-webkit-transition: .2s;
					transition: opacity .2s;
				}

				.slider:hover {
					opacity: 1;
				}

				.slider::-webkit-slider-thumb {
					-webkit-appearance: none;
					appearance: none;
					width: 25px;
					height: 25px;
					background: #4CAF50;
					cursor: pointer;
				}

				.slider::-moz-range-thumb {
					width: 25px;
					height: 25px;
					background: #4CAF50;
					cursor: pointer;
				}
				</style>
				<div class="6u$ 12u$(xsmall)">
				<input type="date" name="date" id="date" value="" required/>
				</div>
				<h1>Select Number of days to run the ad</h1>
				<div id="slidecontainer">
				  <input type="range" min="1" max="50" value="25" class="slider" id="myRange">
				  <p>Value: <span id="demo"></span> days</p>
				</div>
				<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value;

				slider.oninput = function() {
				  output.innerHTML = this.value;
				}
				</script>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="text" id="text" value="" placeholder="Text" required/>
				</div>

				<!-- Break -->
				<div class="6u$" >
					<ul class="actions" >
						<li><input type="reset" value="Reset" /></li>
						<li><input type="submit" value="Submit" /></li>
					</ul>
				</div>
			</div>
		</form>


					<div class="copyright">
						&copy; MikeHuneycutt <a href="https://student.cs.appstate.edu/huneycuttmd1">More</a>.
					</div>


				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
