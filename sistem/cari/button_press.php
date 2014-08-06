<?php
include_once '../../conf/koneksi.php'; // Koneksi To Datbase
if(isset($_POST['data_cari'])){
	$data_cari = strtoupper($_POST['data_cari']);
	// set For Query
	$q = mysql_query("SELECT * FROM perguruantinggi WHERE pgt ='$data_cari'");
	$rl = mysql_fetch_array($q);
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
	// check
	if ($rl['pgt'] == $data_cari){
		include_once '../../detail_inc.php'; //inculed detail data
	}elseif($rl['pgt'] != $data_cari){
		// query For many Result
		$q = mysql_query("SELECT pgt FROM perguruantinggi WHERE pgt LIKE '%$data_cari%' LIMIT 20 ");
		$rn = mysql_num_rows($q);
		if ($rn > 0){
			// llist Data
			while ($rl = mysql_fetch_array($q)) {
				echo $rl['pgt']."<br />";
			}
		}else{
		?>
<div id="wrapper_detail">
	<div class="header no_result">
		<span style="color:red;">Maaf Tidak Ada Kata Kunci Yang Sesuai</span>
	</div>
</div>	
<?php	
		}
		?>

		<?php
	}
}
?>