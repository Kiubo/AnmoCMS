<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>Habbo - Deine virtuelle Welt!</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
	<link rel="stylesheet" href="./libzeugs/animate.css" type="text/css">
	<link type="text/css" href="./libzeugs/images.css" rel="stylesheet">
	<link rel="icon" href="/favicon.png">
	<!-- inkludiert favicon.png und hat selber keins aufm server, copypaste?? !-->
	<script type="text/javascript">
		$(document).ready(function() {
			var a = 100;
			if(location.hash == "#registration") {
				$("#loginForm").fadeOut("", function() {
					$("#registerForm").fadeIn();
				});
			}
			$(window).on("hashchange", function() {
				if(location.hash == "#registration") {
					$("#loginForm").fadeOut("", function() {
						$("#registerForm").fadeIn();
					});
				} else {
					if(location.hash == "#home" || location.hash == "") {
						$("#registerForm").fadeOut("", function() {
							$("#loginForm").fadeIn();
						});
					}
				}
			});
		});
	</script>
</head>
<body>


	<div class="container_24" style="width:1050px">
		<div id="loginForm" style="margin-top: 50px;">
								<div id="contenfBox">
				<div id="header">
					<div class="habbologo"></div>
					<div id="onlineBar">
				    	<div id="arrow"></div>
				        <b>0</b> Habbo(s) online
				    </div>
					<div class="loginPosition">
						<form method="post">
							<div class="usernamePosition">
								<input type="text" tabindex="1" name="habbo_username" placeholder="Username">
								<input type="checkbox" tabindex="3" name="_login_remember" class="checkBoxes" id="KeepLogin" style="margin-left: 0px;">
								<label for="KeepLogin">Sitzung speichern</label>
							</div>
							<div class="passwordPosition">
								<input type="password" style="margin-bottom:5px" tabindex="2" name="habbo_password" placeholder="Passwort">
								<a href="/#" class="sub-link">Passwort vergessen?</a>
							</div>
							<input type="submit" name="habbo_sub" tabindex="4" class="loginButton" value="Login">
						</form>
					</div>
				</div>
				<div class="hoteIview">
					<div class="messageBox">
						<h2>Willkommen Habbo,</h2>
						<p>
							Du befindest dich auf der Startseite von unserem geliebten Habbo Hotel.<br><br>Wenn du neugierig geworden bist und Teil einer atemberaubenden Community werden möchtest, kannst du dir hier entweder einen neuen Account anlegen, oder dich mit einem bestehenden Account anmelden.
						</p>
					</div>
					<a href="/register.php" class="registerButtons">Gratis registrieren</a>
				</div>
				<div id="footer-content">
					<div class="left">
				<div class="facebookContent"></div>
					</div>
					<div class="right" style="font-size:15px;">
						Copyright © 2017 Habbo Hotel - All rights reserved.<br>
						Habbo Hotel is no way affiliated with Sulake Corporation Oy.<br>
						Powered by <b>HabboCMS</b>.
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
			<div id="smallBoxes">
				<div class="images1"></div>
				<p><b>Features</b><br>Im Habbo gibt es viele coole Funktionen welche uns von anderen Hotels unterscheiden.</p>
			</div>
			<div id="smallBoxes">
				<div class="images2"></div>
				<p><b>Tägliche Events</b><br>Tägliche und einzigartige Events bringen dir viel Freude im Habbo Hotel Alltag.<br></p>
			</div>
			<div id="smallBoxes">
				<div class="images3"></div>
				<p><b>Tolle Community</b><br>Unsere Community besteht aus coolen und netten Leuten. Sei auch du einer von uns!</p>
			</div>
		</div>



	</div>


</body></html>