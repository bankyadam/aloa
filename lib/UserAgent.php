<?php
class UserAgent
{
	// Order is important!
	private static $browser = array(
		// Browers
		'chrome' => 'chrome',
		'omniweb' => 'omniweb',
		'shiira' => 'shiira',
		'safari' => 'safari',
		'applewebkit' => 'applewebkit',
		'konqueror' => 'konqueror',
		'opera' => 'opera',
		'netscape' => 'netscape',
		'navigator' => 'netscape',
		'camino' => 'camino',
		'seamonkey' => 'seamonkey',
		'flock' => 'flock',
		'firefox' => 'firefox',
		'galeon' => 'galeon',
		'k-meleon' => 'k-meleon',
		'gecko' => 'gecko',
		'msie' => 'msie',
		'obigo-browser' => 'obigo-browser',
		// Mobilephone vendors
		'nokia' => 'nokia',
		'samsung' => 'samsung',
		'sec-' => 'sonyericsson',
		'sonyericsson' => 'sonyericsson',
		'ericsson' => 'ericsson',
		'alcatel' => 'alcatel',
		'lg-' => 'lg',
		'mot-' => 'motorola',
		'panasonic' => 'panasonic',
		'philips' => 'philips',
		'sagem' => 'sagem',
		'sie-' => 'siemens',
		'sharp-' => 'sharp',
		// Other mobilephones
		'midp-1.0' => 'midp-1.0',
		'midp-2.0' => 'midp-2.0',
		'midp'     => 'midp',
		// Bots, crawlers, spiders
		'msnbot' => 'msnbot',
		'slurp' => 'yahooslurp',
		'googlebot' => 'googlebot',
		'twiceler' => 'twiceler',
		'ask jeeves' => 'askjeeves',
		'scoutjet' => 'scoutjet',
		'charlotte' => 'searchme',
		'oozbot' => 'ozzbot',
		'akregator' => 'akregator',
		'surveybot' => 'surveybot',
		'similarpages' => 'similarpages',
		'baiduspider' => 'baiduspider',
		'ia_archiver' => 'ia_archiver',
		'psbot' => 'psbot',
		'speedy spider' => 'speedy spider',
		'feedfetcher-google' => 'feedfetcher-google',
		'robotgenius' => 'robotgenius',
		'yacybot' => 'yacybot',
		'blogbot' => 'blogbot',
		'sapphirewebcrawler' => 'sapphirewebcrawler',
		'yanga' => 'yanga',
		'gigabot' => 'gigabot',
		'netseer' => 'netseer',
		'grub' => 'grub',
		'bot' => 'robot',
		'crawl' => 'robot',
		'spider' => 'robot',
		//Others
		'java' => 'java',
		'microsoft-webdav-miniredir' => 'mswebdav',
		'wget' => 'wget',
		'leechget' => 'leechget',
		'python-urllib' => 'urllib',
		'httpcomponents' => 'httpcomponents',
		'dragonfly' => 'dragonfly',
		'sendhttp' => 'sendhttp',
		'transmit' => 'transmit',
		'curl' => 'curl',
		'libwww-perl' => 'libwww'
	);

