<?php
require_once '../../function/db.php';
$idr=$_POST['rowid'];
$cek="SELECT * FROM jenis_tunggakan WHERE id_tunggakan='$idr'";
$hasil=mysqli_query($koneksi,$cek);
$utt=mysqli_fetch_array($hasil);
?>
						<div class="modal-body">