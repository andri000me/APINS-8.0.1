<?php 

require_once '../../function/db_connect.php';
//if form is submitted
if($_GET) {	

	$validator = array('success' => false, 'messages' => array());
	$ids=$_GET['ids'];
	$jenis=$_GET['jenis'];
	if(empty($ids)){
		$validator['success'] = false;
		$validator['messages'] = "Error tuh";
	}else{
			if($jenis==1){
				$sql1 = "DELETE FROM tarif_spp WHERE id='$ids'";
				$query1 = $connect->query($sql1);
			}else{
				$sql1 = "DELETE FROM tunggakan_lain WHERE id='$ids'";
				$query1 = $connect->query($sql1);
			};
			if($query1 === TRUE) {			
				$validator['success'] = true;
				$validator['messages'] = "OK!";		
			} else {		
				$validator['success'] = false;
				$validator['messages'] = "Kok Error ya???";
			};
		
	};
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}