	private static $browserNames = array(
		// Browers
		'chrome' => 'Google Chrome',
		'omniweb' => 'OmniWeb',
		'shiira' => 'Shiira',
		'safari' => 'Apple Safari',
		'applewebkit' => 'Other WebKit browser',
		'konqueror' => 'Konqueror',
		'opera' => 'Opera',
		'netscape' => 'Netscape',
		'camino' => 'Camino',
		'seamonkey' => 'SeaMonkey',
		'flock' => 'Flock',
		'firefox' => 'Firefox',
		'galeon' => 'Galeon',
		'k-meleon' => 'K-Meleon',
		'gecko' => 'Gecko render engine',
		'msie' => 'Microsoft Internet Explorer',
		'obigo-browser' => 'Obigo Browser',
		// Mobilephone vendors
		'nokia' => 'Nokia',
		'samsung' => 'Samsung',
		'sec-' => 'SonyEricsson',
		'sonyericsson' => 'SonyEricsson',
		'ericsson' => 'Ericsson',
		'alcatel' => 'Alcatel',
		'lg-' => 'LG',
		'mot-' => 'Motorola',
		'panasonic' => 'Panasonic',
		'philips' => 'Philips',
		'sagem' => 'Sagem',
		'sie-' => 'Siemens',
		'sharp-' => 'Sharp',
		// Other mobilephones
		'midp-1.0' => 'MIDP-1.0 compatible mobilephone',
		'midp-2.0' => 'MIDP-2.0 compatible mobilephone',
		'midp'     => 'Other mobilephone',
		// Bots, crawlers, spiders
		'msnbot' => 'MSNBot',
		'yahooslurp' => 'Yahoo! Slurp',
		'googlebot' => 'Googlebot',
		'twiceler' => 'Cuil Twiceler',
		'askjeeves' => 'Ask Jeeves',
		'scoutjet' => 'ScoutJet',
		'searchme' => 'Searchme.com',
		'oozbot' => 'Setozz',
		'akregator' => 'akregator',
		'surveybot' => 'Domain Tools.com SurveyBot',
		'similarpages' => 'SimilarPages.com',
		'baiduspider' => 'Baidu.com BaiduSpider',
		'ia_archiver' => 'Alexa Internet Archiver',
		'psbot' => 'Picsearch.com',
		'speedy spider' => 'Entireweb Search Engine',
		'feedfetcher-google' => 'Feedfetcher',
		'robotgenius' => 'RobotGenius.com',
		'yacybot' => 'YaCi.net',
		'blogbot' => 'blogbot@sf.net',
		'sapphirewebcrawler' => 'SapphireWebCrawler',
		'yanga' => 'yanga.co.uk',
		'gigabot' => 'Gigablast.com',
		'netseer' => 'NetSeer.com',
		'grub' => 'Grubby',
		// Downloaders
		'wget' => 'Wget',
		'leechget' => 'LeechGet',
		'sendhttp' => 'SendHTTP',
		'transmit' => 'Transmit',
		//Others
		'java' => 'Java',
		'mswebdav' => 'Microsoft WebDAV',
		'urllib' => 'urllib',
		'httpcomponents' => 'HttpComponents',
		'dragonfly' => 'Opera Dragonfly',
		'curl' => 'cURL',
		'libwww' => 'libwww',
		// Unknown
		'' => 'Unknown'
	);

	/**
	 * @var array   OS detection expressions. Originally from AWStats (awstats.sf.net)
	 */
	private static $os = array(
		'windows[_+ ]?2005'        => 'winlong',
		'windows[_+ ]nt[_+ ]6\.0'  => 'winlong',
		'windows[_+ ]?2008'        => 'win2008',
		'windows[_+ ]nt[_+ ]6\.1'  => 'win2008',
		'windows[_+ ]?vista'       => 'winvista',
		'windows[_+ ]nt[_+ ]6'     => 'winvista',
		'windows[_+ ]?2003'        => 'win2003',
		'windows[_+ ]nt[_+ ]5\.2'  => 'win2003',
		'windows[_+ ]xp'           => 'winxp',
		'windows[_+ ]nt[_+ ]5\.1'  => 'winxp',
		'syndirella'               => 'winxp',
		'windows[_+ ]me'           => 'winme',
		'win[_+ ]9x'               => 'winme',
		'windows[_+ ]?2000'        => 'win2000',
		'windows[_+ ]nt[_+ ]5'     => 'win2000',
		'winnt'                    => 'winnt',
		'windows[_+ \-]?nt'        => 'winnt',
		'win32'                    => 'winnt',
		'win.*98'                  => 'win98',
		'win.*95'                  => 'win95',
		'win.*16'                  => 'win16',
		'windows[_+ ]3'            => 'win16',
		'win.*ce'                  => 'wince',
		'microsoft'                => 'winunknown',
		'msie[_+ ]'                => 'winunknown',
		'ms[_+ ]frontpage'         => 'winunknown',
		# Macintosh OS family
		'iphone'                   => 'iphone',
		'ipod'                     => 'ipod',
		'mac[_+ ]os[_+ ]x'         => 'macosx',
		'vienna'                   => 'macosx',
		'newsfire'                 => 'macosx',
		'applesyndication'         => 'macosx',
		'mac[_+ ]?p'               => 'macintosh',
		'mac[_+ ]68'               => 'macintosh',
		'macweb'                   => 'macintosh',
		'macintosh'                => 'macintosh',
		# Linux family (linuxyyy)
		'linux.*centos'            => 'linuxcentos',
		'linux.*debian'            => 'linuxdebian',
		'linux.*fedora'            => 'linuxfedora',
		'linux.*gentoo'            => 'linuxgentoo',
		'linux.*mandr'             => 'linuxmandr',
		'linux.*red[_+ ]hat'       => 'linuxredhat',
		'linux.*suse'              => 'linuxsuse',
		'linux.*ubuntu'            => 'linuxubuntu',
		'linux'                    => 'linux',
		'akregator'                => 'linux',
		# Hurd family
		'gnu.hurd'                 => 'gnu',
		# BSDs family
		'bsd'                      => 'bsd',
		# Other Unix, Unix-like
		'aix'                      => 'aix',
		'sunos'                    => 'sunos',
		'irix'                     => 'irix',
		'osf'                      => 'osf',
		'hp\-ux'                   => 'hp-ux',
		'unix'                     => 'unix',
		'x11'                      => 'unix',
		'gnome\-vfs'               => 'unix',
		'plagger'                  => 'unix',
		# Other famous OS
		'beos'                     => 'beos',
		'os/2'                     => 'os/2',
		'amiga'                    => 'amigaos',
		'atari'                    => 'atari',
		'vms'                      => 'vms',
		'commodore'                => 'commodore',
		# Miscellanous OS
		'cp/m'                     => 'cp/m',
		'crayos'                   => 'crayos',
		'dreamcast'                => 'dreamcast',
		'risc[_+ ]?os'             => 'riscos',
		'symbian'                  => 'symbian',
		'webtv'                    => 'webtv',
		'playstation 3'            => 'ps3',
		'playstation[_+ ]portable' => 'psp',
		'xbox'                     => 'winxbox',
		'wii'                      => 'wii'
	);

