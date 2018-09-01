<?php
$SER_ROOT = "..";
$TITLE = "Telegonus";
$PAGE_ID = "home";

include $SER_ROOT."/modules/header.php";
include $SER_ROOT."/modules/navbar.php";

// require_once $SER_ROOT."/config/Logger.php";
require_once $SER_ROOT."/service/AccessLog.php";

?>
<section class="section">
	<div class="container">
		<h1 class="title">
			Home
		</h1>
		<p class="subtitle">
			Control & View status of <strong class="brand-font is-size-4">Telegonus</strong> from here! 
		</p>
		<div class="columns">
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box">1</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box"><?php print_r(get_browser(null, true)) ?></div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box">1</div>
			</div>
			<div class="column">
				<div class="box">1</div>
			</div>
		</div>
		
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
	var browserDistData = JSON.parse('<?=$accessLogObj->getBrowserDist()?>');
	console.log(browserDistData);

	var osDistData = JSON.parse('<?=$accessLogObj->getOsDist()?>');
	console.log(osDistData);

</script>
<?php
include $SER_ROOT."/modules/footer.php";
?>