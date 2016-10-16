<?php 
error_reporting(0);
include "config/koneksi.php";
if(isset($_POST['submit'])) {
	$name = mysql_real_escape_string($_POST['name']); 
	$email = mysql_real_escape_string($_POST['email']);
	$subject = mysql_real_escape_string($_POST['subject']);
	$message = mysql_real_escape_string($_POST['message']);
	$tanggal = date("Y-m-d");  
	$jam = date("H:i:s");  
	$dibaca = 'N';

	$query = "INSERT INTO hubungi (nama,email,subjek,pesan,tanggal,jam,dibaca) 
					  VALUES ('$name','$email','$subject','$message','$tanggal','$jam','$dibaca')";
	$q = mysql_query($query);
	echo '<script type="text/javascript">alert("Pesan telah terkirim!");</script>';
}
?>

<div class="contact">
	<div class="container">
		<?php echo getHtml('kode-19'); ?>
		<div class="contact-form">
			<h3 class="tittle">FORMULIR KONTAK</h3>
			<form action="#" method="post">
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="subject" placeholder="Subject">
				<div class="clearfix"> </div>
				<textarea placeholder="Message" name="message"></textarea>
				<input name="submit" type="submit" value="KIRIM">
			</form>
		</div>
	</div>
</div>