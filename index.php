<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="result-text">Wait</div>
<img class="result-img">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/placemarker/jQuery-MD5/b985fce4/jquery.md5.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/fingerprint.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		var canvasHash = getCanvasHash(); 

		console.log(canvasHash);
		$('.result-text').html(canvasHash);
		// $('.result-img').attr('src', canvasHash);

		logUser(canvasHash, getResolutionHeight(), getResolutionWidth(), getColorDepth(), getLanguage(), getDateandTime());
	});
</script>
</body>
</html>