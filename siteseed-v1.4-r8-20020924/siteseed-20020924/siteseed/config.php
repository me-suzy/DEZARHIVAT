<?
#initialize arrays to prevent site visitors from messing with values
#-------------------------------------------------------------------
# DO NOT CHANGE THIS
# get around users that have left magic_quotes_gpc active (which they should not have done and makes
# siteseed use more CPU than it should... just to remove the damn thing... none of this gets executed
# if php is properlly configured to run siteseed)


// Compatibility patch for < PHP 4.1.2 -> Siteseed is being globally changed to use a 4.1.2 or higher approach
#if (function_exists ("import_request_variables"))
#{
#	import_request_variables ("CGP","");
#
#	$HTTP_GET_VARS = $_GET;
#	$HTTP_POST_VARS = $_POST;
#	$HTTP_COOKIE_VARS = $_COOKIE;
#	$QUERY_STRING = $_SERVER["QUERY_STRING"];
#	$PHP_SELF = $_SERVER["PHP_SELF"];
#	$SERVER_NAME = $_SERVER["SERVER_NAME"];
#	$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
#	$HTTP_X_FORWARDED_FOR = $_SERVER["HTTP_X_FORWARDED_FOR"];
#	$HTTP_VIA = $_SERVER["HTTP_VIA"];
#}

if (get_magic_quotes_gpc()) 
{
	# Overrides GPC variables

        if (isset($HTTP_GET_VARS)) strip_http_vars($HTTP_GET_VARS);
        if (isset($HTTP_POST_VARS)) strip_http_vars($HTTP_POST_VARS);
        if (isset($HTTP_COOKIE_VARS)) strip_http_vars($HTTP_COOKIE_VARS);
}

$PUBCOMEXCEPTIO=array();
$PUBCOMEXCEPTIONRESTRICT=array();
$PUBCOMEXCEPTIONORDER=array();
$PUBCOMEXCEPTIONLIMIT=array();
$EDITORDEFAULTARTICLEOBJECTS=array();
$EDITORDEFAULTOBJECTOBJECTS=array();
$cacher=array();
$ACTIVE_CACHE=0;
$pathtodm="";
if(strlen($_SERVER['REMOTE_USER'])<1)
{
	$prefix="";
	$suffix="";
}
$sql="";
#-------------------------------------------------------------------
# USER CONFIGURATION STARTS BELLOW THIS LINE...
# IMPORTANT NOTE: do not comment variables! Change their values or make them equal to nothing ("")
# but never, ever, comment them out.

$projecto="The_name_of_your_project";
$database_server="localhost";
$database_username="your_database_user";
$database_password="your_database_password";

# the operating system of your siteseed server (Unix or Windows)
$OS_system="Unix";

# the url to the project main directory ending WITHOUT a slash (/) as seen by site visitors!
$project_path="http://www.yourdomain.com";

# the name of your site (i.e. "company homepage", "slash-a-dot")
$SiteName="site name";

# the url to the images directory ending in a slash (/) as seen from the backoffice!
$imagesURL="$project_path/";

# the path to images directory (Windows only)
$imagesDIR="c:\\InetPub\\wwwroot\\siteseed\\images";

#tmp directories used for word file uploading
# for UNIX use something like:
$tmpimg = "/tmp/tmp$imgfile_name.htm";
# or (if you are on a hosting server with no tmp write permissions)
#$tmpimg = "/home/yourusername/tmp/tmp$imgfile_name.htm";
# and if you are running the siteseed server on a WINDOWS machine
#$tmpimg = "C:\windows\temp\tmp$imgfile_name.htm";

#tmp directories used for image file uploading
# for UNIX use something like:
$tmpconvimg = "/tmp/tmp$imgfile_name.png";
# or (if you are on a hosting server with no tmp write permissions)
#$tmpconvimg = "/home/yourusername/tmp/tmp$imgfile_name.png";
# and if you are running the siteseed server on a WINDOWS machine
#$tmpconvimg = "C:\windows\temp\tmp$imgfile_name.png";


# full path to your "dm" & "cache" (data mining and file cache) directory ending in a slash (/)
# Windows version would be something like: $pathtodm="c:\\InetPub\\wwwroot\\siteseed\\cache\\";
$pathtodm="/var/www/htdocs/$projecto/";

# define the backoffice appearence 0=advanced (looks god on modern browsers) 1=simple (works on every browser)
$BOSIMPLE="1";

# default box setup for the messages thanking users for leaving a comment ("-1" means no box, 0 means default box, any number specifies de box id 
$AGRADECIMENTOBOX="0";
# content for the message box thanking users for leaving a comment
$AGRADECIMENTOPUBCOM="<center><b>Comment received by the system</b><center>";

# Set the default forum option!! (0=unthreaded forum, 1=no foruns, 2=threaded forum, 3=user moderated forum)
$DEFAULT_DEBATE="1";

