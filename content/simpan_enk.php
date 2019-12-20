<?php
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama_file'];
	$cipher = $_POST['secret'];
	
	$namafile = $nama. ".txt";
	$strlength = strlen($cipher); //gets the length of our $content string.
	$create = fopen("cipher/" .$namafile, "w"); //uses fopen to create our file.
	$write = fwrite($create, $cipher, $strlength); //writes our string to our file.
	$close = fclose($create); //closes our file
	
	echo "<script>alert('File Berhasil Dibuat');location.replace('index.php?page=encryp');</script>";
}
?>