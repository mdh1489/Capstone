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
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="bizportal.php" class="logo"><strong>Home</strong></a>
					<nav id="nav">
						<a href="bizaccount.php">My Account</a>
						<a href="../signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Form -->
        <!-- <h3>Customer Signup</h3>-->
		<body class="subpage" align="center">
        <h3>Create News?</h3>
		<form method="post" width="10" action="uploadADImage.php" enctype="multipart/form-data">
				<input type="date" name="date" id="date" value="" required/>
				<br>
				<br>
				<div class="table-wrapper" align = "center">
				<table align = "center">
				<input type="text" name="text" id="text" value="" placeholder="Enter Text" style="width: 300px;" required/>
				</div>
				<h2>Select Number of days to run the news</h2>
				  <input name ="myRange" type="range" min="1" max="50" value="25" class="slider" id="myRange">
				  <p>Value: <span id="demo"></span>days</p>
				<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value;

				slider.oninput = function() {
				  output.innerHTML = this.value;
				}
				</script>
					<h2>Upload an Image?</h2>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<br>
					<br>

				<!-- Break -->
					<ul class="actions" >
						<li><input type="reset" value="Reset" /></li>
						<li><input type="submit" value="Submit" /></li>
					</ul>
		</form>
			</body>
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

			<footer>
					<div class="copyright">
						&copy; MikeHuneycutt <a href="https://student.cs.appstate.edu/huneycuttmd1">More</a>.
					</div>

			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

</html>
