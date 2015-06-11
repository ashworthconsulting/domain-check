# Domain Expiration Check Shell Script
This script checks to see if a domain has expired. It can be run in both interactive and batch mode, and provides facilities to alarm (notify via email) if a domain is about to expire before it happens. This script supports additional C/TLDs .in, .biz, .org and .info domains, and also includes a 5 second delay to avoid whois server rejecting query.

## Sample usage
Display expiration date and registrar for theos.in domain:
`domain-check -d {domain-name}`

	$ domain-check -d theos.in

Output:

	Domain                              Registrar         Status   Expires     Days Left
	------------------------------- ----------------- -------- ----------- ---------
	theos.in                            et4India (R7-AFIN Valid    28-Oct-2009   799  

You can also get an email if ‘theos.in’ is going to expire in 30 days:

	$ domain-check -a -d theos.in -q -x 30 -e you@yourdomain.com

However, the most killer feature is that you can read a list of domain names from a file, such as ‘mydomains.txt’ (list each domain on a new line):

	$ domain-check -a -f mydomains.txt -q -x 30 -e you@yourdomain.com

…or…

	$ domain-check -f mydomains.txt

Output:

	Domain                              Registrar         Status   Expires     Days Left
	------------------------------- ----------------- -------- ----------- ---------
	theos.in                            et4India (R7-AFIN Valid    28-Oct-2009   799
	nixcraft.org                        oDaddy.com, Inc.  Valid    13-Aug-2009   723
	vivekgite.com                       MONIKER ONLINE SE Valid    18-aug-2010   1093
	cyberciti.biz                                         Valid    30-Jun-2009   679
	nixcraft.info                       oDaddy.com Inc. ( Valid    26-Jun-2009   675
	nixcraft.net                        GODADDY.COM, INC. Valid    11-dec-2009   843  

## Quick installation
Use wget command to download and install domain-check script:

	$ git clone git@github.com:ashworthconsulting/domain-check.git
	$ chmod +x domain-check
	$ ./domain-check -d google.com
