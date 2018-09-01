<?php 

/**
 * 
 */
class AccessLog {
	
	function logUser($userAgent, $canvasHash, $resHeight, $resWidth, $colorDepth, $lang, $timeZone) {

		require_once __DIR__."/Connection.php";

		$sql = "INSERT INTO `access_log` (`id`, `useragent`, `datetime`, `canvashash`, `resolutionheight`, `resolutionwidth`, `colordepth`, `language`, `timezone`) VALUES (NULL, '$userAgent', CURRENT_TIMESTAMP, '$canvasHash', '$resHeight', '$resWidth', '$colorDepth', '$lang', '$timeZone');";

		$result = $conn->query($sql);

		if ($result == true) {
			return $conn->insert_id;
		} else {
			return false;
		}
	}

	function getAllLogs() {

		require_once __DIR__."/Connection.php";
		
		$sql = "SELECT * FROM `access_log`";

		$result = $conn->query($sql);

		$row = array();
		while ($r=$result->fetch_assoc()) {
			$row[] = $r;
		}
		$conn->close();

		return json_encode($row);
	}
}

$accessLog = new AccessLog();
?>