# use: "english" / "portuguese" /"german" / "french"
$DEFAULT_LANGUAGE="english";
$CUSTOM_LANGUAGE="on"; # allow backoffice users to have their own language preference

# Set the session_id cookie lifetime (in seconds); if next line is left commented, cookie will expire when browser is closed.
#$SESSION_ID_LIFETIME=60; # example: session_id cookie expires in one hour 

# Data Mining : (on/off)
$datamining="off";

#
#	Setup comments defaults 
#
# PUBCOMRESTRICT setup defines that 0=all comments are displayed, 1=only approved comments area displayed
$PUBCOMRESTRICT=1;
#
# PUBCOMORDER setup defines that "0"= ASCENDING crono order (form older to newer), "1" from newer to older
$PUBCOMORDER=0;
#
# PUBCOMUSEBOX defines the box used to display comments on the site ("-1" means no box, 0 means default, any number specifies de box ID)
$PUBCOMUSEBOX=0;	#
#
# Maximum number of comments comments that may appear in each page... 0=unlimted
$PUBCOMLIMIT=25;

# how to setup exceptions for a certain articles (in this example for article 18)
#$PUBCOMEXCEPTIO[18]="true";
#$PUBCOMEXCEPTIONRESTRICT[18]=0;
#$PUBCOMEXCEPTIONORDER[18]=1;
#$PUBCOMEXCEPTIONLIMIT[18]=25;

# Flag that is attached to the name of the user (pubcom_nome) when user is registered and submits a new comment
$PUBCOM_NOME_FLAG="";
#

#After how many seconds after the expiration_time defined in each forum do we want comments to be deleted?
#You can put 0 if you do not want to use this feature
$DELETE_COMMENTS_TIME=0;

#Variable to define the font used in Forum (IMPORTANT:Do not use '"')
$FORUM_FONT="<font>";

# how many results do we see on serach operations per page?
$SEARCHMAXRESULTS=10;
# default box to use on search results (-1 means no box, 0 means default boxes that you can define in this file) 
$SEARCHBOXUSE="0";
# results from search engine are: (-1 means from the most recent to the oldest, 1 means from the oldest to the most recent)
$SEARCHORDER="-1"; 

# default visual (i.e. interface) used by $LOCATE (0 means no interface)
$DEFAULT_VISUAL=1;

# default layout used by $LOCATE
# here you may apply stylesheets, bullets and any other formatting to costumize the output of $LOCATE results
# do not change the following macros
# --LINK-- is replaced by the link to the article. $DEFAULT_VISUAL is also used
# --ARTICLETITLE-- is replaced by the article title
# --DATE-- is replaced by the article's last change date
#
$LOCATE_LAYOUT="<a href=\"--LINK--\">--ARTICLETITLE--</a> (--DATE--)";

# Default date format used in articles
# Uses the format string of PHP date() function.
#
$DATE_FORMAT="Y-m-d H:i:s";						// 2001-11-01 18:48:35
#
# other examples:
# $DATE_FORMAT="F j, Y, g:i a";		            // March 9, 2001, 5:16 pm
# $DATE_FORMAT="l, m.d.y, h:i A";	            // Saturday, 03.09.01, , 05:16 PM
# $DATE_FORMAT="j, n, Y";                       // 9, 3, 2001
# $DATE_FORMAT="D M j G:i:s Y";					// Sat Mar 9 15:16:08 2001
# $DATE_FORMAT="H:i:s";                         // 17:16:17




# Siteseed can optimize your html output by stripping 
# needless double spaces & tabs (on the final output -
# everything in preserved on your database). This consumes
# more cpu per renderer but produces smaller pages (20%
# average on most sites). Should only be used if you have
# active caches (HEADLINE_CACHE / GLOBAL_CACHE or both)...
# 0=off 1=0n
$optimize_html=0;

# The cache settings
#
# in minutes for objects
#
$HEADLINE_CACHE=0;
#
# the rest in seconds... default and exceptions...
$GLOBAL_CACHE=0;
#	$cacher[homepage]=60;
#	$cacher[headline2visual1]=70;

# UNIX & imagemagik
# -----------------
# files paths required for the image conversion functions... (ending in a slash)
# on RedHat linux this is "/usr/bin/" for every rpm based install
#
# Some versions of imagemagik have a "convert" binary. If that is the case with the one
# you have installed GIFTOPNM_PATH, DJPEG_PATH, PNMSCALE_PATH and CJPEG_PATH will not be 
# used (since "convert" does all the required ops). Replace the default "NA" with the path
# to "convert". This is the case with the FreeBSD port.
#
# OpenBSD and RedHat linux (the ports/rpms we tried) come with the other binaries (instead of
# "convert"). Fix the pathes and make sure CONVERT_PATH is set "NA" (i.e. Not Available). 
#
# WINDOWS & Imagemagik
# --------------------
# On Windows you only need $DJPEG_PATH (you can comment or delete the other lines). It should be something like: $DJPEG_PATH="c:\Imagemagick\";
#
$DJPEG_PATH="/usr/local/bin/";
$GIFTOPNM_PATH="/usr/local/bin/";
$PNMSCALE_PATH="/usr/local/bin/";
$CJPEG_PATH="/usr/local/bin/";	
$CONVERT_PATH="NA";	

