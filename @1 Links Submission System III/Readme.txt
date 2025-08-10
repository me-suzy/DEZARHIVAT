Installation:

1) Create a subdirectory called "my_links" in the cgi bin,
   chmod to 777.

2) Open links.cgi with a text editor. Go to "Step B" in links.cgi
   and configure the script. Upload links.cgi to the directory
   create in 1) and chmod to 755.

3) Create a directory called "links" under the root
   directory ie., http://www.yourdomain.com/links/.
   Upload admin.htm, useradd.htm, usersearch.htm and template.htm
   to this directory (make sure that you modify the URL in the
   forms to point to links.cgi at your server). Chmod directory
   "links" to 777.

4) Create a directory called "uploadimages" under the "links"
   directory. All image logos uploaded by users are kept here.
   Chmod directory "/links/uploadimages" to 777.

5) Create a directory called "links" in parallel with the root
   directory. Ie., if the path to your main home page is
   /usr/home/you/public_html/index.htm , the path for this freelink
   directory should be /usr/home/you/links . By having this
   data directory in parallel with your root directory, your data
   will not be stolen. Chmod this directory to 777.

6) The data file and temporary data file will be automatically created
   by the script. You do not need to configure or chmod them.

IMPORTANT:
Read instruction in Step B of links.cgi carefully. The
default configuration is as used in our demo. Please change it
accordingly.

Others:
1) By default, input to all fields are required during submission.
   To make any field as optional item, go to Step R4, R8 and R12 and
   follow the instruction there.

PROBLEMS?
========
Please sent an email to help@upoint.net describing
- the problems
- error message generated
- URL to the script and/or result page
- other things that you think might be helpful
* We usually response in less than 12 hours (average is about 4 hours). But before that, you will receive an auto-responded email describing the most common CGI installation mistakes.

The Management,
UPDN Network Sdn Bhd
www.upoint.net
General: mail@upoint.net
Technical help: help@upoint.net

