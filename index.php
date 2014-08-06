<!DOCTYPE html>
<html>
	<head>
		<title>PT-INFO</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/index.style.css" />
		<script type="text/javascript" src="js/javascript.js"></script>
	</head>
	<body>
		<div id="wrapper_over">
			<div id="wrapper_toolbar">
			<div class="wrapper_cari">
				<form>
					<div class="d_fcari">
						<input type="text" maxlength="50" id="p_cari" placeholder="Search Your Coollage ........" onkeyup="auto_cari(p_cari.value,'auto_cari','auto_cari.php?get_auto=');" />
						<input type="button" id="b_cari" onclick="cari_now('out_data','sistem/cari/button_press.php');" />
						<div id="auto_cari"></div>
					</div>
					<div class="bersihL"></div>
				</form>
			</div>
			</div>
			<div id="out_data">
				
			</div>
		</div>
	</body>
</html>