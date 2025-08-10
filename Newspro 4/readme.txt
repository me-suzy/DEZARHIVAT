
coranto 4 alpha
---------------

Hi.

You're a tester for coranto 4. If you're not, you shouldn't have this file.

You are assumed to have had previous experience setting up newspro and other
CGI scripts. If you haven't, you may still be able to do this, but we can't
give you any help.


INSTALLATION (EVEN IF YOU DON'T THINK YOU NEED TO, READ ME!)
------------

- CHMOD the directory where you'll be uploading files 777.
- Upload all the files. ASCII mode.
- Change the path to Perl in newspro.cgi. (The first line.)

Now CHMOD files as follows:

coranto.cgi	755
nsettings.cgi	666
crcfg.pl	666

- Now access coranto.cgi via your browser. It should work. If it doesn't,
	well then, you're screwed. (If it's a 500 error, see the newspro FAQ
	on this.) If it does, marvel at the pretty new colours.
- OK, you know the drill. Setup/blank. You'll get a temporary install screen.
	Do what it says.
	
- You're in! Explore! Find bugs! Report them!

- Oh, yeah, one note. Addons work differently now. Each has to be explicitly
	enabled via the Addon Manager (which is now part of the core).
	
THINGS NOT YET FINISHED
-----------------------

- viewnews.cgi. It's not even started yet, actually.
- documentation.
- many addons
- setup
- All kinds of other stuff. Those were just the most obvious...

IMPORTANT NOTES
---------------

- Don't try to copy in anything from an older newspro. It won't work.nsettings.cgi contains 
	completely different settings; npconfig.pl & nsettings.cgi no longer exist;
	old addons will not work; newsdat.txt has a new format.

- You do need news to test, of course. If you think you're up to it, go ahead and
	try to import an old newsdat.txt (not easy). But this is unnecessary: you have a Tool
	To Help You. From a shell/commandline, run gennws4.pl. (You DO know how to
	launch a perl script from the shell, right? Nothing wrong with not knowing
	how, but you shouldn't be testing prerelease software if you don't.) It will
	generate a newsdat.txt of random data. If you edit it, right at the top are
	some fully-explained tweakable settings. You probably do want to edit it;
	by default it generates a pretty damn big file.

	
FINALLY
-------

Enjoy.