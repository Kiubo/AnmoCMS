<?php
include_once ('tpl/funciones.php');
$menu="users";
$menu2="users-rank";
staffCheckHk();
$_SESSION['title'] = '';
$_SESSION['slogan'] = '';
$_SESSION['news'] ='';
$activeedituser="1";
admin::CheckRank(5);
?>
<html>
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>img/apple-icon.png">
<link rel="icon" type="image/png" href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Administración > Usuarios > Dar Rango</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!-- Fonts and icons -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>demo/demo.css" rel="stylesheet" />
</head>
<body>
<body class="">
<div class="wrapper ">

<?php
include_once ('tpl/navegacion.php');
?>

<div class="main-panel">

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
<div class="container-fluid">
<div class="navbar-wrapper">
<a class="navbar-brand" href="javascript:;">Nutella ACP <b>></b> Usuarios <b>></b> Dar Rango</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
<span class="sr-only">Toggle navigation</span>
<span class="navbar-toggler-icon icon-bar"></span>
<span class="navbar-toggler-icon icon-bar"></span>
<span class="navbar-toggler-icon icon-bar"></span>
</button>
<div class="collapse navbar-collapse justify-content-end">
<ul class="navbar-nav">

<li class="nav-item dropdown">
<a class="nav-link" href="/me">
<i class="material-icons">logout</i>
<p class="d-lg-none d-md-block">
Volver a la Home
</p>
</a>
</li>
</ul>
</div>
</div>
</nav>



<div class="content">

<nav aria-label="breadcrumb" role="navigation">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo $config['hotelUrl'].'/NUTACP/desboard'; ?>">Desboard</a></li>
<?php if ($menu2 == "users") { ?>
<li class="breadcrumb-item active">Usuarios</li>
<?php } else{ ?>
<li class="breadcrumb-item active"><a href="<?php echo $config['hotelUrl'].'/NUTACP/users'; ?>">Usuarios</a></li>
<?php } ?>
<?php if ($menu2 == "users-week") { ?>
<li class="breadcrumb-item active">Usuario de la Semana</li>
<?php } else{ ?>
<li class="breadcrumb-item active"><a href="<?php echo $config['hotelUrl'].'/NUTACP/week'; ?>">Usuario de la Semana</a></li>
<?php } ?>
<?php if ($menu2 == "users-rank") { ?>
<li class="breadcrumb-item active">Dar Rango</li>
<?php } else{ ?>
<li class="breadcrumb-item active"><a href="<?php echo $config['hotelUrl'].'/NUTACP/userrank'; ?>">Dar Rango</a></li>
<?php } ?>
<?php if ($menu2 == "users-bans") { ?>
<li class="breadcrumb-item active">Banear usuario</li>
<?php } else{ ?>
<li class="breadcrumb-item active"><a href="<?php echo $config['hotelUrl'].'/NUTACP/ban'; ?>">Banear usuario</a></li>
<?php } ?>
</ol>
</nav>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-success">
<h4 class="card-title">Dar rango al usuario <?php echo admin::EditUser("username"); ?></h4>
<p class="card-category">Cuidado con a quien le das Rango ojo peleao'</p>
</div>
<div class="card-body">

<form name="mygallery" action="" method="POST">
<?php admin::EditUser("username"); 
admin::LookSollie();
?>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkRankUser"]?></label>
<div class="col-sm-10">
<?php echo admin::EditUser("username"); ?>
<input type="hidden"  value="<?php echo admin::EditUser("username"); ?>" name="naam" class="form-control" disable>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-5 control-label">Elegir rango del usuario</label>
<div class="col-sm-10">
<select name="rank" class="form-control">
<?php
$GetRanks = $dbh->prepare("SELECT * FROM ranks ORDER BY id ASC ");
$GetRanks->execute();
while($rank = $GetRanks->fetch())
{
echo'
<option value="'.$rank["id"].'">'.$rank["name"].'</option>
';
}
?>
</select>
</div>
</div>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<div class="form-group">
<label class="col-sm-2 col-sm-5 control-label">Pin del usuario</label><br>
<div class="col-sm-10">

<input type="text" maxlength="4" value="<?php echo admin::EditUser("pin"); ?>" name="pin" class="form-control" onkeypress="return valida(event)" required style=" height: 20px; width: 91%; ">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Ocultar o ver</label>
<div class="col-sm-10">
<select name="hide_staff" class="form-control">
<option value="0">Ver en seccion Staff</option>
<option value="1">No ver en seccion Staff</option>
</select>
</div>
</div>

<button name="updaterank" type="submit" class="btn btn-success">Dar Rango</button></form>

</div>
</div>
</div>

