<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php    
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

//cek hak akses user
$cek=user_akses(Gets::get("module"),Session::get("sessid"));
if($cek==1 OR Session::get("leveluser") =='admin'){


$aksi="modul/mod_users/aksi_users.php";
switch(Gets::get("act")){
  // Tampil User
  default:
echo "";

    if (empty($_GET['kata'])){
	
	
   echo "
     
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=user&act=tambahuser' class='button'>
   <span>Tambahkan User</span>
   </a></div>
  
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MANAJEMEN USER</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>
		  
   <thead><tr>
  
   <th>No.</th> 
   <th>Username</th> 
   <th>Nama Lengkap</th> 
   <th>Email</th>
   <th>Foto</th>
   <th>Blokir</th> 
   <th>Aksi</th>
   </tr> 
   </thead>
   <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);
    $oResult = null;

   if (Session::get("leveluser")=='admin'){
      $query = "SELECT * FROM users ORDER BY id_session DESC LIMIT :posisi , :batas";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":posisi", $posisi, PDO::PARAM_INT);
      $arrBindParam[] = Database::bind(":batas", $batas, PDO::PARAM_INT);
      $oResult = $DB->select($query,$arrBindParam);
    } else{
      $query = "SELECT * FROM users WHERE username = :username ";
      $arrBindParam = array();
      $arrBindParam[] = Database::bind(":username", Session::get("username"), PDO::PARAM_STR);
      $oResult = $DB->select($query,$arrBindParam);
    }

    if($oResult != null) {
      if($oResult->num_rows > 0) {
          $no = $posisi+1;
          foreach($oResult->result as $key => $val) {
            $lebar=strlen($no);
            switch($lebar){
              case 1:
                $g="0".$no;
                break;     
              case 2:
                $g=$no;
                break;     
            } 
          
           echo "<tr class=gradeX> 
           
           <td width=50><center>$g</center></td>
           <td>".$val->username."</td>
           <td>".$val->nama_lengkap."</td>
           <td><a href=mailto:".$val->email.">".$val->email."</a></td>
           <td><center><img src='../foto_user/small_".$val->foto."' width=50></center></td>
           <td align=center><center>".$val->blokir."</center></td>
           
           <td valign=middle><a href=?module=user&act=edituser&id=".$val->id_session." rel=tooltip-top title='Edit' class='with-tip'>
           <center><img src='img/edit.png'></center></a> 
           
           </td> </tr> ";
          
            $no++; 
        }
      }
    }
	
   echo "</tbody></table> ";

   break;  }

  
  
   case "tambahuser":
   if (Session::get("leveluser")=='admin'){
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH USER</h1>
   </div>
   <div class='block-content'>
   
   <form method=POST action='$aksi?module=user&act=input' enctype='multipart/form-data'>
	  
   <p class=inline-small-label> 
   <label for=field4>Username</label>
   <input type=text name='username' size=50>
   </p> 
	 	  
   <p class=inline-small-label> 
   <label for=field4>Password</label>
   <input type=text name='password'  size=50>
   </p> 

   <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type=text name='nama_lengkap' size=50>
   </p> 
	 	  
   <p class=inline-small-label> 
   <label for=field4>E-mail</label>
   <input type=text name='email' size=50>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>No.Telp/HP</label>
   <input type=text name='no_telp'size=50>
   </p> 
   
   <p class=inline-small-label> 
   <span class=label>Upload Foto</span>
   <input type='file' name='fupload' /><br/>
   </p><br/>";
	  

   echo "<h3>PILIH HAK AKSES MODUL: </h3>";
	  
   $query = "SELECT * FROM modul WHERE publish='Y' AND status='user'";
   $oResult = $DB->select($query);
	 
   foreach($oResult->result as $key => $val) {
       echo "<label><input name='modul[]' type='checkbox' value='".$val->id_modul."' />
       <span class style=\"color:#000;\">".$val->nama_modul."</span></label> ";
   }

    echo "<br/><br/><div class=block-actions> 
    <ul class=actions-right> 
    <li>
    <a class='button red' id=reset-validate-form href='?module=user'>Batal</a>
    </li> </ul>
    <ul class=actions-left> 
    <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </form>"; 

 } else {

   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>

   <div class='block-header'>
   <h1>Anda tidak berhak mengakses halaman ini !</h1>
   </div>";  
 }
	 
   break;
    
   case "edituser":
   $query = "SELECT * FROM users WHERE id_session = :id ";
   $arrBindParam = array();
   $arrBindParam[] = Database::bind(":id", Gets::get("id"), PDO::PARAM_INT);
   $oResult = $DB->select($query,$arrBindParam);

   /* filter */
   $id_session = isset($oResult->result[0]->id_session) ? $oResult->result[0]->id_session : "";
   $blokir = isset($oResult->result[0]->blokir) ? $oResult->result[0]->blokir : "";
   $username = isset($oResult->result[0]->username) ? $oResult->result[0]->username : "";
   $nama_lengkap = isset($oResult->result[0]->nama_lengkap) ? $oResult->result[0]->nama_lengkap : "";
   $email = isset($oResult->result[0]->email) ? $oResult->result[0]->email : "";
   $no_telp = isset($oResult->result[0]->no_telp) ? $oResult->result[0]->no_telp : "";
   $foto = isset($oResult->result[0]->foto) ? $oResult->result[0]->foto : "";

   if(Session::get("leveluser")=='admin'){
	
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT USER</h1>
   </div>
   <div class='block-content'>
     
   <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value='$id_session'>
   <input type=hidden name=blokir value='$blokir'>
	  
   <p class=inline-small-label> 
   <label for=field4>Username</label>
   <input type=text name='username' value='$username' disabled>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Password</label>
   <input type=text name='password'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type=text name='nama_lengkap' size=30  value='$nama_lengkap'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>E-mail</label>
   <input type=text name='email' size=30 value='$email'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>No.Telp/HP</label>
   <input type=text name='no_telp' size=30 value='$no_telp'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Foto</label>
   <img src='../foto_user/small_$foto' width=100>
   </p>   
    
   <p class=inline-small-label> 
   <span class=label>Ganti Foto</span>
   <input type='file' name='fupload' /><br/>
   </p><br/>";
		  
	
    if ($blokir=='N'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Ya   
                                           <input type=radio name='blokir' value='N' checked> Tidak </td></tr>";}
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Ya  
                                           <input type=radio name='blokir' value='N'> Tidak </td></tr>";}
										  
	$query = "SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session = :id";
  $arrBindParam = array();
  $arrBindParam[] = Database::bind(":id", Gets::get("id"), PDO::PARAM_INT);
  $oResult = $DB->select($query,$arrBindParam);
	
	echo "<br/><br/><tr><td><b>Hak Akses</b></td><td> :";
	foreach($oResult->result as $key => $val){
  	echo " ( ".$val->nama_modul." - <a href=javascript:confirmdelete('$aksi?module=user&act=hapusmodule&id=".$val->id_umod."&sessid=".Session::get("sessid")."')>
  	 <img src='img/icn_trash.png' title='Hapus'></a>)";
  }

	echo "</td></tr>";
	$query = "SELECT * FROM modul WHERE publish='Y' AND status='user'";
  $oResult = $DB->select($query);
	echo "<br/><br/><tr><td valign=top><b>Tambah Modul</b></td><td> : ";
	
	foreach($oResult->result as $key => $val) {
	   echo "<label><input name='modul[]' type='checkbox' value='".$val->id_modul."' />".$val->nama_modul."</label> ";
  }
	
	echo "</td></tr>";
    
  echo "<br/><br/><div class=block-actions> 
    <ul class=actions-right> 
    <li>
    <a class='button red' id=reset-validate-form href='?module=user'>Batal</a>
    </li> </ul>
    <ul class=actions-left> 
    <li>
    <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	</form>";
} else {		  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT USER</h1>
   </div>
   <div class='block-content'>
     
   <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value='$id_session'>
   <input type=hidden name=blokir value='$blokir'>
	  
   <p class=inline-small-label> 
   <label for=field4>Username</label>
   <input type=text name='username' value='$username' disabled>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Password</label>
   <input type=text name='password'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type=text name='nama_lengkap' size=30  value='$nama_lengkap'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>E-mail</label>
   <input type=text name='email' size=30 value='$email'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>No.Telp/HP</label>
   <input type=text name='no_telp' size=30 value='$no_telp'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Foto</label>
   <img src='../foto_user/small_$foto' width=100>
   </p>   
    
   <p class=inline-small-label> 
   <span class=label>Ganti Foto</span>
   <input type='file' name='fupload' /><br/>
   </p><br/>";
   
    echo "<br/><br/><div class=block-actions> 
    <ul class=actions-right> 
    <li>
    <a class='button red' id=reset-validate-form href='?module=user'>Batal</a>
    </li> </ul>
    <ul class=actions-left> 
    <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	</form>";}     
	
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }

   }
   ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
