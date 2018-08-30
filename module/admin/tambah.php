<?php
session_start();

if (!isset($_SESSION["login"]) ) {
  header("login.php");
}
error_reporting(E_ALL);

include_once 'koneksi.php';
include('header.php');
include('nav.php');
include('sidebar.php');

if (isset($_POST['submit'])) {
	$judul = $_POST['title'];
	$content = $_POST['content'];
	$tanggal = $_POST['tanggal'];

	$sql = 'INSERT INTO artikel (title,content,tanggal)';
	$sql .= "VALUE ('{$judul}', '{$content}', '{$tanggal}')";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('tambah.php');

}
  ?>
  <h2>Tambah Artikel</h2>
  <form method="post" action="tambah.php" enctype="multipart/form-data">
  	<div class="input">
  		<input type="text" name="title" placeholder="Judul Artikel" />
  		 </div>
  		 <div class="input">
  		 	<textarea name="content" cols="50" rows="10" placeholder="Isi artikel"></textarea>
  		   	 </div>
  		   	 <div class="input">
  		   	 	<input type="date" name="tanggal" />
  		   	 	 </div>
  		   	 	 <div class="input">
  		   	 	 	<input type="submit" class="btn btn-large" name="submit" value="Simpan" />
  		   	 	 	   </div>
  	  </form>
<?php
include('footer.php');
?>
