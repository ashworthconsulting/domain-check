#!/usr/bin/php

<?php

$whois = [];

if(!file_exists($argv[1])) {
	exit("Please pass the files with domain names");
} else {
	flush();
    $file = fopen($argv[1], "r");
    while(!feof($file))
    {
        $line = fgets($file);
        print "Registration Info of Domain: " . $line . PHP_EOL;
        $details = shell_exec("whois $line");
        $whois[$line][] = $details;
        flush();
        sleep(1);
        print "----------------------------------------" . PHP_EOL;
    }
    fclose($file);
}

if(count($whois)) {
	//$json = json_encode($whois, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	$counter = 0;

	print "Domain                              Registrar         Status   Expires     Days Left" . PHP_EOL;
	print "----------------------------------- ----------------- -------- ----------- ---------" . PHP_EOL;

	foreach ($whois as $domain => $info) {
		$print =  $domain . "\t\t\t\t";

		foreach ($info as $details) {
			$print .= " Dummy \t";
		}
		print $print . PHP_EOL;
		// $counter++;
	}
	
//	var_dump(json_decode($json, TRUE));
} else {
	print "Couldn't get whois information";
}

function find_in_string($string, $characters) {
	
}