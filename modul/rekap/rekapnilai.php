<?php 
	$ada2=$connect->query("select * from raport_k13 where id_pd='$idp' and kelas='$ab' and smt='$smt' and tapel='$tapel' and mapel='2' and jns='$jns'")->num_rows;
	$nrh=$connect->query("select avg(nilai) as rerata from raport_k13 where id_pd='$idp' and kelas='$ab' and smt='$smt' and tapel='$tapel' and jns='$jns'")->fetch_assoc();
			$s['nama'],
			$nilai1,$nilai2,$nilai3,$nilai4,$nilai5,$nilai6,$nilai7,$nilai8,$nilai9,$nilai10,$nilai11,
			number_format($nrt['rerata'],2),
			number_format($nrh['rerata'],2)
		);