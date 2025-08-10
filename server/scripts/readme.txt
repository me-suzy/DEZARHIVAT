server.cgi installation
-----------------------

Installation of this script is pretty simple.  All you need to do is
upload it to your server in ASCII mode, set the permissions to 755,
then bring it up in your browser.

You may need to set the perl path on the first line of the script.  If
Perl 5 is not located at /usr/bin/perl, you will need to adjust it.
Example:

Perl 5 is located at /usr/local/bin/perl the first line of
server.cgi should look like the following:
#!/usr/local/bin/perl

NOTICE FOR HYPERMART USERS:  Perl 5 is located at /usr/local/bin/perl
on Hypermart servers, so you will need to adjust the perl path as outlined
above.  Failure to do so will result in a 500 server error.
