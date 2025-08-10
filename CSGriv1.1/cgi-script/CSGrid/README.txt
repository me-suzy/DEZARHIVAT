#####################################################################
#                                                                   #
#    Copyright © 1999-2001 CGISCRIPTS.NET - All Rights Reserved     #
#                                                                   #
#####################################################################
#                                                                   #
#          THIS COPYRIGHT INFORMATION MUST REMAIN INTACT            #
#                AND MAY NOT BE MODIFIED IN ANY WAY                 #
#                                                                   #
#####################################################################
#
# When you downloaded this script you agreed to accept the terms 
# of this Agreement. This Agreement is a legal contract, which 
# specifies the terms of the license and warranty limitation between 
# you and CGISCRIPTS.NET. You should carefully read the following 
# terms and conditions before installing or using this software.  
# Unless you have a different license agreement obtained from 
# CGISCRIPTS.NET, installation or use of this software indicates 
# your acceptance of the license and warranty limitation terms
# contained in this Agreement. If you do not agree to the terms of this
# Agreement, promptly delete and destroy all copies of the Software.
#
# Versions of the Software 
# Only one copy of the registered version of CGISCRIPTS.NET 
# may used on one web site.
# 
# License to Redistribute
# Distributing the software and/or documentation with other products
# (commercial or otherwise) or by other than electronic means without
# CGISCRIPTS.NET's prior written permission is forbidden.
# All rights to the CGISCRIPTS.NET software and documentation not expressly
# granted under this Agreement are reserved to CGISCRIPTS.NET.
#
# Disclaimer of Warranty
# THIS SOFTWARE AND ACCOMPANYING DOCUMENTATION ARE PROVIDED "AS IS" AND
# WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER
# WARRANTIES WHETHER EXPRESSED OR IMPLIED.   BECAUSE OF THE VARIOUS HARDWARE
# AND SOFTWARE ENVIRONMENTS INTO WHICH CGISCRIPTS.NET MAY BE USED, NO WARRANTY 
# OF FITNESS FOR A PARTICULAR PURPOSE IS OFFERED.  THE USER MUST ASSUME THE
# ENTIRE RISK OF USING THIS PROGRAM.  ANY LIABILITY OF CGISCRIPTS.NET WILL BE
# LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE.
# IN NO CASE SHALL CGISCRIPTS.NET BE LIABLE FOR ANY INCIDENTAL, SPECIAL OR
# CONSEQUENTIAL DAMAGES OR LOSS, INCLUDING, WITHOUT LIMITATION, LOST PROFITS
# OR THE INABILITY TO USE EQUIPMENT OR ACCESS DATA, WHETHER SUCH DAMAGES ARE
# BASED UPON A BREACH OF EXPRESS OR IMPLIED WARRANTIES, BREACH OF CONTRACT,
# NEGLIGENCE, STRICT TORT, OR ANY OTHER LEGAL THEORY. THIS IS TRUE EVEN IF
# CGISCRIPTS.NET IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO CASE WILL
# CGISCRIPTS.NET' LIABILITY EXCEED THE AMOUNT OF THE LICENSE FEE ACTUALLY PAID
# BY LICENSEE TO CGISCRIPTS.NET.
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

Description:

CSGrid is a system to easy display and manage tabular or grid-like
information for your website. There are three ways you can enter the
data:

	1) Import from text file
		a) comma delimited
		b) tab delimited
		c) pipe delimited
	2) Copy and paste delimited text
	3) Manually create blank grid

Uses include displaying product information, contact information, 
sports scores, stocks, etc. Anything that you would display in a 
table can be displayed and managed with CSGrid. You can display full
tables or individual cells within a table.

You can also use csGrid to emulate a database. 

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSGrid <-- CSFileshare directory
   /cgi-script/CSGrid/templates <-- template directory.

  CSGrid.cgi should be located at 
  [root url]/cgi-script/CSGrid/CSGrid.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSGrid/CSGrid.cgi
  (Note: This URL will produce a blank page. This is normal.)

