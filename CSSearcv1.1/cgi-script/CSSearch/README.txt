#####################################################################
#                        Copyright Start                            #
#####################################################################
#                                                                   #
#    Copyright © 1998-2001 CGISCRIPTS.NET - All Rights Reserved     #
#                                                                   #
#####################################################################
#                                                                   #
#          THIS COPYRIGHT INFORMATION MUST REMAIN INTACT            #
#                AND MAY NOT BE MODIFIED IN ANY WAY                 #
#                                                                   #
#####################################################################
#                                                                   #
# This software has been released under the:                        #
#                                                                   #
#                GNU General Public License (GPL)                   #
#                                                                   #
# You MUST read the LICENSE.txt file before utlizing this software. #
#                                                                   #
#            GNU General Public License is located at:              #
#              http://www.gnu.org/copyleft/gpl.html                 #
#                                                                   #
#####################################################################
#                                                                   #
# Credits:                                                          #
# Andy Angrick - Programmer - angrick@cgiscript.net                 #
# Mike Barone  - Developer  - mbarone@cgiscript.net                 #
#                                                                   #
# For information about this script or other scripts please see :   #
# http://www.cgiscript.net                                          #
#                                                                   #
# Thank you for trying out our script.                              #
# If you have any suggestions or ideas for a new innovative script  #
# please direct them to suggest@cgiscript.net.   Thanks.            #
#                                                                   #
#####################################################################

CSSearch version 1.1

Reasons for this revision:
We had so many requests from users wanting to change the look and
feel of the script we decided to offer a few default style options.
We will make many changes to this script. Many of them as a direct
result of your suggestions. Please make sure you leave your email 
when downloading. We will make sure to notify you when new releases
are available. As always, your suggestions are invited.

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (Optional) libwww perl module to parse server side includes.
5. (Optional) The ability to run server side includes.

Installation:

1. Unpack the file on your server. This will create the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSSearch <-- CSSearch directory
   /cgi-script/CSSearch/images <-- image directory for script.

2. Chmod CSSearch.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of the CSSearch.cgi to reflect the true location.

4. Open the file setup.cgi and edit following variables (descriptions below):
   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSSearch/CSSearch.cgi'; 
   $rooturl = 'http://www.cgiscript.net/';
   $rootpath = '/www/vhosts/cgiscript.net/';
   $username = 'demo'; #<-- username to enter management screens.
   $password = 'demo'; #<-- password to enter management screens.
   $parsessi='0'; #<-- default '0', if set to '1' parse Server Side Includes 
   
   $cgiurl is the full URL of CSSearch.cgi

   $rooturl is the URL of your site (ex. http://www.mycompany.com/).
   Make sure you add a trailing forward slash '/' to the end of this variable.

   $rootpath is the path to your site's directory (ex. /home/httpd/html/mycompany/).
   Make sure you add a trailing forward slash '/' to the end of this variable.

   $username and $password set access to the control panel of CSSearch.

   $parsessi indicates whether or not to follow Server Side Includes on your site.
   The function requires the LWP module and is significantly slower to search.
   However, if you have vital information on your site created with server side
   includes, you may want to enable this feature. Set to '1' to check for SSI, 
   set to '0' to disable.

Instructions:

  Administration:
    You can enter the control panel login from [script url]/CSSearch.cgi?command=manage
    Once you enter with login and password you can modify file extensions to ignore,
    or skip. 

	Skip: Overlooks that particular instance of the file/directory.
	Ignore: Overlooks ALL instances of that file/directory.

	Note: Contents of skipped/ignored directories are also overlooked.
   
  New in version 1.1
    The top of the management page has 3 radio buttons to choose different styles.
    Style #1 is the long form that has AND/OR selects and case selections. Style #2 and
    Style #3 are condensed forms that just have a text field and a search button. To 
    change the style, click the appropriate radio button and then the update button.

    You can also explicitly call any one of the 3 search forms by adding ?style=[x]
    where x is the style number to display. 
    Example:
    http://www.cgiscript.net/cgi-script/CSSearch/CSSearch.cgi?style=2 would 
    display the style 2 search form.
  
  How to Use:
    If you have the ability to add server side includes on your site, add
    <!--#include virtual="/cgi-script/CSSearch/CSSearch.cgi" --> to your page. This will
    create a search form on your page. If you don't have the ability to run
    server side includes, provide a direct link to the search form with
    http://www.yoursite.com/cgi-script/CSSearch/CSSearch.cgi

   As mentioned above, you can explicitly call any one of the 3 search forms with 
   the format http://www.cgiscript.net/cgi-script/CSSearch/CSSearch.cgi?style=2
   where '2' is the style 2 form. Obviously, change the URL to match
   the location of your CSSearch.cgi script.

If you have any comments, questions, concerns or new script ideas go to 
http://www.cgiscript.net and submit Contact Form. Installation is available.

This is only one of many cool scripts we have, check out http://www.cgiscript.net