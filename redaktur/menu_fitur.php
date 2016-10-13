<?php

/* extra */
$cek=umenu_akses("?module=agenda",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=agenda'><b>Agenda</b></a></li>";
}

$cek=umenu_akses("?module=poling",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=poling'><b>Jajak Pendapat</b></a></li>";
}

/* video */
$cek=umenu_akses("?module=video",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=video'><b>Video</b></a></li>";
}

$cek=umenu_akses("?module=playlist",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=playlist'><b>Playlist Video</b></a></li>";
}

$cek=umenu_akses("?module=tagvid",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=tagvid'><b>Tag Video</b></a></li>";
}

$cek=umenu_akses("?module=komentarvid",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=komentarvid'><b>Komentar Video</b></a></li>";
}
?>
