<?php
include_once 'koneksi.php';
include('header.php');
include('nav.php');


$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = mysqli_query($conn, $sql);
#print_r($conn);die();


if ($result):
include('sidebar.php');
 ?>
 <a href="tambah.php" class="btn btn-large">Tambah Artikel</a><br>
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
 <?php endif; ?>
 <?php
 include('footer.php');
 ?>
