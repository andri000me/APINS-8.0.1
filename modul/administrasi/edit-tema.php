<?php
require_once '../../function/db.php';
$idr=$_POST['rowid'];
$cek="SELECT * FROM tema WHERE id_tema='$idr'";
$hasil=mysqli_query($koneksi,$cek);
$utt=mysqli_fetch_array($hasil);
?>
						<div class="modal-body">