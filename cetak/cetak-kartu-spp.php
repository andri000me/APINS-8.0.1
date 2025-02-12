<?php
 include 'fpdf/fpdf.php';
 include 'exfpdf.php';
 include 'easyTable.php';
 include '../function/db_connect.php';
 function TanggalIndo($tanggal)
	{
		$bulan = array ('Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[ (int)$split[1]-1 ] . ' ' . $split[0];
	};

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
};
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
	
function namahari($tanggal){
    
    //fungsi mencari namahari
    //format $tgl YYYY-MM-DD
    //harviacode.com
    
    $tgl=substr($tanggal,8,2);
    $bln=substr($tanggal,5,2);
    $thn=substr($tanggal,0,4);

    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
    
    switch($info){
        case '0': return "Minggu"; break;
        case '1': return "Senin"; break;
        case '2': return "Selasa"; break;
        case '3': return "Rabu"; break;
        case '4': return "Kamis"; break;
        case '5': return "Jumat"; break;
        case '6': return "Sabtu"; break;
    };
    
};

$ids=$_GET['ids'];
$tapel=$_GET['tapel'];
$jenis=$_GET['jenis'];
$bulans=$_GET['bulan'];
$bulan=explode("-",$bulans);
$bln = array("JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER", "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI");
		$pdf=new exFPDF('P','mm',array(110,165));
		$pdf->AddPage(); 
		$pdf->SetFont('helvetica','',10);

		$table2=new easyTable($pdf, '{110}');
		//$table2->rowStyle('min-height:4'); 
		$table2->easyCell('jajajaj ','font-size:10;font-color:#ffffff;font-style:B;align:C;');
		$table2->printRow();
		//$table2->rowStyle('min-height:4'); 
		$table2->easyCell(' jajajaja','font-size:10;font-color:#ffffff;font-style:B;align:C;');
		$table2->printRow();
		$table2->endTable(5);
		
		$table2=new easyTable($pdf, '{30,26,22,26,16}','align:L');
		$table2->rowStyle('min-height:6'); 
		$table2->easyCell('BULAN','font-size:8;font-color:#ffffff;valign:M;align:C;');
		$table2->easyCell('TANGGAL','font-size:8;font-color:#ffffff;valign:M;align:C;');
		$table2->easyCell('JUMLAH','font-size:8;font-color:#ffffff;valign:M;align:C;');
		$table2->easyCell('OPR','font-size:8;font-color:#ffffff;valign:M;align:C;');
		$table2->easyCell('PARAF','font-size:8;font-color:#ffffff;valign:M;align:C;');
		$table2->printRow();
		for ($x = 1; $x <= 12; $x++) {
			if (in_array($x, $bulan)){
				$kartu=$connect->query("select * from pembayaran where peserta_didik_id='$ids' and tapel='$tapel' and jenis='$jenis' and bulan='$x'")->fetch_assoc();
				$bulanspp=$kartu['bulan'];
				$table2->rowStyle('min-height:6');
				$table2->easyCell($bln[$x-1],'font-size:8;align:L;');
				$table2->easyCell($kartu['tanggal'],'font-size:8;align:L');
				$table2->easyCell(number_format($kartu['bayar'],0,',','.'),'font-size:8;align:L');
				$table2->easyCell('ADMIN','font-size:8;align:L');
				$table2->easyCell('','font-size:8;align:L');
				$table2->printRow();
			}else{
				$table2->rowStyle('min-height:6');
				$table2->easyCell('','font-size:8;align:L;');
				$table2->easyCell('','font-size:8;align:L');
				$table2->easyCell('','font-size:8;align:L');
				$table2->easyCell('','font-size:8;align:L');
				$table2->easyCell('','font-size:8;align:L');
				$table2->printRow();
			}
		}
		
		
	
		
		
		
		
			$pdf->Output();
			//$pdf->Output('D',$namafilenya);
		 


 

?>