# http://www.AdCycle.com - AdCycle Version 1.17  Sept 17, 2001
# Copyright (c) 2001 AdCycle.com All rights reserved.

# -- SHAREWARE LICENSE AGREEMENT >>
# This is not free software. You are hereby licensed to use this software for 
# evaluation purposes without charge for a period of 30 days. If you use this 
# software after the 30-day evaluation period you must register.
#
# 1. All copyrights to AdCycle are exclusively owned by the author.
#
# 2. Anyone may use this software during a test period of 30 days. Following 
#    this test period of 30 days or less, if you wish to continue to use 
#    AdCycle, you must register at http://www.adcycle.com/register.html.
#
# 3. Payment of the single copy license fee authorizes one named person 
#    or company to use *one* installation of this Software on one computer 
#    provided this copyright is not violated and provided the rules 
#    outlined herein are observed.
#
# 4. The AdCycle shareware version, may be freely distributed, 
#    provided the distribution package is not modified. No person or company 
#    may charge a fee for the distribution of AdCycle without written 
#    permission from AdCycle.
#
# 5. You may not use, copy, emulate, clone, rent, lease, sell, modify, 
#    disassemble, otherwise reverse engineer, or transfer the licensed 
#    program, or any subset of the licensed program, except as provided for 
#    in this agreement. You can modify the look and feel of AdCycle and make
#    code changes for your own use only, provided that all copyright notices and 
#    links remain intact and each modified installation is regitered. Any 
#    unauthorized use shall result in immediate and automatic termination of 
#    this license and may result in criminal and/or civil prosecution. All rights
#    not expressly granted here are reserved by author.
#
# 6. Charting capability has been provided by ObjectPlanet.com. You may only use 
#    the EasyCharts applet for AdCycle reporting.
#
# 7. THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
#    AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
#    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR 
#    PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE
#    LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
#    CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
#    SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
#    INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
#    CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
#    ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
#    OF THE POSSIBILITY OF SUCH DAMAGE.
#
# 8. Installing and using AdCycle signifies acceptance of these terms and 
#    conditions of the license. 
#
# 9. If you do not agree with the terms of this license you must remove AdCycle 
#    files from your storage devices and cease to use the product
#
# -- SHAREWARE LICENSE AGREEMENT <<




##########################
#  MINIMUM REQUIREMENTS  #
##########################

If you are not sure what you have, try to install. It may work.

1. MySQL 3.22.04+ : http://www.mysql.com 
    - yes, you do need 3.22.04 or greater

2. DBI
    - If your provider has mySQL, DBI is probably already installed
    - http://www.perl.com/CPAN-local/modules/by-module/DBD/

3.  Msql-Mysql-modules
    - http://www.perl.com/CPAN-local/modules/by-module/DBD/
		- probably already installed if you have mySQL

4. Perl 5: http://www.perl.com
    - perl is almost always already installed on most servers

5. CGI.pm
    - you should already have this





###########################
#  CONFIGURATION OPTIONS  #
###########################

There are three different configurations for running adcycle. With each of these options you must run build.cgi as described in the sections below titled "UNIX INSTALLATION INSTRUCTIONS" or "NT INSTALLATION INSTRUCTIONS".


1. ADCYCLE WITH STANDARD APACHE
   This is the most common installation configuration. No special options with apache server are used.
   Advantages:
    - easy to install
   Disadvantages:
    - slower ad delivery
 

2. ADCYCLE WITH APACHE MOD_PERL AND APACHE::DBI
   A high performance configuration. Visit http://www.apache.org for install info.
   Advantages:
    - fast, reliable
    - can serve 500,000+ impressions a day on a decent machine
   Disadvantages:
    - Memory hog
    - Availability by ISP limited
    - Difficult to setup


3. ADCYCLE USING ADCYCLE_D.CGI DAEMON WITH STANDARD APACHE
   An high performance configuration. [instructions near bottom of this page]
   Advantages:
    - fast
    - low memory consumption
    - low resource consumption
    - can serve 500,000+ impressions a day on a decent machine
   Disadvanatges:
    - runs only on UNIX
    - need telnet access

