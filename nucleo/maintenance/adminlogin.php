<html>
	<body>
		<div id="gradient" />
		<div id="back1"></div>
		<div id="back2"></div>
		<br><br><center><div class="box" style=" width: 70%; background-color: #f5f5f5; padding: 20px; ">
			<?php User::Login(); ?>	
			<form method="post">
				<div class="pfeil"> 	</div>
				<input type="text" id="username" name="username" placeholder="<?php echo $lang['Iusername']; ?>" style=" padding: 20px; border: 1px solid rgba(24, 145, 150, 0.06); border-bottom: 2px solid #189196; " required>
				<input type="password" id="password" name="password" placeholder="<?php echo $lang['Ipassword']; ?>" style=" padding: 20px; border: 1px solid rgba(24, 145, 150, 0.06); border-bottom: 2px solid #189196; " required>
				<button type="submit" class="submit" name="login" style=" width: 200px; background: #222; border: none; padding: 20px; "><div style="color: white"><b><?= $lang["Ibutton"] ?></b></div>
				</div>
			</button>
			</form>
	</div></center>
</body>
</html>

<style>
.error{
    display: block;
    background: #bf3c3c;
    color: #fff;
    padding: 10px;
    width: 65%;
}

</style>