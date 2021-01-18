<div class="header-nav-menu margin-bottom-min">
<div class="webcenter">
<div class="header-menu-options flex-wrap">

<li class="header-menu dropdown">
<label class="dropbtn <?php if($pageid == 'me' || $pageid == 'settings' || $pageid == 'home' || $pageid == 'ranks') { ?>visited<?php } ?>">
<h5 class="no-select"><?= User::userData('username') ?></h5>
</label>
<ul class="dropdown-content">
<a href="<?= $config['hotelUrl']; ?>/me" class="list-content visited">
<h5 class="no-select">Home</h5>
</a>
<a href="<?= $config['hotelUrl']; ?>/home/<?= User::userData('username') ?>" class="list-content ">
<h5 class="no-select">Mi Pagina</h5>
</a>
<a href="<?= $config['hotelUrl']; ?>/settings" class="list-content">
<h5 class="no-select">Configuraciones</h5>
</a>
<a href="<?= $config['hotelUrl']; ?>/logout" class="list-content">
<h5 class="no-select">Salir</h5>
</a>
</ul>
</li>

<li class="header-menu">
<a href="<?= $config['hotelUrl']; ?>/news" class="<?php if($pageid == 'news') { ?>visited<?php } ?>">
<h5 class="no-select">Noticias</h5>
</a>
</li>

<li class="header-menu dropdown">
<label class="dropbtn <?php if($pageid == 'community' || $pageid == 'top' || $pageid == 'staff' || $pageid == 'colab') { ?>visited<?php } ?>">
<h5 class="no-select">Comunidad</h5>
</label>
<div class="dropdown-content">
<a href="<?= $config['hotelUrl']; ?>/hall" class="list-content ">
<h5 class="no-select">Salón de la Fama</h5>
</a>
<a href="<?= $config['hotelUrl']; ?>/staff" class="list-content ">
<h5 class="no-select">Equipo</h5>
</a>
<a href="<?= $config['hotelUrl']; ?>/colab" class="list-content ">
<h5 class="no-select">Colaboradores</h5>
</a>

<a href="<?= $config['hotelUrl']; ?>/photos" class="list-content ">
<h5 class="no-select">Fotos</h5>
</a>

<!--
<div class="list-content">
<h5 class="no-select">Foro</h5>
</div>
-->
</div>
</li>

<?php if (User::userData('rank') > $config['RankMin'] ) { ?>
<li class="header-menu">
<a href="<?= $config['hotelUrl']; ?>/nutacp/desboard" class="">
<h5 class="no-select" style="color:red">Administración</h5>
</a>
</li>
<?php } else { echo ''; } ?>
<!--
<li class="header-menu dropdown">
<label class="dropbtn">
<h5 class="no-select">Loja</h5>
</label>
<div class="dropdown-content">
<div class="list-content">
<h5 class="no-select">Pacotes</h5>
</div>
<div class="list-content">
<h5 class="no-select">VIP</h5>
</div>
<div class="list-content">
<h5 class="no-select">Esmeraldas</h5>
</div>
<div class="list-content">
<h5 class="no-select">Confirmar Pag.</h5>
</div>
</div>
</li>
-->
</div>
</div>
</div>