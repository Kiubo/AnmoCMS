<?php 

?>
<div class="page photos" style="margin-top: 10px;">
<div class="title">
Historia de fotos recientes tomadas en el hotel 
</div>
<div class="photos">

<?php
$mysqli = new mysqli("localhost", "root", "ericko88", "nutellav201");

/* verificar la conexión */
if ($mysqli->connect_errno) {
    printf("Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
}

$consulta = "SELECT * FROM camera_web ORDER by ID DESC";

if ($resultado = $mysqli->query($consulta)) {

    /* obtener un array asociativo */
    while ($fila = $resultado->fetch_assoc()) {
        echo'
<div class="photo">
<div class="image">
<img draggable="false" oncontextmenu="return false" src="'.$fila['url'].'">
</div>
<div class="desc">
<div class="avatar">
<img draggable="false" oncontextmenu="return false" src="https://www.habbo.com/habbo-imaging/avatarimage?figure=ch-3030-92.ea-3168-93.ca-3217-1410-1321.hd-180-2.cc-3186-1321.lg-3057-82.sh-3089-90.hr-3163-58.fa-1201-1321.he-1601-63">
</div>
<div class="right">
<span>Foto tomada por <a href="#">Fenix&nbsp;</a></span>
<i>
'.$fila['room_id'].'
</i>
</div>
</div>
</div>
        ';
    }

    /* liberar el conjunto de resultados */
    $resultado->free();
}

/* cerrar la conexión */
$mysqli->close();
?>

<div class="mensaje"></div>
<div id="loader"></div>
</div>
</div>