** On a LAN it is possible to serve 1-2 million ads a day with option 2 or 3 using decent hardware. **


If you are new to AdCycle, it is recommended that you test the server using option 1, then migrate to option 2 or 3 after you are comfortable using the functionality.





##########################
#  UPGRADE INSTRUCTIONS  #
##########################

-----------------------------------
>> To Upgrade from 1.1X to 1.17 <<
1. Copy new files over old except for AdConfig.pm and build.cgi (also copy the "adimages" files)
    - Update file options as required. * Do not run build.cgi. *
-----------------------------------


-----------------------------------
>> To Upgrade from 1.0X to 1.17 <<
1. Backup all files and databases before proceeding (important!).
2. Copy new files over old except for AdConfig.pm and build.cgi (including the "adimages" directory). 
    - Update file options as required. * Do not run build.cgi. *
3. Run "perl adupgrade.cgi"  < --- important!

If you run into problems, check each .cgi file for proper headers, and config options. Also, check permissions.
-----------------------------------


-----------------------------------
>> To Upgrade from 0.XX to 1.17 <<
  New installation required. Follow the instructions below. All data will be erased.
-----------------------------------






####################################
#  UNIX INSTALLATION INSTRUCTIONS  #
####################################

1. FTP adcycleX.X.tar.gz file to your cgi-bin (binary transfer mode)

2. Uncompress the file: type "gunzip adcycleX.X.tar.gz"(replace X.X)

3. Unpack adcycleX.X.tar: type "tar -xvf adcycleX.X.tar" into your cgi-bin

4  Change adcycle file permissions as follows:

chmod 755 AdAdvertiser.pm
chmod 755 AdCampaign.pm
chmod 755 AdConfig.pm
chmod 755 AdCookies.pm
chmod 755 AdCron.pm
chmod 755 AdDb.pm
chmod 755 AdEnv.pm
chmod 755 AdGroups.pm
chmod 755 AdHtml.pm
chmod 755 AdLogin.pm
chmod 755 AdManager.pm
chmod 755 AdMaster.pm
chmod 755 AdReports.pm
chmod 755 AdTarget.pm
chmod 755 AdTables.pm
chmod 755 AdTools.pm
chmod 755 adcenter.cgi
chmod 755 adclick.cgi
chmod 750 adcron.cgi
chmod 750 adcycle.c
chmod 755 adcycle.cgi
chmod 750 adcycled
chmod 755 adupgrade.cgi
chmod 755 build.cgi
chmod 750 safe_adcycled

[** Important Note: >> Change build.cgi to 750 permissions after build, or delete it from your filesystem **]



5. In your web pages directory, create a images directory called "adimages"
   -- The adcycle images should be in a world readable non-cgi        
      directory (a typical web site directory)


6. Copy the images from the "adimages" directory to the newly created one.
   -- FTP makes this easy (binary transfer mode)
   -- It is really important to move the images, otherwise the user friendliness of the
      program will be reduced


7. Edit the AdConfig.pm file (update the required fields)



8. In MySQL, Create a Database called "adcycle"

    -- the typical approach is to type;
       mysql <ENTER> (opens mysql) (mysql login will vary from ISP to ISP)
           ALT possibility "mysql -uyour_user_name<ENTER>"
           ALT possibility "mysql -pyour_password<ENTER>"
           ALT possibility "mysql -uyour_user_name -pyour_password<ENTER>"
           ALT possibility "mysql -uyour_user_name -pyour_password -hyour_hostname<ENTER>"
       "create database adcycle; <ENTER>" (creates the database)
       quit<ENTER> (closes mysql)
       ** If this does not work, please contact your ISP. **



