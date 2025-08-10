README - News Categories addon for NewsPro
VERSION 1.1
REQUIRES NewsPro VERSION 3.6 OR HIGHER

Installation:
	- copy npa_category.pl into your NewsPro directory in ASCII mode.
	If you want to enable support for news profiles in viewnews.cgi, then:
		- edit viewnews.cgi and ensure that $EnableAddons is set to 1 (in the first few lines)
		- copy vna_category.pl into your NewsPro directory in ASCII mode.
		


To configure the News Categories options, choose the News Categories option from the navigation
bar at the bottom of all NewsPro pages. Once on that page, you will notice two sections: News
Categories and News Profiles. A news category is just that: the name of a category of news items.
Once created, a category is not configured; it is simply added to the list of valid categories
that a news item can be added to. Simply adding a category will not cause new files to be generated.

News Profiles are files that are generated in your NewsPro directory, much like the news.txt file
that NewsPro generates by default. Once you create one of these, you must then configure it.
Most options there should be adequately explained. Once edited, you must click Enable File Creation
from the main News Categories page. This will cause NewsPro to generate the file configured
in this profile whenever news is built.

One item in News Profile configuration needs a little more explanation: the choice of news 
subroutine. All your news style is stored in ndisplay.pl, in the form of "subroutines". These are
formatted like:

sub SubName {
$newshtml = qq~
The HTML for each news item. Can include variables like:
$newssubject, posted by $newsname in category $newscat
~;
}

The default subroutine, and the one used when generating your regular news, is DoNewsHTML.
To generate headlines, use DoHeadlineHTML.
You can also add your own subroutines to ndisplay.pl, following the example above.

NewsPro's standard functionality will ignore categories. Your news.txt file, headlines, archives, etc. 
will treat all news items the same, so that news from different categories can be mixed together. 
Most of these functions - news, headlines - can be duplicated by the News
Categories addon. The exception here is archiving; currently archives can't differentiate
between categories. This will hopefully be included in a future version.

If necessary, you can create HTML files as well as text files for a profile. To do this, create a file
with a .tmpl extension. This file should be a standard HTML files, with <InsertContent> placed where
you want the content of that profile inserted. As well, you can use <InsertTitle> to insert the title
of the page as specified in the profile settings. Once the .tmpl file is created, you can associate
it with a profile via the Edit Profile page.

Finally, a small addon for viewnews.cgi is also included in this package. It simply allows you
to call viewnews.cgi as follows:

viewnews.cgi?profilemyprofile

This would display the output of profile myprofile. This would be exactly the same as the 
contents of myprofile.txt, if file creation is enabled. However, viewnews.cgi can also
display profiles than don't have file creation enabled.