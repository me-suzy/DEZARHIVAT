#              --------------------------------------
#                   Advanced MetaSearch Add-On
#                 MP3-Search Addon (version 3.1)
#                    File: MP3_ReadMe.txt
#              --------------------------------------
#                     All Rights Reserved 
#                   (c) CurryGuide.com, 2000.
#
#
#
# IMPORTANT:
#
# This program, its components, subroutines are property of CurryGuide.
# As agreed, you are only allowed to use this program under the following
# conditions:
#
# 1. This MP3-Search addon and other related script files 
# (hereinafter mentioned as 'script') remains under the copyright of 
# CurryGuide which includes the programming design, architecture, 
# individual operational blocks, subroutines etc. You, the buyer is 
# quoted as the 'buyer' hereinafter.
# 
# 2. The 'script' as a whole or any part of it may NOT be resold, 
# copied, transferred to another party or used in any other program 
# for ANY purposes.
#
# 3. The 'buyer' is only allowed to update or modify individual elements
# or programming blocks or subroutines where they are clearly marked 
# as modifiable or commented as modifiable.
#
# 4. E-Mail Technical support is provided under the terms defined in the 
# 'Package Description' on the website.
#
# 5. Under no circumstances CurryGuide shall be held liable to ANY 
# loses, fines, judiciary proceedings directly or indirectly related 
# to purchase or usage of this 'script'. The 'buyer' uses this program 
# entirely on his/her own risk.
#
# 6. One single package entitles the 'buyer' to use it on one (1) single
# individually identifiable domain or sub-domain ONLY.
#
# 7. The 'buyer' must clearly identify his/her requirements and clarify 
# all technical compatability issues before the actual purchase. 
# The 'buyer' also understands that NO refunds can be claimed.
#
# 8. Headers and CopyRight information at the beginning of each file MUST
# remain intact. Under no circumstances you are allowed to alter or
# modify or remove them.
#
# 9. CurryGuide reserves the sole right to review and/or change the 
# 'Purchase and Usage Conditions'. Current 'Purchase and Usage 
# Conditions' will be available on a CurryGuide website.
#
# ---------------------------------------------------------------------


REQUIREMENTS: Advanced MetaSearch (Version-3.X) installed. This addon 
              will not work with older versions. If you are not yet 
	      running version-3.X, please contact support@curryguide.com


NOTE: If you are an existing user of MP3-Search and have downloaded this file
      to update your current MP3 Engine-Modules, you will only need to upload
      the Module files from the 'eng-mp3' sub-directory to the 'eng-mp3'
      sub-directory on your server thus Replacing your older Module files with
      these new ones.



TABLE OF CONTENTS
-----------------------------------------------------------------------

    1. The Package
	
    2. System Requirements
	
    3. Installation
	
    4. Usage
	
    5. Problems
	
    6. Technical Support
	
---------------------------------------------------------	


1. The Package
--------------

The package usually comes in a compressed zip file. When unzipped
it should contain the following files:

	1. MP3-Search Engine Modules (in the sub-directory 'eng-mp3').
	2. MP3-Search Template (mp3.html located in the 
	  'templates' sub-directory). You can modify it with your own 
	  HTML design.
	3. test.html - A HTML file with Sample Search-Box Examples 
	   of MP3-Search. You also use it to test your search engine.
	4. MP3_ReadMe.txt (this file)
	

2. System Requirements
----------------------

'Advanced MetaSearch 3.1' script installed and working properly.



3. Installation
---------------
NOTE: When unzipping the package, you should try to keep the 
directry tree as received. In case you did not do it OR your  
unzip program required any special instructions to do so, you 
can unzip the package again to KEEP the Directory Structure 
(tree). You will need to install the Engine-Module files as packed 
in the package. The Template file should be uploaded to the 
'templates' sub-directory.

	
	a) Create a new sub-directory named 'eng-mp3' within the Main 
	Script directory ('cgsearch'). There should be four or more 
	sub-directories in the main 'cgsearch' directory now 
	('eng-web', 'storage', 'templates', 'eng-mp3' and any other 
	Speciality-Search add-on sub-directory you may already have).
	
	
	b) Upload the MP3 Engine-Modules to the NEW 'eng-mp3' 
	sub-directory. Set permission to each Engine-Module as follows:
	- chmod 644   (-rw-r--r--)
	
	b) Upload the MP3-Search Template (mp3.html) to the 
	'templates' sub-directory. Set permission to the Template file 
	as follows:
	
	mp3.html  - chmod 644   (-rw-r--r--)
	(You can re-design this Template file to your requirements)
	

4. Usage
------------------

MP3-Search can be initiated using any of the two Form Inputs:
Form Input 'where'
or
Form Input 'target'

When assigned value of any of the above Form Input value is 'mp3' there 
will be a Real time MP3 Search. Example:
<input type=......   name=where value=mp3>
OR
<input type=......   name=target value=mp3>

You can use any suitable Form Input Type (Select, Radio etc.) to 
add it as a search-option. Simply follow usual HTML FORM syntax.

Using a Picture icon:
---------------------
By default '[PICTURE]' will be shown against items where a picture 
of the item is available. You can use a tiny image instead.
To show such an image, create a tiny image and upload it to anywhere 
in your HTML directory (where your other images/HTML pages are located.
Do not upload the image in your cgi-bin directory. On most servers 
images will not show-up from a cgi-bin directory).

	open each MP3-Engine file with a Plain Text Editor. Find the 
	following line (at the begining of file):

#$Picture_URL = '<img src="http://your.server.com/images/pic.gif" width="16" height="14" border="0" alt="Picture Available">'; 	

	Now, 
	1. UNCOMMENT the line (remove the '#' at the begining of line)
	2. Put the correct URL of the image you want to use. You can also 
	modify the 'alt', 'width', 'height' parameters as necessary.
	(DO NOT CHANGE OTHER IMAGE ATTRIBUTES IF YOU ARE NOT SURE.)
	
	Save the Engine files and upload them to your server.


5. Problems
------------------

	a) 500 Server Error
		
	Make sure you upload you files in ASCII mode (not BINARY). Usually
	all HTML files, images are uploaded in Binary mode. BUT cgi 
	scripts usually need to be uploaded in ASCII mode.

	You can also try to run your engine in Debug Mode to trace reasons 
	for any other strange problems. See below:

	$DEBUG_ON = 0;  # OFF  
	Make $DEBUG_ON = 1; if you get any runtime problem or error. 
	This will try to give you some hint. You should set it to 0 
	(zero) once you have rectified the problem.	You can find this 
	parameter at the begining of 'cgsearch.cgi' file.


6. Technical Support
--------------------

Unless otherwise stated, you are entitled to 10 days e-mail support 
on MP3-Search Installation issues ONLY. In any correspondence, 
please mention your Customer ID.

Technical Support: support@curryguide.com
Website: http://services.curryguide.com/meta_prog/
User-Area: http://services.curryguide.com/meta_prog/userarea.html

====================================================================
                                    Doc ref: AMMP3-30100-01-2000-DOC	
No part of this document shall be reproduced, copied, published in 
any other media or transferred to a third party without written 
permission.

All Rights Reserved, 2000.
CurryGuide.com (A division of Highfield Business Corporation)
Website: http://services.curryguide.com/
Admin:   admin@curryguide.com
Sales: 	 sales@curryguide.com
Support: support@curryguide.com
