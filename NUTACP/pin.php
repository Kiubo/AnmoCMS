<!--
//||**************************************************************************************||\\
//||**************************************************************************************||\\
//||**                                                                                  **||\\
//||**                        __       _____  __  __    __    _                         **||\\
//||**                     /\ \ \/\ /\/__   \/__\/ /   / /   /_\                        **||\\  
//||**                    /  \/ / / \ \ / /\/_\ / /   / /   //_\\                       **||\\ 
//||**                   / /\  /\ \_/ // / //__/ /___/ /___/  _  \                      **||\\
//||**                   \_\ \/  \___/ \/  \__/\____/\____/\_/ \_/                      **||\\
//||**                                                                                  **||\\
//||**        PROJECT NUTELLA - V2.5 - EDITION ARCTURUS+COMET - PRIVATE EDITION         **||\\
//||**                                                                                  **||\\
//||**************************************************************************************||\\
//||**************************************************************************************||\\
-->
<body>
<html>
<head>
<title><?= $config['hotelName'] ?> : Ingresa tu PIN</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,700,300' rel='stylesheet' type='text/css'>
<link href="<?php echo $config['hotelUrl'].'/nutacp/'; ?>login/css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="boxlogo"></div>
<div class="logox"></div>

<div class="boxlogin">
<div class="title">INTRODUCE PIN</div>
<div class="separator"></div>
<div id="error-messages-container"> 
<?php staffPinHk(); ?>
</div> 
<form name='PINform' id='PINform' method="post"><br>
<div class="loginBox-P">
<input type="password" action="post" method="post" name="PINbox" placeholder="PIN" />
</div>
<div class="loginBox-S">
<input type="Submit" value="INGRESAR PIN" name="loginPin" />
</div>
</form>

<center>
<div class="footer">
<font color="#ba1a1a">Copyright <b>NutellaCMS</b></font> 
<br>
</div>
</center>
</div>


</body>
</html>