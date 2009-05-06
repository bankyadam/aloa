#!/usr/bin/php
<?php
/**
 *
 */

// Loading configuration
$config = include 'config.php';

/**
 * @ignore
 */
include 'lib/ApacheLogParser.php';
include 'lib/UserAgent.php';

date_default_timezone_set('Europe/Budapest');

chdir(dirname(__FILE__));

$fp = fopen('25.log', 'r');

echo 'Starting...'.PHP_EOL;

$userData = array();
$country = array();
$alp = new ApacheLogParser($config['format']);
$i = 1;
$log = array();
echo str_repeat(' ', 31);
while (!feof($fp)) {
	if (!($logLine = trim(fgets($fp, 4096)))) {
		continue;
	}
	$save = $logLine;
	echo str_repeat(chr(8), 31).str_pad($i++, 9, ' ', STR_PAD_LEFT).' '.str_pad(memory_get_usage(), 15, ' ', STR_PAD_LEFT).' bytes';

	$logData = $alp->parse($logLine);

	$userId = $logData['host'];
	if (!empty($logData['reqHeader___useragent'])) {
		$userId .= $logData['reqHeader___useragent'];
		$ua = UserAgent::parse($logData['reqHeader___useragent']);
	}

	$time = strtotime($logData['time']);
	$year = date('Y', $time);
	$month = date('n', $time);
	$day = date('j', $time);
	$hour = date('G', $time);

	$fileSize = $logData['lengthCLF'];

	$userId = md5($userId);
	if (empty($userData[$userId])) {
		$country = @geoip_country_code_by_name($logData['host']);
		$userData[$userId] = array(
			'lastVisit' => 0,
			'country'   => $country ? $country : ''
		);
	}
	$isNewVisit = $userData[$userId]['lastVisit'] + 1800 < time();
	$userData[$userId]['lastVisit'] = time();

	if (!isset($log[$year][$month][$day][$hour])) {
		$log[$year][$month][$day][$hour] = array(
			'country' => array(),
			'browser' => array(),
			'spider'  => array(),
			'os'      => array(),
			'page'    => array(),
			'status'  => array()
		);
	}
	$logItem = &$log[$year][$month][$day][$hour];

	// Only if the status code was 2xx
	if ($logData['status'][0] == '2') {
		// Browser
		if (!$ua['bot']) {
			if (!isset($logItem['browser'][$ua['browserid']][$ua['version']])) {
				$logItem['browser'][$ua['browserid']][$ua['version']] = 1;
			}
			else {
				$logItem['browser'][$ua['browserid']][$ua['version']]++;
			}

			// Country
			if (!isset($logItem['country'][$userData[$userId]['country']])) {
				$logItem['country'][$userData[$userId]['country']] = array(
					'visit'     => 0,
					'hit'       => 0,
					'bandwidth' => 0
				);
			}
			$logCountry = &$logItem['country'][$userData[$userId]['country']];
			$logCountry['visit'] += $isNewVisit ? 1 : 0;
			$logCountry['hit']++;
			$logCountry['bandwidth'] += $fileSize;

			// OS
			if (!isset($logItem['os'][$ua['os']])) {
				$logItem['os'][$ua['os']] = 1;
			}
			else {
				$logItem['os'][$ua['os']]++;
			}
		}
		// Spider
		else {
			if (!isset($logItem['spider'][$ua['browserid']])) {
				$logItem['spider'][$ua['browserid']] = array(
					'hit'       => 0,
					'bandwidth' => 0
				);
			}
			$logSpider = &$logItem['spider'][$ua['browserid']];
			$logSpider['hit']++;
			$logSpider['bandwidth'] += $fileSize;
			$logSpider['lastVisit'] = $time;
		}
	}
	else {
		if (!isset($logItem['status'][$logData['status']])) {
			$logItem['status'][$logData['status']] = 1;
		}
		else {
			$logItem['status'][$logData['status']]++;
		}
	}
}
file_put_contents('temp.ser', 'w', serialize($log));
echo PHP_EOL.str_repeat('-', 40).PHP_EOL;
echo 'done.'.PHP_EOL;