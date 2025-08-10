Thank you for downloading
### SUMUP Version 2.3

   SETUP
   ============================
   1) Open SUMUP.CGI and check if the perl path (e.g. #!/usr/bin/perl)
    is as the same as NewsPro. If you want to have SUMUP.DB in another
    directory, name sure to enter the full path for variable..
    ### $sumupfile = "./sumup.db";
    If you do have to change the path, change the same variable in
    NPA_SUMUP.PL
   
   2) Upload all scripts in ASCII mode. Make sure to chmod SUMUP.DB
    to 666, and SUMUP.CGI to 755.

   3) Thats it. Enjoy!

   USAGE
   =============================
   To display the number of ALL post, use this SSI tag..

	<!--#include virtual="/news/sumup.cgi?totalnews"-->

   To display the graph, use..

	<!--#include virtual="/news/sumup.cgi?viewgraph"-->

   # To customize the graph, open sumup.cgi and look for spots
   # with ######### surrounding it. You should only customize 
   # those areas.

   To display all number of post for ALL categories, use..

	<!--#include virtual="/news/sumup.cgi?allcats"-->

   To display certain categories, use..

	<!--#include virtual="/news/sumup.cgi?cat1&cat2&cat3"-->
	# You can use more categories!

   Tand to display just one category, use..

	<!--#include virtual="/news/sumup.cgi?cat1"-->

   ANY BUGS, QUESTIONS, COMMENTS, just email..

	WRESTLINGGAMER@HOUSTON.RR.COM