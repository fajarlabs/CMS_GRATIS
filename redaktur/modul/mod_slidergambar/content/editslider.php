  <?php 
  $id = $_GET['id'];
  $q = mysql_query("SELECT * FROM slider_gambar WHERE id='$id'");
  $r = mysql_fetch_array($q);
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   
   <div class='block-header'>
   <h1>EDIT SLIDER GAMBAR</h1>
   </div>

   <div class='block-content'>	   	
	
   <form method=POST enctype='multipart/form-data' action='$aksi?module=slidergambar&act=update'>
   <input type=hidden name=id value=$r[id] />
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' value='$r[judul]' size=30>   
   </p>

   <p class=inline-small-label> 
   <label for=field4>Keterangan </label>
   <textarea name='keterangan'>$r[keterangan]</textarea>   
   </p>

   <p class=inline-small-label> 
   <label for=field4>Gambar </label>
   <img width='100px' src='../img_slider/$r[gambar]' />
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Upload Gambar</label>
   <input type=file name='fupload' size=30>   
   </p>

   <div class=block-actions> 
   <ul class=actions-right> 
   
   <li>
   <a class='button red' id=reset-validate-form href='?module=slidergambar'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </form>";