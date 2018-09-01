<?php
$SER_ROOT = "..";
$TITLE = "Telegonus";
$PAGE_ID = "home";

include $SER_ROOT."/modules/header.php";
include $SER_ROOT."/modules/navbar.php";

// require_once $SER_ROOT."/config/Logger.php";
// require_once $SER_ROOT."/config/Fingerprint.php";
?>

<section class="section">
	<div class="container">
		<h1 class="title">
			Home
		</h1>
		<p class="subtitle">
			Control & View status of <strong class="brand-font is-size-4">Telegonus</strong> from here! 
		</p>
		<div class="box">
			<canvas id="myChart"></canvas>
		</div>
		<div class="box">
			<h4 class="title is-4">Genuine Fingerprints</h4>
			<table class="table is-hoverable is-fullwidth">
				<thead>
					<tr>
						<th>#</th>
						<th>OS</th>
						<th>Browser</th>
						<th>Canvas MD5</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$fingerprints = json_decode($fingerprintObj->getAllFingerprints(), true);
				$index = 1;
				foreach ($fingerprints as $fingerprint) {
					if ($fingerprint == array() || is_null($fingerprint))
						continue;
				?>
				<tr>
					<td><?=$index++?></td>
					<td class="get-os-icon"><?=$fingerprint[2]?></td>
					<td class="get-browser-icon"><?=$fingerprint[1]?></td>
					<td class="convert-to-md5"><?=$fingerprint[0]?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<?php

?>
<script>
	

</script>
<?php
include $SER_ROOT."/modules/footer.php";
?>