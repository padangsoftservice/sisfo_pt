<?php
include_once 'conf/koneksi.php'; // Koneksi To Datbase
if (isset($_GET['get_auto'])) {
	$get_auto = mysql_real_escape_string($_GET['get_auto']);
	// cek Jika Kosong
	if (!empty($get_auto)){
	// cari NOW
	$qc = mysql_query("SELECT pgt,logo,kode_pgt FROM perguruantinggi WHERE pgt LIKE '%$get_auto%' LIMIT 8");
	?>
	<div id="wrapper_list">
		<div class="_001"></div>
	<?php
	// cek Jika Data Tidak Ada
	if ($rn = mysql_num_rows($qc) > 0){
		while ($rlc = mysql_fetch_array($qc)) {
			$logo = $rlc['logo'];
			$pgt  = strtolower($rlc['pgt']);
			// cek Jika logo kosong
			if ($logo==""){
				$logo_display = "style='background:url(img/Picture.png) no-repeat;'";
			}else{
				$logo_display = "style='background:url(img/logo/$logo) no-repeat;'";
			}
			?>
			<div id="kd<?php echo $rlc['kode_pgt']; ?>" class="list_cari logo_style" <?php echo $logo_display;?> onmousedown="get_coolle('out_data','detail.php?kdpgt=<?php echo $rlc['kode_pgt']; ?>','<?php echo ucwords($pgt); ?>');" >
				<?php echo $rlc['pgt']; ?>
			</div>
			<?php
		}
	}else{ // Jika Data Tidak Ada
		?>
		<div class="list_cari non_logo">
				Maaf <span><?php echo strtoupper($get_auto); ?></span> Tidak Ada Saat Ini ........
		</div>
		<?php
	}
	} //Penutup $get_auto Empty
	?>
	</div>
	<?php
}

?>