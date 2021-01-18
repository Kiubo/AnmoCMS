<div class="sidebar" data-color="orange" data-background-color="white" data-image="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>img/sidebar-1.jpg">
<div class="logo"><a href="./desboard" class="simple-text logo-normal">
NUTELLA ACP
</a></div>
<div class="sidebar-wrapper">
<ul class="nav">
<li class="nav-item <?php if ($menu == "desboard") { ?>active<?php } else{ ?><?php } ?>">
<a class="nav-link" href="<?php echo $config['hotelUrl'].'/NUTACP/desboard'; ?>">
<i class="material-icons">dashboard</i><p>Dashboard</p>
</a>
</li>
<?php if(User::userData('rank') > 8){ ?>
<li class="nav-item <?php if ($menu == "config") { ?>active<?php } else{ ?><?php } ?>">
<a class="nav-link" href="<?php echo $config['hotelUrl'].'/NUTACP/settings'; ?>">
<i class="material-icons">settings</i><p>Configuracion General</p>
</a>
</li>
<?php } if(User::userData('rank') > 6){ ?>
<li class="nav-item <?php if ($menu == "users") { ?>active<?php } else{ ?><?php } ?>">
<a class="nav-link" href="<?php echo $config['hotelUrl'].'/NUTACP/users'; ?>">
<i class="material-icons">group</i><p>Usuarios</p>
</a>
</li>
<?php } if(User::userData('rank') > 4){ ?>
<li class="nav-item <?php if ($menu == "news") { ?>active<?php } else{ ?><?php } ?>">
<a class="nav-link" href="<?php echo $config['hotelUrl'].'/NUTACP/news'; ?>">
<i class="material-icons">library_books</i><p>Noticias & Eventos</p>
</a>
</li>
<?php } if(User::userData('rank') > 5){ ?>
<li class="nav-item <?php if ($menu == "reports") { ?>active<?php } else{ ?><?php } ?>">
<a class="nav-link" href="<?php echo $config['hotelUrl'].'/NUTACP/report'; ?>">
<i class="material-icons">info</i><p>Reportes</p>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>