9. Set your MySQL permissions. The "your_user_name" and "your_password" should coincide with
   AdConfig.pm settings. Here is what I use;
    -- the typical approach is to type;
       mysql<ENTER> (opens mysql)
       GRANT ALL PRIVILEGES ON *.* TO your_user_name@localhost IDENTIFIED BY 'your_password' WITH GRANT OPTION;<ENTER> 
       GRANT ALL PRIVILEGES ON *.* TO your_user_name@"%" IDENTIFIED BY 'your_password' WITH GRANT OPTION;<ENTER>

	or

       GRANT ALL PRIVILEGES ON *.* TO your_user_name@your_domain IDENTIFIED BY 'your_password' WITH GRANT OPTION;<ENTER> 
       GRANT ALL PRIVILEGES ON *.* TO your_user_name@"%" IDENTIFIED BY 'your_password' WITH GRANT OPTION;<ENTER>

       quit<ENTER> (closes mysql)
       ** If this does not work, please contact your ISP. **


			 
10. Run build.cgi from the shell;
    -- type "perl5 build.cgi" (or just "perl build.cgi")
    -- after a successful build, proceed to 11



11. Try to access http://..../..../adcenter.cgi from your browser;
   -- You should see a login page appear, and sample campaigns.
   -- If not, or you receive an error message;
    a) check your file permissions!
    b) check AdConfig.pm options
    c) check your apache(or web server) error log file
    d) check the perl headers for the adcenter.cgi, adcycle.cgi, and adclick.cgi scripts (i.e. !#/usr/bin/...)
    e) try "perl adcenter.cgi" from the telnet shell (check error messages)
    f) check your mySQL permissions
    g) add a "use lib '/path/to/adcycle/dir';" to the second line of each .cgi file
		* Please contact your ISP if you have dbi.pm or mysql problems *






###############################################
#  WIN32(NT,98,95) INSTALLATION INSTRUCTIONS  #
###############################################


AdCycle Install Procedure for Win 95/98/NT - Edited by Hamilton Meyer 10/20/00
1. Download and install ActivePerl 5.6+ for 95/98/NT
http://www.ActiveState.com/Products/ActivePerl/Download.html
NOTE: You'll need Windows Installer 1.1+ available on the same page.

2. Download, unzip, and install DBI, DBD::MySQL, DBD::ODBC and DBD::CSV for Win32
http://www.ActiveState.com/PPMPPackages/zips/6xx-builds-only/
Unzip each module to a separate directory.
To install these PERL modules, open a command prompt and CD to the directory containing the
unzipped module
-- type ppm install dbi.ppd
cd to the next module directory and repeat the install command, replacing "dbi.ppd" with
the module name in that directory (the file ending in .ppd)
Repeat until all required modules are installed.

3. Restart your machine to complete the PERL setup.
NOTE: MySQL will not install until you restart.

4. Download and install the latest MySQL for 95/98/NT
http://www.mysql.com/Downloads/MySQL-3.23.html (as of 10/20/00)
It is HIGHLY recommended that you accept all the default installer settings!
If asked if you'd like to install as a service, say yes.
You'll be prompted for both an admin UserName/Password and a Database UserName/Password.

5. Open a command prompt and CD to the "bin" directory of MySQL (probably c:\\mysql\bin)
type "mysql" (opens mysql)
type "create database adcycle;" (creates the database)
GRANT ALL PRIVILEGES ON *.* TO your_user_name@localhost IDENTIFIED BY 'your_password' WITH GRANT OPTION; 
GRANT ALL PRIVILEGES ON *.* TO your_user_name@"%" IDENTIFIED BY 'your_password' WITH GRANT OPTION; 
quit (closes mysql)
** If this does not work, please contact your ISP. **

6. Unzip adcycleX.X.zip into your web servers cgi-bin or SCRIPTS directory

7. In your web pages directory, create an images directory called "adimages"
-- The adcycle images should be in a world readable non-cgi 
directory (a typical web site directory)

8. Copy the images from the "adimages" directory to the newly created one.
-- FTP makes this easy (binary transfer mode)
-- It is really important to move the images, otherwise functionality of the
program will be reduced

