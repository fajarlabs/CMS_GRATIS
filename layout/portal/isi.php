<?php
if ($_GET['module']=='beranda'){
include "$f[folder]/modul/mod_beranda/beranda.php";}

// DETAIL PLAYLIST VIDEO ////////////////////////////////////////////
elseif ($_GET['module']=='kontak'){
include "$f[folder]/modul/mod_kontak/kontak.php";}
/////////////////////////////////////////////////////////////////////

// DETAIL PLAYLIST VIDEO ////////////////////////////////////////////
elseif ($_GET['module']=='galeri'){
include "$f[folder]/modul/mod_galeri/galeri.php";}
/////////////////////////////////////////////////////////////////////

// DETAIL PENCARIAN ////////////////////////////////////////////
elseif ($_GET['module']=='pencarianartikel'){
include "$f[folder]/modul/mod_pencarianartikel/pencarianartikel.php";}

// DETAIL ARTIKEL ////////////////////////////////////////////
elseif ($_GET['module']=='artikel'){
include "$f[folder]/modul/mod_artikel/artikel.php";}

// DETAIL STATIS ////////////////////////////////////////////
elseif ($_GET['module']=='statis'){
include "$f[folder]/modul/mod_statis/statis.php";}
/////////////////////////////////////////////////////////////////////
?>