	private static $version = array(
		'java'        => '#Java/(\d+\.\d+)#',
		'chrome'      => '#Chrome/(\d+\.\d+)#',
		'shiira'      => '#Shiira/(\d+\.\d+)#',
		'flock'       => '#Flock/(\d+\.\d+)#',
		'firefox'     => '#Firefox/(\d+\.\d+)#',
		'galeon'      => '#Galeon/(\d+\.\d+)#',
		'seamonkey'   => '#SeaMonkey/(\d+\.\d+)#',
		'camino'      => '#Camino/(\d+\.\d+)#',
		'k-meleon'    => '#K-Meleon(?:/|\s)(\d+\.\d+)#',
		'konqueror'   => '#Konqueror/(\d+\.\d+)#',
		'opera'       => '#Opera(?:/|\s)(\d+\.\d+)#',
		'omniweb'     => '#OmniWeb/(v\d+|\d\.\d)#',
		'msie'        => '#MSIE (\d+\.\d+)#',
		'applewebkit' => '#AppleWebKit/(\d+\.\d+)#',
		'transmit'    => '#Transmit(\d+\.\d+)#',
		'mozilla'     => '#rv:\s*(\d+\.\d+)#',
		'netscape'    => '#(?:Navigator|Netscape)(?:/|\s)(\d+\.\d+)#'
	);

	private static $safariVersionMatrix = array(
		85     => '1.0',
		100    => '1.1',
		125    => '1.2',
		312    => '1.3',
		412    => '2.0',
		522    => '3.0',
		525    => '3.1',
		525.26 => '3.2',
		528    => '4.0'
	);

	private static $omniwebVersionMatrix = array(
		'622'  => '5.8',
		'613'  => '5.6',
		'607'  => '5.5',
		'563'  => '5.1',
		'558'  => '5.0',
		'496'  => '4.5'
	);

	public static function parse($userAgentString)
	{
		do {
			foreach (self::$browser as $needle => $browser) {
				if (stripos($userAgentString, $needle) !== false) {
					break 2;
				}
			}
			$browser = '';
		}
		while (false);

		$version = '';
		$ver = array();
		if (!empty(self::$version[$browser])) {
			$version = preg_match(self::$version[$browser], $userAgentString, $ver)
				? $ver[1]
				: '';
		}

		if ($browser == 'safari') {
			if (preg_match('#Version/(\d+\.\d+)#', $userAgentString, $ver)) {
				$version = $ver[1];
			}
			elseif (preg_match('#Safari/(\d+\.\d+)#', $userAgentString, $ver)) {
				$buildVersion = $ver[1];
				$buildVersions = array_keys(self::$safariVersionMatrix);
				$currentBuildVersion = current($buildVersions);
				do {
					if ($currentBuildVersion > $buildVersion) {
						$version = self::$safariVersionMatrix[prev($buildVersions)];
						break;
					}
				}
				while (($currentBuildVersion = next($buildVersions)) !== false);
			}
		}

		if ($browser == 'omniweb' && $version[0] == 'v') {
			$version = self::$omniwebVersionMatrix[substr($version, 1)];
		}

		// If there is Mozilla/version, it's probably an old Netscape browser
		if (preg_match('#^Mozilla/([1-4]\.\d+)#', $userAgentString, $ver) && $browser == '') {
			$browser = 'netscape';
			$version = $ver[1];
		}

		do {
			foreach (self::$os as $expression => $os) {
				if (preg_match('#'.$expression.'#i', $userAgentString)) {
					break 2;
				}
			}
			$os = '';
		}
		while (false);

		return array(
			'browserid' => $browser,
			'browser'   => self::$browserNames[$browser],
			'version'   => $version,
			'os'        => $os
		);
	}
}
