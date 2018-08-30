<?php

include_once 'koneksi.php';
include('header.php');
include('nav.php');


$q="";
if(isset($_GET['submit'])&& !empty($_GET['q'])){
  $q= $_GET['q'];
  $sql_where = " WHERE title LIKE '{$q}%'";
}
$title = 'Artikel';
include_once 'koneksi.php';
$sql = 'SELECT * from artikel';
$sql_count = "SELECT COUNT(*) FROM artikel";


if (isset($sql_where)){
  $sql .=$sql_where;

$sql_count .=$sql_where;
 
}

$result_count = mysqli_query($conn, $sql_count);
$count = 0;
if ($result_count){
  $r_data = mysqli_fetch_row($result_count);
  $count = $r_data[0];
}
$per_page = 5;
$num_page = ceil($count / $per_page);
$limit = $per_page;
if (isset($_GET['page'])){
  $page = $_GET['page'];
  $offset = ($page - 1) * $per_page;
}else{
  $offset = 0;
  $page = 1;
}
$sql .= " LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);


include('sidebar.php');
 ?>
 <div>
 <br/>
 <br/>
 <a href="tambah.php" class="btn btn-large">Tambah Artikel</a>
</div>
<form action="" method="get">
      <label for="q">Cari data: </label>
      <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
      <input type="submit" name="submit" value="Cari" class="btn btn-primary">
    </form>
    <?php 
    if($result):
     ?>
 <table>
 	<tr>
 		<th>Judul</th>
 		<th>Tanggal</th>
 		<th>Aksi</th>
 	</tr>
 	<?php while($row=mysqli_fetch_array($result)): ?>

 	<tr>
 		<td><?php echo $row['title']; ?></td>
 		<td><?php echo date("j F Y",strtotime($row['tanggal']));  ?></td>
 		<td>
 			<a class="btn btn-default" href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
 			<a class="btn btn-alert" onclick="return confirm('Yakin akan menghapus data ?');" href="hapus.php?id=<?php echo $row['id'];?>">Delete</a>
 		</td>
 	</tr>
<?php endwhile;?>
 </table>
 <ul class="pagination">
       <li><a href="index.php">&laquo;</a></li>
       <?php for ($i=1; $i <=$num_page; $i++) {
         $link = "?page={$i}";
         if (!empty($q)) $link .= "&q={$q}";
         $class = ($page == $i ? 'active' : '');
         echo "<li><a class=\"{$class}\" href=\"{$link}\">{$i}</a></li>";
                } ?>
                <li>
                  <a href="index.php" ></a>
                  <a href="index.php"></a>
                  
                </li>
                <li><a href="index.php?page=2">&raquo;</a></li>
              </ul>
 
 <?php endif; ?>
 <?php
 include('footer.php');
 ?>
