<?php include 'config.php';

include('header.php');
include('nav.php');
include('sidebar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel Komentar</title>
</head>
<body>
	<?php
		$sql = "SELECT * FROM artikel";
		$que = mysql_query($sql);
		while ($res=mysql_fetch_array($que)) { ?>

	<a href="detail.php?detail=<?php echo $res['id_artikel']; ?>">
		<h1><?php echo $res['judul']; ?></h1>
	</a>
	<h4><?php echo substr($res['isi'],0,250); ?></h4>
	<a href="detail.php?detail=<?php echo $res['id_artikel']; ?>">
		<h5>Read more</h5>
	</a>

	<?php } 
	include('komen.php');?>

</body>
</html>