</div>
</div>
</div>
<footer class="footer">
<div class="container-fluid">
<nav class="float-left">
<ul>
<li>
<a href="/me">
<?= $config['hotelName'] ?>
</a>
</li>
<li>
<a href="#">
Nutella Project
</a>
</li>
<li>
<a href="http://habb.si/changelog.php" target="_blank">
Changelogs
</a>
</li>
</ul>
</nav>
<div class="copyright float-right">
&copy;
<script>
document.write(new Date().getFullYear())
</script>, made with <i class="material-icons">favorite</i> by
<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
</div>
</div>
</footer>
</div>
</div>

<!-- Core JS Files -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/core/jquery.min.js"></script>
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/core/popper.min.js"></script>
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/core/bootstrap-material-design.min.js"></script>
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs-->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/moment.min.js"></script>
<!--Plugin for Sweet Alert -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/jquery.bootstrap-wizard.js"></script>
<!--Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/bootstrap-selectpicker.js"></script>
<!--Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--DataTables.net Plugin, full documentation here: https://datatables.net/-->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/jquery.dataTables.min.js"></script>
<!--Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs-->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/jasny-bootstrap.min.js"></script>
<!--Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar-->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/jquery-jvectormap.js"></script>
<!--Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/arrive.min.js"></script>
<!--Google Maps Plugin-->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/chartist.min.js"></script>
<!--Notifications Plugin-->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>demo/demo.js"></script>
<script>
$(document).ready(function() {
$().ready(function() {
$sidebar = $('.sidebar');

$sidebar_img_container = $sidebar.find('.sidebar-background');

$full_page = $('.full-page');

$sidebar_responsive = $('body > .navbar-collapse');

window_width = $(window).width();

fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
$('.fixed-plugin .dropdown').addClass('open');
}

}

$('.fixed-plugin a').click(function(event) {
// Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set thesection active
if ($(this).hasClass('switch-trigger')) {
if (event.stopPropagation) {
event.stopPropagation();
} else if (window.event) {
window.event.cancelBubble = true;
}
}
});

$('.fixed-plugin .active-color span').click(function() {
$full_page_background = $('.full-page-background');

$(this).siblings().removeClass('active');
$(this).addClass('active');

var new_color = $(this).data('color');

if ($sidebar.length != 0) {
$sidebar.attr('data-color', new_color);
}

if ($full_page.length != 0) {
$full_page.attr('filter-color', new_color);
}

if ($sidebar_responsive.length != 0) {
$sidebar_responsive.attr('data-color', new_color);
}
});

$('.fixed-plugin .background-color .badge').click(function() {
$(this).siblings().removeClass('active');
$(this).addClass('active');

var new_color = $(this).data('background-color');

if ($sidebar.length != 0) {
$sidebar.attr('data-background-color', new_color);
}
});

$('.fixed-plugin .img-holder').click(function() {
$full_page_background = $('.full-page-background');

$(this).parent('li').siblings().removeClass('active');
$(this).parent('li').addClass('active');


var new_image = $(this).find("img").attr('src');

if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
$sidebar_img_container.fadeOut('fast', function() {
$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
$sidebar_img_container.fadeIn('fast');
});
}

if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

$full_page_background.fadeOut('fast', function() {
$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
$full_page_background.fadeIn('fast');
});
}

if ($('.switch-sidebar-image input:checked').length == 0) {
var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
}

if ($sidebar_responsive.length != 0) {
$sidebar_responsive.css('background-image', 'url("' + new_image + '")');
}
});

$('.switch-sidebar-image input').change(function() {
$full_page_background = $('.full-page-background');

$input = $(this);

if ($input.is(':checked')) {
if ($sidebar_img_container.length != 0) {
$sidebar_img_container.fadeIn('fast');
$sidebar.attr('data-image', '#');
}

if ($full_page_background.length != 0) {
$full_page_background.fadeIn('fast');
$full_page.attr('data-image', '#');
}

background_image = true;
} else {
if ($sidebar_img_container.length != 0) {
$sidebar.removeAttr('data-image');
$sidebar_img_container.fadeOut('fast');
}

if ($full_page_background.length != 0) {
$full_page.removeAttr('data-image', '#');
$full_page_background.fadeOut('fast');
}

background_image = false;
}
});

$('.switch-sidebar-mini input').change(function() {
$body = $('body');

$input = $(this);

if (md.misc.sidebar_mini_active == true) {
$('body').removeClass('sidebar-mini');
md.misc.sidebar_mini_active = false;

$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

} else {

$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

setTimeout(function() {
$('body').addClass('sidebar-mini');

md.misc.sidebar_mini_active = true;
}, 300);
}

// we simulate the window Resize so the charts will get updated in realtime.
var simulateWindowResize = setInterval(function() {
window.dispatchEvent(new Event('resize'));
}, 180);

// we stop the simulation of Window Resize after the animations are completed
setTimeout(function() {
clearInterval(simulateWindowResize);
}, 1000);

});
});
});
</script>
<script>
$(document).ready(function() {
// Javascript method's body can be found in assets/js/demos.js
md.initDashboardPageCharts();

});
</script>
</body>

</html>