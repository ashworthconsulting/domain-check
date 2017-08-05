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
        $whois[] = shell_exec("whois $line");
//        printf("%s", $whois);
        flush();
        sleep(1);
        print "----------------------------------------" . PHP_EOL;
    }
    fclose($file);
}

if(count($whois)) {
	$json = json_encode($whois, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	
//	var_dump(json_decode($json, TRUE));
} else {
	print "Couldn't get whois information";
}
