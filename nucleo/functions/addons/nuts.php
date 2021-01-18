<?php
$qSelLastComments = mysql_query('SELECT * FROM cms_tweet WHERE hates = 0 ORDER BY id DESC LIMIT 40');
if(mysql_num_rows($qSelLastComments)){
while($Comm = mysql_fetch_assoc($qSelLastComments)){
$qU = mysql_query('SELECT * FROM users WHERE username = "'. $Comm['username'] .'"');
$U = mysql_fetch_assoc($qU); 
?>                      
                               <div class="panel panel-default">
                                  <div class="panel-body">
<img src="<?php echo $avatar; ?><?php echo $U['look']; ?>&direction=3&head_direction=3&headonly=1" class="img-circle" style="width:45px; height:45px;border:1px solid;border-color:#e9eaed;margin-bottom:0px;margin-top:-5px;"> 
<a href="/profile/<?php echo $U['username']; ?>"><b style="color:#0095ff"><?php echo $U['username']; ?></b></a> 
<?php if($U['cms_verified'] >= 1){ ?> <font style="color:#0095ff;"><span class="fa fa-check-circle"></span></font>
<?php } ?>
<?php if($U['online'] == 1){ echo '<span class="label label-default" style="background-color:#02b129;font-size: 55%;">Online</span>'; }else{ echo '<span class="label label-default" style="background-color:#ff0000;font-size: 55%;">Offline</span>'; } ?> 
<a href="/publish/<?php echo $Comm['id']; ?>"><p style="color:#90949c;font-family:inherit;margin-top:-15px;margin-left: 50px;font-size: 11px;"><?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A | %d de %B del %Y", $Comm['time'])); ?> · <i class="fa fa-clock-o" aria-hidden="true"></i></p></a>
<p class="lead emoji-picker-container">
<div class="estado" > <?php echo $Comm['tweet']; ?></div>
</p>
<br>

<a href="/publish/<?php echo $Comm['id']; ?>" class="pull-left" style="margin-top: -4%;margin-left: 3%;"><h1><i class="fa fa-comment-o" aria-hidden="true"></i><b style="font-size:11px;">(<?php echo $Comm['count_c']; ?>)</b></h1></a>
<?php if($myrow['rank'] >= 10){ ?>
<a href="/home?action=err&id=<?php echo $Comm['id']; ?>" class="btn btn-primary btn-sm pull-right" >Borrar Comentario</a>
<?php } ?>
                                 </div>
                               </div>
                   
<?php  
}
}
else{
echo "
<center>
 <p style='color:#ed4956;font-size:14px;line-height:18px;text-align:center;'>¡No hay estados!.</p>
</center>";
}
?>  

<div class="userpost">
<div class="box" style="float: right; width: 90%">
<div class="arrow"></div>
<div class="circle" style="border: 7px solid #e74c3c"></div>
<div class="content" style="font-family:sans-serif;padding: 10px;">
<div class="label" style="font-family:sans-serif;">Fenix, Publico un Nut:</div>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<div style="font-family:sans-serif;margin-top: 5px;text-align: right" class="desc">Hace minutos</div>
</div>
</div>
</div>

<div class="userpost">
<div class="box" style="float: right; width: 90%">
<div class="arrow"></div>
<div class="circle normal"></div>
<div class="content" style="font-family:sans-serif;padding: 10px;">
<div class="label" style="font-family:sans-serif;font-size: 13px">Fénix tomo una Foto :</div>
<center><img src="http://localhost/camera/pictures/97.png"></center>
<div style="font-family:sans-serif;margin-top: 5px;text-align: right" class="desc">Mira esta foto en <a href="#">Fotos</a></div>
</div>
</div>
</div>

<div class="userpost">
<div class="box" style="float: right; width: 90%">
<div class="arrow"></div>
<div class="circle" style="border: 7px solid #e74c3c"></div>
<div class="content" style="font-family:sans-serif;padding: 10px;">
<div class="label" style="font-family:sans-serif;">Fenix, comento en una noticia:</div>
<blockquote>Hola a todos, comente en esta noticia XDXD</blockquote>
<div style="font-family:sans-serif;margin-top: 5px;text-align: right" class="desc">En la noticia: <a href="#">Instalaste perfectamente NutellaCMS</a></div>
</div>
</div>
</div>