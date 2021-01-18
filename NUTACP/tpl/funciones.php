<?php
function checkVersion()
  {
    global $config;
    $script = file_get_contents("http://188.164.195.181/version.txt");
    $update = file_get_contents("http://188.164.195.181/update.txt");
    $version = "2.5.3";
    if($version == $script) {
      echo'<div class="alert succes"><b>¡Que Bien!</b> tienes tú cms Actualizada a la última versión <b>V'.$version.'</b>.</div>';
      } else {
      echo'<div class="alert error"><b>¡OH NO!</b> tú versión de la CMS (<i><b>V'.$version.'</b></i>) está desactualizada, la nueva versión es la <b>V'.$script.'</b>.</div><br>';
    } 
  }
  function Version()
  {
    global $config;
    $script = file_get_contents("http://188.164.195.181/version.txt");
    $update = file_get_contents("http://188.164.195.181/update.txt");
    $version = "2.5.";
    if($version == $script) {
      echo'Tienes tú cms Actualizada a la última versión <b>V'.$version.'</b>';
      } else {
      echo'Tú versión de la CMS (<i><b>V'.$version.'</b></i>) está desactualizada, la nueva versión es la <b>V'.$script.'</b><br>
      Lo cual trae nueva funciones como :<br>'.$update.'';
    } 
  }
function checkBugs()
  {
    global $config;
    $script = file_get_contents("http://188.164.195.181/version.txt");
    $update = file_get_contents("http://188.164.195.181/changelogs/BUGS.php");
    $version = "2.5.2";
    if($version == $script) {
      echo' '.$update.' ';
      }
  }
function checkCMS()
  {
    global $config;
    $script = file_get_contents("http://188.164.195.181/version.txt");
    $update = file_get_contents("http://188.164.195.181/changelogs/CMS.php");
    $version = "2.5.2";
    if($version == $script) {
      echo' '.$update.' ';
      }
  }
function checkEMU()
  {
    global $config;
    $script = file_get_contents("http://188.164.195.181/version.txt");
    $update = file_get_contents("http://188.164.195.181/changelogs/EMU.php");
    $version = "2.5.2";
    if($version == $script) {
      echo' '.$update.' ';
      }
  }
  ?>