2. Chmod CSGrid.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSGrid.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSGrid/CSGrid.cgi'; #<-- URL of this script.
   $cgipath='/www/vhosts/cgiscript.net/cgi-script/CSGrid/'; #<-- path of CSGrid directory. add trailing '/'
   $username = 'demo'; #<-- username to enter management screens.
   $password = 'demo'; #<-- password to enter management screens.

   $cgiurl is the URL to CSGrid.cgi

   $cgipath is the full path the CSGrid.cgi (don't forget to add a trailing '/')

   $username and $password are used to enter the control panel.

Instructions:

Creating Grids
1. Go to:
   [$cgiurl]?command=manage where [$cgiurl] is the URL to CSGrid.cgi. Example:
   http://www.cgiscript.net/cgi-script/CSGrid/CSGrid.cgi?command=manage
   Enter the username and password configured with the $username and $password variables.
2. Click 'Add Gridview Database'.
3. Enter the name of this gridview. Choose a name with alphanumeric characters and no spaces.
4. Create the grid by either importing a tab, comma, or pipe text file, or cut/paste a delimited
   text file (each row should be on a separate line), or enter the number of rows and columns 
   of your new grid.
5. Click 'Next'
6. Preview, add, or adjust the information on the following page. You can delete runs, insert rows,
   and shuffle runs up or down. Click on the '.' next to the field to view or enter information
   in a cell that has multiple lines. When you are finished, click 'Save'.

Managing Grids
Once you have a grid setup in the system, you can edit it, view or duplicate the default template, or
delete or duplicate the grid itself. When you duplicate the default template, it will enter it in the
lower table where you can modify it as desired. 

Creating Templates
You can create a template from scratch or duplicate the default template to use as a starting point. The
basic format of the template is this:

<table border="1" width="100%" cellspacing="0" cellpadding="2">
<!--rowstart atest-->
<tr>
<td>in(col1)</td><td>in(col2)</td><td>in(col3)</td>
</tr>
<!--rowend-->
</table>

where in(colx) is the column number of your grid and <!--rowstart [name]--> is the name of your grid.
You can also include multiple Gridviews on the same template. For example:
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<!--rowstart atest-->
<tr>
<td>in(col1)</td><td>in(col2)</td><td>in(col3)</td>
</tr>
<!--rowend-->
</table>

<table border="1" width="100%" cellspacing="0" cellpadding="2">
<!--rowstart btest-->
<tr>
<td>in(col1)</td><td>in(col2)</td><td>in(col3)</td>
</tr>
<!--rowend-->
</table>

would first display the 'atest' grid followed by the 'btest' grid.

You can also add additional html to templates you create.

<table border="1" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td>Column 1</td><td>Column 2</td><td>Column 3</td>
</tr>
<!--rowstart btest-->
<tr>
<td>in(col1)</td><td>in(col2)</td><td>in(col3)</td>
</tr>
<!--rowend-->
</table>

This code would insert the row containing 'Column 1', 'Column 2', 'Column 3'. You
have to enter this code prior to the <!--rowstart [name]--> code, otherwise it
would repeat. You can also add titles, change the font color and size, etc.

Displaying Gridviews
Grids can be viewed with the following URL:
[your url]?command=view&t=[template name]

where [your url] is the URL to CSGrid.cgi and [template name] is the name of your template. 
Example:
This would display the 't_atest.htm' template.
http://www.cgiscript.net/cgi-script/CSGrid/CSGrid.cgi?command=view&t=t_atest.htm

This would display the default template, 'td_atest.htm'
http://www.cgiscript.net/cgi-script/CSGrid/CSGrid.cgi?command=view&t=td_atest.htm

If you have the ability to run server side includes (SSI), then you can place 
multiple grids on a single page. The SSI code follows the format:
<!--#include virtual="[$cgiurl]?command=view&t=[template name]"-->
where [$cgiurl] is the URL to CSGrid.cgi WITHOUT the http://www.domain.com and
[template name] is the name of your template. Example:
<!--#include virtual="/cgi-script/CSGrid/CSGrid.cgi?command=view&t=td_atest.htm"-->
would display the default atest template included on your page.

**New in version 1.1
You can explicitly call any cell within a grid without a template with the following URL:
<!--#include virtual="[$cgiurl]?command=showcell&grid=[identifier]&row=[row]&col=[cell]"-->
Example:
<!--#include virtual="/cgi-script/CSGrid/CSGrid.cgi?command=showcell&grid=grid1&row=2&col=3"-->
would display the 2nd row, 3rd column from the 'grid1' grid. This adds a convenient way
to update information you have spread throughout your site. One example of a use would
be to display product pricing. 

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net