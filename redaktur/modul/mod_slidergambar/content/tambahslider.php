  <?php 
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   
   <div class='block-header'>
   <h1>BUAT SLIDER GAMBAR</h1>
   </div>

   <div class='block-content'>	   	
	
   <form method=POST enctype='multipart/form-data' action=$aksi?module=slidergambar&act=add>

   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' size=30>   
   </p>

   <p class=inline-small-label> 
   <label for=field4>Keterangan </label>
   <textarea name='keterangan'></textarea>   
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