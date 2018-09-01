<?php 
require_once __DIR__."/../vendor/autoload.php";

use UserAgentParser\Exception\NoResultFoundException;
use UserAgentParser\Provider\WhichBrowser;

/**
 * 
 */
class AccessLog {

	function __construct() {
		$this->whichBrowser = new WhichBrowser();
		
	}
	
	function logUser($userAgent, $canvasHash, $resHeight, $resWidth, $colorDepth, $lang, $timeZone) {

		require __DIR__."/Connection.php";

		$sql = "INSERT INTO `access_log` (`id`, `useragent`, `datetime`, `canvashash`, `resolutionheight`, `resolutionwidth`, `colordepth`, `language`, `timezone`) VALUES (NULL, '$userAgent', CURRENT_TIMESTAMP, '$canvasHash', '$resHeight', '$resWidth', '$colorDepth', '$lang', '$timeZone');";

		$result = $conn->query($sql);

		if ($result == true) {
			return $conn->insert_id;
		} else {
			return false;
		}
	}

	function getAllLogs() {

		require __DIR__."/Connection.php";
		
		$sql = "SELECT * FROM `access_log`";

		$result = $conn->query($sql);

		$row = array();
		while ($r=$result->fetch_assoc()) {
			$row[] = $r;
		}
		$conn->close();

		return json_encode($row);
	}

	function getBrowserDist() {

		require __DIR__."/Connection.php";

		$sql = "SELECT useragent FROM `access_log`";

		$result = $conn->query($sql);

		$row = array();
		while ($r=$result->fetch_assoc()) {
			$uaparserObj = $this->whichBrowser->parse($r['useragent']);

			$browser = $uaparserObj->isBot() ? $uaparserObj->getBot()->getName() : $uaparserObj->getBrowser()->getName();

			if (isset($row[$browser])) {
				$row[$browser] += 1;
			} else {
				$row[$browser] = 1;
			}
		}
		$conn->close();

		return json_encode($row);
	}

	function getOsDist() {

		require __DIR__."/Connection.php";

		$sql = "SELECT useragent FROM `access_log`";

		$result = $conn->query($sql);

		$row = array();
		while ($r=$result->fetch_assoc()) {
			$uaparserObj = $this->whichBrowser->parse($r['useragent']);

			$os = $uaparserObj->isBot() ? $uaparserObj->getBot()->getName() : $uaparserObj->getOperatingSystem()->getName();

			if (isset($row[$os])) {
				$row[$os] += 1;
			} else {
				$row[$os] = 1;
			}
		}
		$conn->close();

		return json_encode($row);
	}
}

$accessLogObj = new AccessLog();
?>