<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
   echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
}
else {
	$cek=user_akses($_GET[module],$_SESSION[sessid]);
	if($cek==1 OR $_SESSION[leveluser]=='admin'){


	$aksi="modul/mod_kodehtml/aksi_kodehtml.php";
	switch($_GET[act]){
	  default:
		   echo "
  <script>
  function confirmdelete(delUrl) {
     if (confirm(\"Anda yakin ingin menghapus?\")) {
        document.location = delUrl;
     }
  }
  </script>
		   <div id='main-content'>
		   <div class='container_12'>
		   <div class=grid_12> 
		   <br/>
		   <a href='?module=kodehtml&act=tambahkodehtml' class='button'>
		   <span>Tambahkan Kode HTML +</span>
		   </a></div>

		   <div class='grid_12'>
		   <div class='block-border'>
		   <div class='block-header'>
		   <h1>DAFTAR KODE HTML</h1>
		   <span></span> 
		   </div>
		   <div class='block-content'>		
		    		  
		   <table id='table-example' class='table'>	  
			  
		   <thead><tr>	
		   	<th>Judul</th>
		   <th>Kode HTML (copy dan paste di template file php )</th>
		   
		   <th>Aksi</th>
		   
		    </thead>
		    <tbody>";
			
		    $tampil = mysql_query("SELECT * FROM kode_html");
		   
		   while($r=mysql_fetch_array($tampil)){
		 
		   echo "
		   <tr class=gradeX> 
		   <td>$r[judul]</td>
		   <td><span style='font-weight:bold;color:green;'>".htmlentities('<?php echo getHtml(\''.$r['kode'].'\'); ?>')."</span></td>
		   
						
		   <td width=80>
		   
		   <a href=?module=kodehtml&act=editkodehtml&id=$r[id] title='Edit' class='with-tip'>
		   <center><img src='img/edit.png'></a>
		   
		   <a href=javascript:confirmdelete('$aksi?module=kodehtml&act=hapus&id=$r[id]') 
		   title='Hapus' class='with-tip'>
		   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
			   
		   </td></tr>";
		   }
		   
		   echo "</tbody></table> ";
		 
		    break;    
	    break;
	    case "tambahkodehtml":
		  echo "
		   <div id='main-content'>
		   <div class='container_12'>

		   <div class='grid_12'>
		   <div class='block-border'>
		   
		   <div class='block-header'>
		   <h1>TAMBAH KODE HTML</h1>
		   </div>

		   <div class='block-content'>	   	
			
		   <form method=POST enctype='multipart/form-data' action=$aksi?module=kodehtml&act=add>

		   <p class=inline-small-label> 
		   <label for=field4>Judul </label>
		   <input class='text' name='judul' value='' /> 
		   </p>

		   <p class=inline-small-label> 
		   <label for=field4>Kode HTML </label>
		   <textarea name='html'></textarea>   
		   </p>

		   <div class=block-actions> 
		   <ul class=actions-right> 
		   
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=kodehtml'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
		   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
		   </form>";
	    break;
	    case "editkodehtml":
	    	$id = $_GET['id'];
	    	$q = mysql_query("SELECT * FROM kode_html WHERE id = '$id'");
	    	$r = mysql_fetch_array($q);
		  echo "
		   <div id='main-content'>
		   <div class='container_12'>

		   <div class='grid_12'>
		   <div class='block-border'>
		   
		   <div class='block-header'>
		   <h1>TAMBAH KODE HTML</h1>
		   </div>

		   <div class='block-content'>	   	
			
		   <form method=POST enctype='multipart/form-data' action=$aksi?module=kodehtml&act=update>
		   <input type='hidden' class='text' name='id' value='$r[id]' />

		   <p class=inline-small-label> 
		   <label for=field4>Judul </label>
		   <input name='judul' class='text' value='$r[judul]' />  
		   </p>

		   <p class=inline-small-label> 
		   <label for=field4>Kode HTML </label>
		   <textarea name='html'>$r[html]</textarea>   
		   </p>

		   <div class=block-actions> 
		   <ul class=actions-right> 
		   
		   <li>
		   <a class='button red' id=reset-validate-form href='?module=kodehtml'>Batal</a>
		   </li> </ul>
		   <ul class=actions-left> 
		   <li>
		   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
		   </form>";
	    break;
	}
	   //kurawal akhir hak akses module
	} else {
		echo akses_salah();
	}
} ?>
</div> 
</div>
</div>
<div class='clear height-fix'></div> 
</div></div>