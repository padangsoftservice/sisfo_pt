<?php
include_once 'conf/koneksi.php'; // Koneksi To Datbase
if (isset($_GET['kdpgt'])) {
	$kdpgt = $_GET['kdpgt'];
	// display Data For Get Detail
	$qd = mysql_query("SELECT * FROM perguruantinggi WHERE kode_pgt = '$kdpgt'");
	// out Here
	$rl = mysql_fetch_array($qd);
	$pgt    = strtolower($rl['pgt']);
	$alamat = $rl['alamat'];
	$tlp    = $rl['tlp'];
	$web    = $rl['web'];
	$logo   = $rl['logo'];
	// cek Jika logo Belum Ada
	if (empty($logo)){
		$display_logo = "style='background:url(img/Picture.png) no-repeat;'";
	}else{
		$display_logo = "style='background:url(img/logo/$logo) no-repeat;'";
	}
	// chek jika data ada or not
	if ($alamat ==""){
		$alamat ="Alamat Belum Ada";
	}
	if ($tlp =="0") {
		$tlp ="Telepon Belum Ada";
	}
	if ($web =="") {
		$web;
	}else{
		$web ="onclick=\"link_out('http://$web');\"";
	}
}
include_once 'detail_inc.php'; //inculed detail data
?>

