<?php
require_once '../../function/db.php';
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
$smt=$_GET['smt'];
$mpid = $_GET['mpid'];
if($mpid==0){
	if($mpid==1){
		$sql2 = "select * from juzamma order by id asc";
		$qu3 = mysqli_query($koneksi,$sql2) or die("database error:". mysqli_error($koneksi));
		echo "<option value='0'>Pilih Surah</option>";
		while($s=mysqli_fetch_array($qu3)) {
			echo "<option value='".$s['id']."'>Surah ".$s['nama']."</option>";
		};
	};
?>