9. Open all .cgi and .pm files in WordPad (not NotePad) and resave as text only.
Make sure to retain the original .cgi or .pm extensions.
This step will ensure all carriage returns are PC formated and not UNIX format.

10. Edit the AdConfig.pm file (update the required fields)

11. Run build.cgi from the shell;
-- type perl build.cgi
-- after a successful build, proceed to 12

12. Try to access http://..../..../adcenter.cgi from your browser;
-- If you see a login page appear, your setup! good job
-- If not, or you receive an error message;
a) check your file permissions!
b) check AdConfig.pm options
c) check your apache(or web server) error log file
d) check the perl headers for each cgi script (i.e. !#/usr/bin/...)
On my 98 machine I specify the full path,
"#!D:\perl\bin\MSWin32-x86-thread\perl.exe"
e) try "perl adcenter.cgi" from the shell (check error messages)
f) add a "use lib '/path/to/adcycle/dir';" to the second line of each .cgi file
* contact your ISP if you have dbi.pm or mysql problems *

[thanks to Hamilton Meyer for NT Instruction mods] 








##########################
#  ADCYCLE DAEMON USAGE  #
##########################

AdCycle Daemon is a great way to get the maximum performance from AdCycle. No special apache configuration is required and memory usage is minimal. This is still beta, so use with caution! If you need a decent hosting company for mysql and telnet access, try iserver.com.


Requirements:
1. UNIX OS
2. Telnet access
3. C compliler (almost always available)


Install Imstructions:
1. Run build.cgi as described above for new AdCycle installs. Test access to the admin area and ad delivery before trying the following below.

2. Then type the following lines;
> cd /full/path/to/adcycle    [navigate to the adcycle installation directory]
> mkdir sock  [this creates the sock directory]
> chmod 777 sock   [this changes the permissions on the sock directory]

3. Edit "safe_adcycled", "adcycle.c", and "adcycled" using a text editor. Update the configuration block in each of the 3 files.

4. Start the daemon(s) by typing;
> nohup perl safe_adcycled &
or
> nohup perl5 safe_adcycled &

If you get error messages, stop and check your configuration. All three files need to be updated as described in step3. Once you start safe_adcycled in this fashion, the program will continue to run until you issue a "perl safe_adcycled stop" command. "safe_adcycled" is designed to monitor the daemons, and restart them if problems arise. If you continue to issue commands to start "safe_adcyceld", the old process will be terminated to prevent multiple copies from running.


5. Compile adcycle.c and copy to adcycle.cgi: type;
> gcc adcycle.c -o adcycle.cgi


6. Test the ad delivery
> ./adcycle.cgi [or check ad loading in your webpages]
If you do not see a URL output then try  "ps -ax | grep perl" and see if there is 1 "safe_adcycle" thread and "adcycled" thread(s).


7. [optional] In the event that your ISP's server is rebooted you will need to restart the daemons. You have 3 options.
a) Start the daemons yourself by running "nohup perl safe_adcycled &" from telnet. Most unix servers can run for weeks or months without reboot.
b) Put safe_adcycled in your start-up scripts. Specify the full path to safe_adcycled.
c) Add a cron process to your server that runs every 15 minutes or so. Here is an example entry;
   > crontab -e [access cron entries]
   > 0,15,30,45 * * * * perl /full/path/to/safe_adcycled
	 Note: If you continue to issue commands to start "safe_adcycled", the old process will be terminated to prevent multiple copies from running.


Starts the daemons: nohup perl safe_adcycled &
Stops the daemons: perl safe_adcycled stop


* Note: The daemon setup may not work for everyone. Use configuration 1 or 2 if you have problems. *





#####################
#  VERSION HISTORY  #
#####################

[v1.17] Sept 17, 2001
    - reverted to old live log structure(until 1.2)
    - fixed group CTR bug
	 - fixed HTML form banner bug


[v1.16] July 5, 2001
    - fixed security hole (with help from qDefense.com)
    - added ad type deletion feature
    - improved live_log handling


