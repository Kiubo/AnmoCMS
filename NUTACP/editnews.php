<?php
include_once ('tpl/funciones.php');
$menu="news";
staffCheckHk();
$_SESSION['title'] = '';
$_SESSION['slogan'] = '';
$_SESSION['news'] ='';
admin::CheckRank(3);
?>
<html>
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>img/apple-icon.png">
<link rel="icon" type="image/png" href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Administración > Noticias & Eventos</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!-- Fonts and icons -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="<?php echo $config['hotelUrl'].'/NUTACP/assets/'; ?>demo/demo.css" rel="stylesheet" />
<script src="<?= $config['hotelUrl'];?>/NUTACP/js/ckeditor/ckeditor.js"></script>
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
<a class="navbar-brand" href="javascript:;">Nutella ACP <b>></b> Noticias</a>
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

<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<div class="card">
<div class="card-header card-header-success">
<h4 class="card-title">Editar Noticia</h4>
<p class="card-category"><?php echo admin::EditNews("title"); ?></p>
</div>
<div class="card-body">

<form name="mygallery" action="" method="POST">
<?php admin::EditNews("id"); 
admin::UpdateNews();?>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox7"] ?></label>
<div class="col-sm-10">
<?php echo admin::EditNews("id"); ?>
<input type="hidden" name="id" value="<?php echo admin::EditNews("id"); ?>">
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox"] ?></label>
<div class="col-sm-10" style=" width: 90%; ">
<input type="text"  value="<?php echo admin::EditNews("title"); ?>" name="title" class="form-control">
</div>
</div>
<br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox2"] ?></label>
<div class="col-sm-10" style=" width: 90%; ">
<input type="text"  value="<?php echo admin::EditNews("shortstory"); ?>" name="shortstory" class="form-control">
</div>
</div>
<br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox3"] ?></label>
<div class="col-sm-10" style=" width: 98%; ">
<?php
echo '<select onChange="showimage()" class="form-control" name="topstory" style="    width: 100%;font-size: 14px;"
<option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '"><option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '">' . admin::EditNews("image") . '</option>
';
if ($handle = opendir(''.$_SERVER['DOCUMENT_ROOT'].'/adminpan/img/newsimages'))
{
while (false !== ($file = readdir($handle)))
{
echo'';
if ($file == '.' || $file == '..')
{
continue;
}
echo '<option name="topstory" data-image="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '" value="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '"';
if (isset($_POST['topstory']) && $_POST['topstory'] == $file)
{
echo ' selected';
}
echo '>' . $file . '</option>';
}
}
echo '</select>';
?>
<br>
<div class="imagebox">
<p style="    margin: 0px;"href="javascript:linkrotate(document.mygallery.topstory.selectedIndex)" ><img style="border-radius: 6px;width: 580px;" src="<?php echo admin::EditNews("image"); ?>" name="topstory" border=0>
</div></p>
</div>
</div>
<br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox4"] ?></label>
<div class="col-sm-10" style=" width: 95%; ">
<textarea id="editor1" name="longstory"  rows="15" cols="80"><?php echo admin::EditNews("longstory"); ?></textarea></div>
</div>
<br><br>
<button style="    margin-top: 10px;width: 140px;float: right;margin-right: 14px;" name="update" type="submit" class="btn btn-success"><?= $lang["HkNewsbox6"] ?></button>
</div>
</section>
</div>
</form>
<script>
CKEDITOR.replace( 'editor1' );
</script>

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