Installation:

1) Create a subdirectory called "my_freelink" in the cgi bin,
   chmod to 777.

2) Open freelink.cgi with a text editor. Go to "Step B" and 
   configure the script. Upload freelink.cgi to the directory
   create in 1) and chmod to 755.

3) Create a directory called "freelink" under the root
   directory ie., http://www.yourdomain.com/freelink/.
   Upload freelink_admin.htm, freelink_addURL.htm,
   freelink_search.htm and template.htm to this directory (make
   sure that you modify the URL in the forms to point to
   freelink.cgi at your server).

4) Create a directory called "freelink_logo" under the "freelink"
   directory. You should upload all logos submitted to you to 
   this directory via FTP.

5) Create a directory called "freelink" in parallel with the root
   directory. Ie., if the path to your main home page is
   /usr/home/you/public_html/index.htm , the path for this freelink
   directory should be /usr/home/you/freelink . By having this
   data directory in parallel with your root directory, your data
   will not be stolen.

6) Upload "freelink.txt" and "freelink.temporary" to the directory
   created in step 5), chmod both to 666.

Others:
1) By default, input to all fields are required during submission.
   To make any field as optional item, go to Step R4 and follow the
   instruction there.

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

