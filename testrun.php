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

$fp = fopen('small.log', 'r');

echo 'Starting...'.PHP_EOL;

$userIds = array();
$country = array();
$alp = new ApacheLogParser($config['format']);
$i = 1;
echo str_repeat(' ', 31);
while (!feof($fp)) {
	if (!($logLine = trim(fgets($fp, 4096)))) {
		continue;
	}
	$save = $logLine;
	echo str_repeat(chr(8), 31).str_pad($i++, 9, ' ', STR_PAD_LEFT).' '.str_pad(memory_get_usage(), 15, ' ', STR_PAD_LEFT).' bytes';

	$log = $alp->parse($logLine);
	$time = strtotime($log['time']);

	$userId = $log['host'];
	if (!empty($log['reqHeader___useragent'])) {
		$userId .= $log['reqHeader___useragent'];
		$ua = UserAgent::parse($log['reqHeader___useragent']);
	}

	$userId = md5($userId);
	if (empty($userIds[$userId])) {
		$countryCode = geoip_country_code_by_name($log['host']);
		if (empty($countryCode)) {
			$countryCode = 'XX';
		}
		$userIds[$userId] = array(
			'lastVisit' => time(),
			'visitCount' => 1,
			'hit' => array(
				1 => 1
			),
			'country' => $countryCode
		);
		if (empty($country[$userIds[$userId]['country']])) {
			$country[$userIds[$userId]['country']] = array(
				'visitCount' => 1,
				'hit'        => 1
			);
		}
		else {
			$country[$userIds[$userId]['country']]['visitCount']++;
			$country[$userIds[$userId]['country']]['hit']++;
		}
	}
	else {
		// New visit
		if ($userIds[$userId]['lastVisit'] + 1800 < time()) {
			$userIds[$userId]['visitCount']++;
		}
		$userIds[$userId]['lastVisit'] = time();
		$userIds[$userId]['hit'][$userIds[$userId]['visitCount']]++;

		$country[$userIds[$userId]['country']]['visitCount']++;
		$country[$userIds[$userId]['country']]['hit']++;
	}
}
echo PHP_EOL.str_repeat('-', 40).PHP_EOL;
echo 'hit: '.array_sum(array_map('hit', $userIds)).PHP_EOL;
echo 'visit: '.array_sum(array_map('visit', $userIds)).PHP_EOL;
echo 'visitor: '.count($userIds).PHP_EOL;
array_map('country', $country, array_keys($country));

function visit($a)
{
	return $a['visitCount'];
}

function hit($a)
{
	return array_sum($a['hit']);
}

function country($c, $k)
{
	echo '| '.$k.' | '.str_pad($c['visitCount'], 10, ' ', STR_PAD_LEFT).' | '.str_pad($c['hit'], 10, ' ', STR_PAD_LEFT).' |'.PHP_EOL;
}
