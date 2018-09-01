<?php
require_once __DIR__."/../vendor/autoload.php";

use UserAgentParser\Exception\NoResultFoundException;
use UserAgentParser\Provider\WhichBrowser;

$uaparserObj = (new WhichBrowser());

?>