# microsoft word conversion utility
# Not yet implemented on Windows version.
$WVWARE_PATH="/usr/local/bin/";
#
# The following COM usage is still "Alpha" code:
# you can however if you running siteseed on WINDOWS, and have Microsoft Word 
# installed either locally or in a network machine (intranet) use COM support
# for the conversion. In that case uncomment the following line:
# $WVWARE_PATH="UseCOM"; 
$DCOM_Server="na"; # "na" means local conversion (if you have UseCOM enabled) use a IP address to use word on another machine.


# default box attributes
$plsbox_title="new";
$plsbox_color_border=  "#000000";
$plsbox_color_header=  "#E4E4D0";
$plsbox_color_content= "#FFFFFF";
$plsbox_color_footer=  "#E4E4D0";
$plsbox_size_border=   "1";
$plsbox_dist_border=   "5";
$plsbox_image_top_left= "";
$plsbox_image_top_right="";
$plsbox_image_top_row="";
$plsbox_image_bot_left="";
$plsbox_image_bot_right="";
$plsbox_image_bot_row="";
$plsbox_image_right="";
$plsbox_image_left="";

# default background colour from the "page object" and "article" editors (very convenient for sites in dark colors that use white fonts since the default is a white background...)
$EDITORSBGCOLOR="#FFFFFF";
# default object to be auto included in the "article" and "page object" editors (very handy for objects containing the site javascript routines or css definitions)
# It can be created on purpose or be exactly the one used in the site...
# 0=none, any other positive number correspond to the object
$EDITORDEFAULTOBJECTS="0";
#
# Or you can set specific articles where a certain object is helpfull
#$EDITORDEFAULTARTICLEOBJECTS[23]=6; # i.e. for article 23 object 6
#
# Or you can set specific page objects with a certain object previously loaded..
#$EDITORDEFAULTOBJECTOBJECTS[6]=7; # i.e. preload/render object 7 before showing object 6

#
# Calendar function defaults
#

# Month strings/images (Alaways without any '"')

$strm1="January";
$strm2="February";
$strm3="March";
$strm4="April";
$strm5="May";
$strm6="June";
$strm7="July";
$strm8="August";
$strm9="September";
$strm10="October";
$strm11="November";
$strm12="December";

# Week days strings/images defaults

$strSun="Sunday";
$strMon="Monday";
$strTue="Tuesday";
$strWed="Wednesday";
$strThu="Thursday";
$strFri="Friday";
$strSat="Saturday";

# who should receive e-mail on fatal errors?
define("ADMIN", "webmaster@mrnet.pt");

# how many articles do we export in XML? (0=none, any number means export that number :-)
$XmlLimit="10";

#
# -------------------------------------------------------------------------
# DO NOT CHANGE STUFF BELLOW THIS LINE...
#

define("DB_HOST", $database_server);
define("DB_USER", $database_username);
define("DB_PASSWORD", $database_password);
define("DB_NAME", $projecto);

define("ERROR_MESSAGE", "Critical error");

# Available Languages
$AVAIL_LANGUAGE[0][0] = 'english';
$AVAIL_LANGUAGE[0][1] = 'english.gif';
$AVAIL_LANGUAGE[1][0] = 'portuguese';
$AVAIL_LANGUAGE[1][1] = 'portuguese.gif';
$AVAIL_LANGUAGE[2][0] = 'german';
$AVAIL_LANGUAGE[2][1] = 'german.gif';
$AVAIL_LANGUAGE[3][0] = 'french';
$AVAIL_LANGUAGE[3][1] = 'french.gif';


# get user setting for language from cookie (if enabled, will overwrite default language)
if ($CUSTOM_LANGUAGE=='on' and isset($HTTP_COOKIE_VARS['DEFAULT_LANGUAGE']))
{
	$DEFAULT_LANGUAGE = $HTTP_COOKIE_VARS['DEFAULT_LANGUAGE'];
}



function strip_http_vars($arr = array())        
{
	while (list($key,$val) = each($arr)) 
	{
		global $$key;

		if(is_array($arr[$key])) $$key = stripslashes_array($arr[$key]); else
                        $$key = stripslashes($val);
	}
}

function stripslashes_array($arr = array())
{
        $rs = array();
        reset($arr);
        while (list($key,$val) = each($arr))
	{
                if(is_array($arr[$key])) $rs[$key] = stripslashes_array($arr[$key]); else
                $rs[$key] = stripslashes($val);
        }
        return $rs;
}


?>
