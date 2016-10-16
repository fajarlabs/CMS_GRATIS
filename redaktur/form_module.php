   
   <?php
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";

   // Bagian Home
   if (Gets::get("module") =='home'){
   if (Session::get("leveluser") =='admin'){
   echo "
  
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
                             
   <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada  
   Control Panel di bawah ini:</p>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MODUL ADMINISTRATOR</h1>
   <span></span> 
   </div>
   <div class='block-content'>
 
   <ul class='shortcut-list'>
  
   <li><a href=media.php?module=menu><img src='img/modul.png'/>Menu</a></li>
   <li><a href=media.php?module=berita><img src='img/berita.png'/>Berita</a></li>
   <li><a href=media.php?module=templates><img src='img/template.png'/>Template</a></li>
   <li><a href=media.php?module=agenda><img src='img/agenda.png'/>Agenda</a></li>
   <li><a href=media.php?module=album><img src='img/album.png'/>Album Foto</a></li>
   <li><a href=media.php?module=galerifoto><img src='img/foto.png'/>Galeri Foto</a></li>
   <li><a href=media.php?module=poling><img src='img/poling.png'/>Jajak Pendapat</a></li>
   <li><a href=media.php?module=logo><img src='img/gantilogo.png'/>Logo Website</a></li>
   <li><a href=media.php?module=user><img src='img/user.png'/>User Admin</a></li>
   <li><a href=media.php?module=video><img src='img/video.png'/>Video</a></li>
   <li><a href=media.php?module=iklantengah><img src='img/iklan1.png'/>Iklan Home</a></li>
   <li><a href=media.php?module=pasangiklan><img src='img/iklan2.png'/>Iklan Sidebar</a></li>
   <li><a href=media.php?module=iklanatas><img src='img/iklan3.png'/>Iklan Layanan</a></li>
   <li><a href=media.php?module=hubungi><img src='img/kontak.png'/>Pesan Masuk</a></li>
   <li><a href=media.php?module=komentar><img src='img/komentar.png'/>Komentar</a></li>
   <li><a href=media.php?module=modul><img src='img/module.png'/>Modul Web</a></li>

   </ul>

  <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
   echo " </div>";
  
  
 
  } else {
  
 echo "<div id='main-content'>
 <div class='container_12'>
 <div class='grid_12'>
                             
 <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda. <br/></p>
 </div>
 <div class='grid_12'>

 <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
  echo " </div>";
 }
}

/* Bagian artikel */
elseif (Gets::get("module")=='artikel'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_artikel/artikel.php";
  }
}

/* Bagian kategori artikel */
elseif (Gets::get("module")=='kategori_artikel'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_kategori_artikel/kategori_artikel.php";
  }
}

/* Bagian galeri */
elseif (Gets::get("module")=='galeri'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_galeri/galeri.php";
  }
}

/* Bagian kategori galeri */
elseif (Gets::get("module")=='kategori_galeri'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_kategori_galeri/kategori_galeri.php";
  }
}

// Bagian Option
elseif (Gets::get("module")=='option'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_option/option.php";
  }
}

// (BARU) Bagian Header
elseif (Gets::get("module")=='header'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_header/header.php";
  }
}
// Bagian Pasang Iklan
elseif (Gets::get("module") =='pasangiklan'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_pasangiklan/pasangiklan.php";
  }
}

// Bagian Pasang Iklan
elseif (Gets::get("module") =='iklantengah'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_iklantengah/iklantengah.php";
  }
}

// Bagian Pasang Iklan
elseif (Gets::get("module") =='iklanatas'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_iklanatas/iklanatas.php";
  }
}

// Bagian User
elseif (Gets::get("module") =='profil'){
    if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian Testimoni
elseif (Gets::get("module")=='testimoni'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_testimoni/testimoni.php";
  }
}
// Bagian User
elseif (Gets::get("module") =='user'){
  if (Session::get("leveluser") =='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}

// Bagian Modul
elseif (Gets::get("module") =='modul'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_modul/modul.php";
  }
}
// Bagian Aktialita
elseif (Gets::get("module") =='aktualita'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_aktualita/aktualita.php";                            
  }
}
// Bagian Kategori
elseif (Gets::get("module") =='kategori'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif (Gets::get("module") =='berita'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif (Gets::get("module") =='komentar'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif (Gets::get("module") =='tag'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif (Gets::get("module") =='agenda'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Banner
elseif (Gets::get("module") =='banner'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif (Gets::get("module") =='poling'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Alamat
elseif (Gets::get("module") =='alamat'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_alamat/alamat.php";
  }
}

// Bagian Download
elseif (Gets::get("module") =='download'){
    if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif (Gets::get("module") =='hubungi'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif (Gets::get("module") =='templates'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif (Gets::get("module") =='shoutbox'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif (Gets::get("module") =='album'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif (Gets::get("module") =='galerifoto'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Galeri Foto
elseif (Gets::get("module") =='slidergambar'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_slidergambar/slidergambar.php";
  }
}

// Bagian Kata Jelek
elseif (Gets::get("module") =='katajelek'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif (Gets::get("module") =='sekilasinfo'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu Utama
elseif (Gets::get("module") =='menu'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_menu/menu.php";
  }
}


// Bagian Halaman Statis
elseif (Gets::get("module") =='halamanstatis'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif (Gets::get("module") =='sekilasinfo'){
    if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}


// Bagian YM
elseif (Gets::get("module")=='ym'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_ym/ym.php";
  }
}


// Bagian Logo
elseif (Gets::get("module")=='logo'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_logo/logo.php";
  }
}


// Bagian Halaman depan
elseif (Gets::get("module")=='kodehtml'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_kodehtml/kodehtml.php";
  }
}



//----------------video------------------>
// Bagian Playlist
elseif (Gets::get("module") =='playlist'){
  if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_playlist/playlist.php";
  }
}

// Bagian Video
elseif (Gets::get("module") =='video'){
    if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_video/video.php";
  }
}

// Bagian KomentarVideo 
elseif (Gets::get("module") =='komentarvid'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_komentarvid/komentarvid.php";
  }
}

// Bagian Tag Video
elseif (Gets::get("module") =='tagvid'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_tagvid/tagvid.php";
  }
}

// Bagian Identitas Website
elseif (Gets::get("module") =='identitas'){
   if (Session::get("leveluser") =='admin' OR Session::get("leveluser") =='user'){
    include "modul/mod_identitas/identitas.php";
  }
}


// Bagian Daftar Member
elseif (Gets::get("module") =='member'){
  if (Session::get("leveluser") =='admin'){
    include "modul/mod_member/member.php";
  }
}

  
  // Bagian Background
  elseif (Gets::get("module")=='background'){
  if (Session::get("leveluser") =='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_background/background.php";}}   


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}


?>
