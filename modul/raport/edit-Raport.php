<?php
require_once '../../function/db.php';
$idr=$_POST['rowid'];
$cek="SELECT * FROM raport_k13 WHERE id_raport='$idr'";
$hasil=mysqli_query($koneksi,$cek);
$utt=mysqli_fetch_array($hasil);
$idsis=$utt['id_pd'];
$idmp=$utt['mapel'];
$nsiswa=mysqli_fetch_array(mysqli_query($koneksi,"select * from siswa where peserta_didik_id='$idsis'"));
$nmp=mysqli_fetch_array(mysqli_query($koneksi,"select * from mapel where id_mapel='$idmp'"));
?>
						