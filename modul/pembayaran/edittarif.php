<?php
require_once '../../function/db_connect.php';
$idr=$_POST['idspp'];
	$utt=$connect->query("SELECT * FROM tunggakan_lain WHERE id='$idr'")->fetch_assoc();
//$idmp=$utt['jenis'];
?>
						<div class="modal-body">