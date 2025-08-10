---------- KrYo talkback ---------

NewsPro: http://amphibian.gagames.com/

KrYo's NewsPro Page: http://www.tremor.se/newspro

Readme - kTalk (KrYo talkback add-on for NewsPro 3.7.4 or higher)

Version: ktalk 2.0 
Author:  KrYo ktalk@tremor.se
Licensing information in license.txt.


UPGRADING NOTES:
To upgrade from version 1.0 to 2.0
- In ktalk.tmpl (within the <form> tag) ... You can alter the password length if you like.
ADD: <input type="password" name="password" maxlength="10">


- In response.tmpl
ADD: <!--ktalk field unregistered-->
ADD: <!--ktalk numindex-->
ADD: <!--ktalk field time-->
ADD: <!--ktalk field ip-->
ADD: <!--kTalk NewsSubject-->
RENAME: response.tmpl to ktresponse.tmpl

- confirm.tmpl 
RENAME: confirm.tmpl to ktconfirm.tmpl

- Upload and overwrite
(if you have made any personal alterations to ktalkpost.cgi or npa_ktalk.pl they will be lost)
npa_ktalk.pl
ktalkpost.cgi

Then you have to config the settingsfile (ktconfig.pl) all you need to know is commented in there.


****************************************************
                    Installation
****************************************************

STEP 1
Create a directory to hold all your talkback HTML files that your users will
access. This directory must be world-writable, i.e. CHMOD 777 (or, on some
servers, 666) on Unix (and Linux, BSD, etc.) systems. Do not copy anything into
this directory.

STEP 2
Edit ktconfig.pl, setting the necessary variables. They are documented within
the file.

STEP 3
Edit ktalkpost.cgi, and specify the correct path to Perl at the top. If it will
be in a different directory than ktconfig.pl, set its path in ktalkpost.cgi.

STEP 4
You probably also want to edit all the .tmpl files (ktalk.tmpl, ktresponse.tmpl,
ktconfirm.tmpl). While everything will work if you don't edit them, the pages
generated will be pretty bland and simple.

STEP 5
Copy all files to your NewsPro directory, in ASCII mode. 
On UNIX systems, you must CHMOD ktalkpost.cgi 755. Then CHMOD the userdatabase
called ktusers.dat 666. See the NewsPro readme.txtfor more information on 
how to CHMOD.

NOTE: if you use viewnews.cgi to show your news items, you should edit
viewnews.cgi and make sure the line at the top that starts with $EnableAddons is
$EnableAddons = 1;
This tells viewnews.cgi to look for addons, like kTalk.

STEP 6
OK, here comes the tricky part. You have to edit the ndisplay.pl file, already
present in your NewsPro directory.

If you haven't already edited ndisplay.pl manually, replace #<Manual!Edit> at
the beginning of the file with #<ManualEdit>

Now, go down to the area that starts
sub DoNewsHTML {

This is where your news style is configured. You must insert the following code
in the middle of your HTML where you want a link to your comments to appear.

~;
if ($ktalknum ne ''){
    $newshtml .= qq~
	<a href="$ktalkURL">Comments ($ktalknum)</a>
	~;
}
$newshtml .= qq~

You can edit the above to reflect your news style. Specifically, you can edit
the line that starts with <a href. $ktalkURL will be replaced with the URL to
the talkback page, and $ktalknum will be replaced with the number of comments
posted. Note that the number of comments will only be updated when you rebuild
your news file or submit news.

As an EXAMPLE, here is a sample sub DoNewsHTML section from an ndisplay.pl file:

sub DoNewsHTML {
# DO NOT REMOVE THIS LINE <BeginEdit>
$newshtml = qq~
<p><strong><font color="#ff0000">$newssubject</font> </strong><small>Posted
$newsdate by <a href="mailto:$newsemail">$newsname</a></small><br>
$newstext
~;
if ($ktalknum ne ''){
    $newshtml .= qq~
	<a href="$ktalkURL">Comments ($ktalknum)</a>
	~;
}
$newshtml .= qq~
</p>
~;
# DO NOT REMOVE THIS LINE <EndEdit>
}

STEP 7 (ONLY NECESSARY if you have enabled registration in ktconfig.pl)
Point your browser to:
http://www.yoursite.com/path/ktalkpost.cgi?dispadduserform
Give yourself a username and password. These are independent of those in NewsPro.

STEP 8
Enjoy! Now, when you post news items, you should see a new option: whether or
not to create a talkback file. As well, Webmaster-level users will see a kTalk
Administration option.

Questions and comments may go to kryo@tremor.se or support@amphibian.hypermart.net.

****************************************************
                    Notes
****************************************************

You can change the apperance of the 'add user' and 'recover lost password' forms.

Quick instructions:

* Add user.
Point your browser to...
http://www.yoursite.com/path/ktalkpost.cgi?dispadduserform
Choose "View source" in your browser.
Copy and paste the information into a new document.
Edit away and then upload the document to your site.

* Recover lost password.
Point your browser to...
http://www.yoursite.com/path/ktalkpost.cgi?displostpassform
Choose "View source" in your browser.
Copy and paste the information into a new document.
Edit away and then upload the document to your site.

ktmessage.tmpl is used for:
	- Various confirmation messages.
	- Forms (lost password, adding a user).
	- Error messages.

It may be edited; instructions on editing are in the file.

Server Side Includes (SSI) WILL NOT WORK in ktmessage.tmpl.

****************************************************
	       Version history
****************************************************

VERSION 2.0:
ADDED: Userdatabase, tada!
ADDED: Admin interface integrated within NewsPro
ADDED: Time and date (tactic's mod)
ADDED: Ability for users to change their userdata and recover lost passwords.
ADDED: Ability to set if the talkbackpages should be closed to unregistered users.
ADDED: Postcount on the talkbackpage (tictac's mod) (Optional)
ADDED: Every comment gets mailed to an admin (Optional)
ADDED: VIP colors (Optional)
ADDED: Autolinking of urls (Optional).
ADDED: "UBB Codes"(Optional)
ADDED: User Registration (Optional)
ADDED: Ability to edit a "ktalk.msg" file (see notes).
ADDED: Loads of other minor things.
ADDED: Ability to use News Subject in ktalkpage.
CHANGED: All but email are required fields.
CHANGED: Renamed templates so that all kTalk files starts with the letters 'kt' (except npa_ktalk.pl and vna_ktalk.pl)

VERSION 1.0:
ADDED: Ability to build news on posting.
ADDED: Ability to remove comments via Modify News.
CHANGED: Settings now in ktconfig.pl.
FIXED: Bugs, primarily with comments not being posted.

VERSION 0.9:
First public release

Major to-do's: 
Rebuilding of the news on the talkback pages when modifying news.

****************************************************
	          THANKS TO:
****************************************************
Tactic: for showing me how nice you could implement kTalk into a great newssite.
Aurum: for valuable suggestion on new features.
Per: for beeing a great "bollplank" (swedish) :)
Steele: For betatesting.
The people in the Newspro forum, you guys rock, reminds me of the old Quake scene.
Last but not least... elvii for the greatest perl hack in the universe.

