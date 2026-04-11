<?php  
$host = "localhost";
$user = "root";
$pass = "";
$db = "ipl_payment";
$conn = mysqli_connect($host, $user, $pass, $db);
function DateToIndo($date) {
$BulanIndo = array("Januari", "Februari", "Maret", "April",
"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
"November", "Desember");

// memisahkan format tahun menggunakan substring
$tahun = substr($date, 0, 4);

// memisahkan format bulan menggunakan substring
$bulan = substr($date, 5, 2);

// memisahkan format tanggal menggunakan substring
$tgl = substr($date, 8, 2);

$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

return($result);
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
function bulanIndo($angka){
	switch ($angka) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
//menghitung denda
$today = date('d');
$monthnow = date('n');
if($today == 21){
	$belumbayar = mysqli_query($conn, "SELECT * FROM tagihan WHERE status='0' AND flag_bulan_denda != '$monthnow'");
	while ($rowBelumBayar = mysqli_fetch_assoc($belumbayar)) {
		$id = $rowBelumBayar['id'];
		$denda = 0.05 * $rowBelumBayar['total'];
		mysqli_query($conn, "UPDATE tagihan SET denda=(denda+$denda), total=(tagihan_kebersihan + tagihan_keamanan + tagihan_listrik + tagihan_air + denda), flag_bulan_denda='$monthnow' WHERE id='$id'");
	}
}
?>