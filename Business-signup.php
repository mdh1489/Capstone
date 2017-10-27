<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Business Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css">
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>GoLocal</strong></a>
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="login.html">Login</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>


			<h3>Business Signup</h3>

			<form method="post" action="insertbusiness.php">
				<div class="row uniform">
					<div class="6u$ 12u$(xsmall)">
						<input type="text" name="name" id="name" value="" placeholder="Name" required/>
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="email" name="email" id="email" value="" placeholder="Email" required/>
					</div>
                    <div class="6u$ 12u$">
                     <div class="select-wrapper">
                     <select name = "industry" >
                    <?php
                       include("dbase.txt");
                       mysql_select_db("huneycuttmd1", $goLocaldb) or die ("Error");
                       $businessq = "select industryID, industryType from industry";
                       $result = @mysql_query($businessq) or die ("Error Connecting");

                       while($r = mysql_fetch_array($result))
                       {
                         echo "<option value=".$r['industryID'].">" . $r['industryType']."</option>";
                       }               
                    ?>
					  </select>                                                                                                                                                                                                                         
					  </div>
					</div>
					<!-- Break -->
					<div class="6u$ 12u$(xsmall)">
						<input type="text" name="address" id="address" value="" placeholder="Address" />
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="text" name="zip" id="zip" value="" placeholder="Zip" required/>
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="password" name="password" id="password" value="" placeholder="Password" required/>
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="tel" name="phone" id="phone" value="" placeholder="Phone Number" />
					</div>
					<!-- Break -->
					<div class="6u$ 12u$(small)">
						<input type="checkbox" id="human" name="human" required>
						<label for="human">Currently In Testing Do Not Hit Submit</label>
					</div>
					<!-- Break -->
					<div class="6u$">
						<ul class="actions">
							<li><input type="submit" value="Submit" /></li>
							<li><input type="reset" value="Reset" /></li>
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
