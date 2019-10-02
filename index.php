<?php
session_start();
ob_start();
define("INDEX",true);
include "config/config.php";

$content  = (isset($_GET['content'])) ? $_GET['content'] : "home";
$kosong   = true;
$page     = array('home','admin/home','dosen/home','mahasiswa/home');
foreach($page as $pg){
  if($content == $pg and $kosong){
    
      include 'website/'.$pg.'.php';
      $kosong = false;
    
  }
}

if($kosong) include 'website/404.php';
?>
