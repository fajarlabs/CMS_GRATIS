
<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php
/* Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open) */
if(count(get_included_files())==1) {
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

if (empty(Session::get("username")) AND empty(Session::get("passuser"))) {
 
  echo "<link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";
  echo "</head>
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
  
} else {
  $aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
  switch(Gets::get("act")) {
  default:
    echo "<div id=main-content> 
          <div class=container_12> 
          <div class=grid_12> 
          <br/>
    	    <a href='?module=halamanstatis&act=tambahhalamanstatis' class='button'>
    	    <span>Tambah Halaman Baru +</span>
          </a></div>";

    if (empty(Gets::get("kata"))){
      echo "<div class=grid_12> 
          <div class=block-border> 
          <div class=block-header> 
          <h1>Halaman Baru</h1>
          <span></span> 
          </div> 
          <div class=block-content> 
          <table id=table-example class=table>
          <thead> 
          <tr> 
          <th>No.</th> 
          <th>Judul</th> 
    	    <th>Link</th>
          <th>Tanggal Posting</th>  
    	     <th>Aksi</th>
          </tr> 
          </thead>
    	    <tbody>";

        $p      = new Paging;
        $batas  = 15;
        $posisi = $p->cariPosisi($batas);

        if (Session::get("leveluser")=='admin'){
          $arrBindParam = array();
          $arrBindParam[] = Database::bind(":posisi", $posisi, PDO::PARAM_INT);
          $arrBindParam[] = Database::bind(":batas", $batas, PDO::PARAM_INT);
          $oResult = $DB->select("SELECT * FROM halamanstatis ORDER BY id_halaman DESC LIMIT :posisi , :batas ",$arrBindParam);
        } else {
          $arrBindParam = array();
          $arrBindParam[] = Database::bind(":posisi", $posisi, PDO::PARAM_INT);
          $arrBindParam[] = Database::bind(":batas", $batas, PDO::PARAM_INT);
          $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
          $oResult = $DB->select("SELECT * FROM halamanstatis WHERE username = :username ORDER BY id_halaman DESC LIMIT :posisi , :batas ", $arrBindParam);
        }
      
        $no = $posisi+1;
        if($oResult->num_rows > 0) {
          foreach($oResult->result as $key => $val) {
            $tgl_posting=tgl_indo($val->tgl_posting);
            $lebar=strlen($no);
            switch($lebar){
              case 1:
                $g="0".$no;
              break;     
              case 2:
                $g=$no;
              break;    
            } 
      	
            echo " 
            <tr class=gradeX> 
            <td width=50>$g</td> 
            <td>".$val->judul."</td> 
            <td>hal-".$val->judul_seo.".html</td>
            <td>$tgl_posting</td>
            <td width=80>
            <a href=?module=halamanstatis&act=edithalamanstatis&id=".$val->id_halaman." title='Edit' class='with-tip'>
            <center><img src='img/edit.png'></a>
            <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=".$val->id_halaman."&namafile=".$val->gambar."') 
            title='Hapus' class='with-tip'>
            &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
            </td></tr>";
            $no++;
          }
        }


        echo "</tbody></table> ";

        if (Session::get("leveluser")=='admin')
          $jmldata = $DB->select("SELECT * FROM halamanstatis")->num_rows;
        else{
          $arrBindParam = array();
          $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
          $jmldata = $DB->select("SELECT * FROM halamanstatis WHERE username = :username ",$arrBindParam)->num_rows;
        }  
        break;    
    } else {
      echo "<table id=table-example class=table><thead> 
      <tr><th>No.</th> 
      <th>Judul</th> 
	    <th>Link</th>
      <th>Gambar</th> 
	    <th>Aksi</th>
      </tr> 
      </thead>
	    <tbody> ";

      if (Session::get("leveluser")=='admin'){
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":kata", "%".Gets::get("kata")."%", PDO::PARAM_STR);
        $arrBindParam[] = Database::bind(":posisi", $posisi, PDO::PARAM_INT);
        $arrBindParam[] = Database::bind(":batas", $batas, PDO::PARAM_INT);
        $oResult = $DB->select("SELECT * FROM halamanstatis WHERE judul LIKE :kata ORDER BY id_halaman DESC LIMIT :posisi , :batas ",$arrBindParam);
      } else {
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
        $arrBindParam[] = Database::bind(":kata", "%".Gets::get("kata")."%", PDO::PARAM_STR);
        $arrBindParam[] = Database::bind(":posisi", $posisi, PDO::PARAM_INT);
        $arrBindParam[] = Database::bind(":batas", $batas, PDO::PARAM_INT);
        $oResult = $DB->select("SELECT * FROM halamanstatis WHERE username = :username AND judul LIKE :kata ORDER BY id_halaman DESC LIMIT :posisi , :batas",$arrBindParam);
      }
  
      $no = $posisi+1;
      if($oResult->num_rows > 0) {
        foreach($oResult as $key => $val) {
          echo "<tr class=gradeX> 
                <td>$no</td> 
                <td>".$val->judul."</td> 
          	      <td>hal-$r".$val->judul_seo.".html</td>
                <td><img src='../foto_statis/small_".$val->gambar."'></td>
          	  
           <td width=80>
             
            <a href=?module=halamanstatis&act=edithalamanstatis&id=".$val->id_halaman." title='Edit' class='with-tip'>
            <center><img src='img/edit.png'></a>
             
            <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=".$val->id_halaman."&namafile=".$val->gambar."') 
            title='Hapus' class='with-tip'>
            &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
          	   
            </td></tr>";
            $no++;
        }
       }
      echo "</tbody></table> ";

      if (Session::get("leveluser")=='admin'){
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":kata", "%".Gets::get("kata")."%", PDO::PARAM_STR);
        $jmldata = Database::select("SELECT * FROM halamanstatis WHERE judul LIKE :kata ")->num_rows;
      } else {
        $arrBindParam = array();
        $arrBindParam[] = Database::bind(":kata", "%".Gets::get("kata")."%", PDO::PARAM_STR);
        $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
        $jmldata = Database::select("SELECT * FROM halamanstatis WHERE username = :username AND judul LIKE :kata ")->num_rows;
      }  
      break;    
    }

  case "tambahhalamanstatis":
    echo "
    <div id='main-content'>
    <div class='container_12'>

    <div class='grid_12'>
    <div class='block-border'>
    <div class='block-header'>
     
    <h1>TAMBAH HALAMAN BARU</h1>
    </div>
    <div class='block-content'>
  	
    <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
  		  
     <p class=inline-small-label> 
     <label for=field4>Judul</label>
     <input type=text name='judul' size=50>
     </p> 
  		  
     <p class=inline-small-label> 
     <label for=field4>Isi Halaman</label>
     <textarea name='isi_halaman'  style='width: 720px; height: 350px;'></textarea>
     </p> 

     <p class=inline-small-label> 
     <span class=label>Gambar</span>
     <input type='file' name='fupload'/><br/>
     </p><br/>
     		  
     	  
     <div class=block-actions> 
     <ul class=actions-right> 
     <li>
     <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
     </li> </ul>
     <ul class=actions-left> 
     <li>
        <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
     </form>";
   break;
   case "edithalamanstatis":
     $arrBindParam = array();
     $arrBindParam[] = Database::bind(":id", Gets::get("id"), PDO::PARAM_INT);
     $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
     $oResult = $DB->select("SELECT * FROM halamanstatis WHERE id_halaman = :id AND username = :username",$arrBindParam);
     if($oResult->num_rows > 0) {
       echo "
       <div id='main-content'>
       <div class='container_12'>

       <div class='grid_12'>
       <div class='block-border'>
       <div class='block-header'>
       
       <h1>EDIT HALAMAN</h1>
       </div>
       <div class='block-content'>
    	
       <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
       <input type=hidden name=id value='".$oResult->result[0]->id_halaman."'>
    		 
    		  
       <p class=inline-small-label> 
       <label for=field4>Judul</label>
      <input type=text name='judul' size=60 value='".$oResult->result[0]->judul."'>
       </p> 
     		  
       <p class=inline-small-label> 
       <label for=field4>Isi Halaman</label>
       <textarea name='isi_halaman' style='width: 550px; height: 500px;'>".$oResult->result[0]->isi_halaman."</textarea></td>
       </p> 
    	
    	<p class=inline-small-label> 
    	<span class=label>Gambar</span>";
      if ($oResult->result[0]->gambar != '') echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src='../foto_statis/".$oResult->result[0]->gambar."' width=200><br/><br/>"; 
        

    	echo "</p><p class=inline-small-label> 
    	<span class=label>Ganti Gambar</span>
    	<input type='file' name='fupload' /></p><br/>";
    	  
      echo "<div class=block-actions> 
          <ul class=actions-right> 
          <li>
          <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
          </li> </ul>
          <ul class=actions-left> 
          <li>
       <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
    	  </form>";
	   }
	break;  
  }
} ?>
   
</div> 
</div>
</div>
<div class='clear height-fix'></div> 
</div></div>