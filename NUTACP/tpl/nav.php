<div class="navigation">
<ul>
<a href="<?php echo $config['hotelUrl'].'/NUTACP/desboard'; ?>"><li><div class="icon home"></div>Desboard</li></a>
<?php if(User::userData('rank') > 8){ ?>
<a href="#"><li><div class="icon acp"></div>Configuraciones</li></a>
<?php } ?>
<?php if(User::userData('rank') > 6){ ?>
<a href="<?php echo $config['hotelUrl'].'/NUTACP/usuarios'; ?>"><li><div class="icon users"></div>Usuarios</li></a>
<?php } ?>
<?php if(User::userData('rank') > 4){ ?>
<a href="#"><li><div class="icon news"></div>Noticias & Eventos</li></a>
<?php } ?>
<?php if(User::userData('rank') > 5){ ?>
<a href="#"><li><div class="icon reports"></div>Reportes</li></a>
<?php } ?>
<?php if(User::userData('rank') > 3){ ?>
<a href="#"><li><div class="icon logs"></div>Log's</li></a>
<?php } ?>
</ul>
<a href="#"><div class="logout"></div></a>
</div>

<div class="header">

<div class="subnavigation">
<ul>
<?php if ($menu == "desboard") { ?>
<a><li>Elige un menu arriba. |</li></a>
<a href="<?php echo $config['hotelUrl'].'/NUTACP/placas'; ?>"><li>Dar Placa al Usuario | </li></a>
<?php } if ($menu == "users") { if(User::userData('rank') > 6) { ?>
<a href="<?php echo $config['hotelUrl'].'/NUTACP/Usuarioweek'; ?>"><li>Usuario de la Semana | </li></a>
<a href="#"><li>Baneo de Usuario | </li></a>
<a href="#"><li>Usuarios Baneados | </li></a>
<a href="#"><li>Usuario Con Rangos</li></a>
<?php } if(User::userData('rank') > 9){ ?>
<a href="#"><li>Editar Usuario | </li></a> 
<a href="#"><li>Dar Rango | </li></a>
<?php } } ?>
</ul>	
</div>