[v1.15] April 22, 2001
    - fixed the table data on the campaigns page
    - increased the character length on the ad folder path field 
    - added a new adconfig option to remove dhtml menu
    - fixed column error in adcron.cgi
    - fixed page targeting


[v1.14] March 18, 2001
    - added banner upload from harddrive option
    - added new admin navigation system
    - improved click accuracy for iframe delivered ads
    - added click only option for text ads
    - fixed case sensitivity of page/hostname targeting
    - fixed daily log display bug
    - increased target type maximum
    - added status to the campaign page


[v1.13] Feb 21, 2001
    - fixed text link status
    - fixed daily log display
    - fixed post 30-day registration bug
    - added hostname targeting/blocking
    - added exact keyword targeting
    - fixed campaign count column on groups page
    - fixed a few other small bugs
    

[v1.12] Feb 8, 2001
    - improved daily_log accuracy
    - fixed CTR display on reports page
    - improved click counting method on non-click capped campaigns
    - added basic stats for groups
    - added campaign status to group page
    

[v1.11] Feb 4, 2001
    - fixed default ad delivery
    - fixed ad type entry
    - added enhancement to safe_adcycled
    - added edit ad type function
    - added id token to SSI ad code


[v1.10] Jan 29, 2001
    - added multi ad support for single pages (new ad codes required)
    - added keyword targeting
    - added ip targeting
    - added page url targeting
    - added basic campaign reports
    - improvements made to group display on campaigns page
    - improvements made to all ad rotation schemes
    - added default campaign option to groups
    - fixed daily logging in the daemon mode
    - added ad type manager
    - numerous table changes
   

[v1.04] Jan 19, 2001
    - a few more bug fixes, everyone should upgrade


[v1.03] Jan 17, 2001
    - bug fix in safe_adcycled for daemon users


[v1.02] Jan 16, 2001
    - fixed grouping selections in campaigns
    - fixed daemon delivery bug
 

[v1.01] Jan 14, 2001
    - added AdCycle daemon option
    - a few minor bug fixes
    - added interactive help


[v1.00] Jan 1, 2001
    - complete rework of code and functionality
    - first shareware version

[v.77b] July 9, 2000
    - table error bug fixed
    - added cache-bust rich media
    - fixed rich media code generator
    - fixed rich media option2 storage
    - a few cosmetic/interface enhancements

[v.76b] June 18, 2000
    - fixed click log bug

[v.74b] June 7, 2000
    - fixed stats history bug, fixed iframe code bug, fixed log bug

[v.71b] May 3, 2000
    - a few minor bug fixes

[v.70b] April 30, 2000
    - major code rework
    - added ip and page targeting/blocking
    - minor campaign page cosemetic fixes
    - added ssi functionality, finally...
    - added more stats
    - added banner priority
    - a few minor bug fixes

[v.61b] April 8, 2000
    - eliminated javascript rich media delivery
    - fixed rich media delivery bug
    - minor cosemetic fixes

[v.61b] April 4, 2000
    - eliminated cron!
    - improved ad management
    - added basic campaign daily log
    - simplified campaign interface

[v.54b] Feb 25, 2000
  - Added group display feature
  - Added cache-flashing

[v.53b] Feb 18, 2000
  - Big bug fix in adclick.cgi
  - Made some patches to the *.pm file's except for AdConfig.pm

[v.52b] Feb 16, 2000
  - Added WIN32(NT,98,95) Installation Instructions
  - Made some patches to the *.pm file's except for AdConfig.pm
  - Fixed advertiser's campaign profile (URL)

[v.51b] Feb 14, 2000
  - Big bug fix in adcycle.cgi, added a function to AdCenter.pm
 
[v.50b] Feb 12, 2000
  - Major reconstructive surgery on code
  - added rich media support
  - added campaign prioritizing
  - improved delivery rate
  - improved user-friendliness
  - redesigned user interface
  - fixed some Y2K bugs
  - changed numbering scheme

[v.30b] Dec 99 - fixed some minor bugs
[v.20b] Dec 99 - fixed some installation bugs
[v.10b] Sept 99 - first release


