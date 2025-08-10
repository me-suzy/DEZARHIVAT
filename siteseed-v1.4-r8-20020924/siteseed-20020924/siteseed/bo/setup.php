<?
require_once "../config.php";

if($projecto == "" || !($db_link=mysql_pconnect($database_server, $database_username, $database_password)) )
{
	echo "<b>Loading basic site information and connecting to the database: </b>Failed<br>";
	exit;
}




#
# 	Check if this project database is there...
#
if( !(mysql_select_db($projecto, $db_link)) && $defs<1 )
{
	print "This looks like a fresh install. What do you want me to do?<br><br>";
	print "<li> I am a new Siteseed user: <a href=setup.php?defs=1>Install defaults I can learn with...</a><br><br>";
	print "<li> I am a experienced Siteseed user: <a href=setup.php?defs=2>Basic install with no defaults</a><br><br>";
	exit;
}

if( !(mysql_select_db($projecto, $db_link)) )
{
	echo "<b>Creating the \"$projecto\" database: </b>";
	
	if( !(mysql_create_db($projecto, $db_link)) )
	{
		echo "Failed! Aborting setup.<br>";
		exit;
	}
	else
	{
		echo "Ok!<br>";
		
		if( !(mysql_select_db($projecto, $db_link)) )
		{
			echo "<b>Connecting to the created \"$projecto\" database: </b> Failed! Aborting setup.<br>";
			exit;		
		}
		else
		{
			# Set defaults...
			echo "<b>Creating tables</b>: AREAS ";
			mysql_query("CREATE TABLE areas (
  			id int(11) NOT NULL auto_increment,
  			parent int(11) NOT NULL default '0',
  			weight int(11) NOT NULL default '0',
  			name char(255) NOT NULL default '',
  			skin int(11) NOT NULL default '0',
  			section_type int(11) NOT NULL default '0',
  			type_id int(11) NOT NULL default '0',
  			url char(255) NOT NULL default '',
  			comments int(11) NOT NULL default '0',
  			comments_layout int(11) NOT NULL default '0',
  			PRIMARY KEY (id),
  			UNIQUE KEY id_2(id),
  			KEY id(id))", $db_link);

                        mysql_query("INSERT INTO areas VALUES (1,0,1,'Search engine',1,3,0,'',0,0)", $db_link);


			echo "CSS ";
                        mysql_query("CREATE TABLE css (
                        id int(11) NOT NULL auto_increment,
                        name varchar(255) NOT NULL default '',
                        file varchar(255) NOT NULL default '',
			instance varchar(255) NOT NULL default '',
			weight  varchar(255) NOT NULL default '',
                        size  int(11) NOT NULL default '0',
                        size_units  varchar(255) NOT NULL default '',
                        text_trans  varchar(255) NOT NULL default '',
                        color  varchar(255) NOT NULL default '',
                        style  varchar(255) NOT NULL default '',
                        family  varchar(255) NOT NULL default '',
                        background  varchar(255) NOT NULL default '',
                        decoration  varchar(255) NOT NULL default '',
                        height int(11) NOT NULL default '0',
                        height_units  varchar(255) NOT NULL default '',
			text varchar(255) NOT NULL default '',
                        PRIMARY KEY (id),
                        UNIQUE KEY id(id),
                        KEY id_2(id))", $db_link);


			echo "CSS Files ";
                        mysql_query("CREATE TABLE css_files (
                        id int(11) NOT NULL auto_increment,
                        name varchar(255) NOT NULL default '',
                        PRIMARY KEY (id),
                        UNIQUE KEY id(id),
                        KEY id_2(id))", $db_link);


			echo "CONFIG ";
			mysql_query("CREATE TABLE config (
  			name varchar(30) NOT NULL default '',
  			value varchar(255) NOT NULL default '')", $db_link);

			mysql_query("INSERT INTO config VALUES ('main title','Default install page')", $db_link);
			mysql_query("INSERT INTO config VALUES ('main skin','1')", $db_link);
			mysql_query("INSERT INTO config VALUES ('main section type','1')", $db_link);
			mysql_query("INSERT INTO config VALUES ('main type id','1')", $db_link);


			echo "SKINS ";
			mysql_query("CREATE TABLE skins ( 
			id int(11) NOT NULL auto_increment,
  			name varchar(255) NOT NULL default '',
  			prefix text NOT NULL,
  			suffix text NOT NULL,
  			PRIMARY KEY (id),
  			UNIQUE KEY id(id),
  			KEY id_2(id))", $db_link);

			if($defs<2)
			{
	                        mysql_query("INSERT INTO skins VALUES (1,'Default interface','<? \$myheadline=\$headline; ?>\r\n<html>\r\n<head>\r\n<!-- Interface - HTML HEADER (title + meta) -->\r\n<?\r\n        \$headline=6;\r\n        include\"object/show.php\";\r\n?>\r\n</head>\r\n<body bgcolor=\"#FFFFFF\"  text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n\r\n<!-- Interface - Top menu -->\r\n<?\r\n        \$headline=5;\r\n        include\"object/show.php\";\r\n?>\r\n\r\n\r\n<!C- Main content area with a left side menu area --!>\r\n<table width=100% border=0 cellspacing=20>\r\n <tr>\r\n  <td width=1% valign=top align=center>\r\n\r\n<!-- Handle user logins and new user registration --> \r\n<?\r\nif(strlen(\$session_id)>0)\r\n{\r\n     \$current_user=get_user_data(login);\r\n     \$current_karma=get_user_data(karma);\r\n     \$current_karma+=0;\r\n?>\r\n<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=#B7C56C width=200>\r\n <tr><td>\r\n  <table border=0 cellpadding=5 cellspacing=1 width=100%><tr>\r\n   <td bgcolor=#B7C56C>\r\n    <center><?print \"Current user: <b>\$current_user</b>\";?></center>\r\n   </td></tr>\r\n   <tr><td bgcolor=#DFE5BD><center>\r\n<br>\r\n<small>[<a href=logout.php>Log out</a>]<br>[<a href=index.php?headline=3&visual=1>Edit account</a>]</small>\r\n   </center><br></td></tr>\r\n  </table>\r\n </td></tr>\r\n</table>\r\n<?\r\n}\r\nelse\r\n{\r\n         \$headline=4;\r\n         include\"object/show.php\";\r\n}\r\n?>\r\n\r\n<br>\r\n\r\n   <!C-                         Dinamic object with the search engine box \r\n           (uses PHP to insert all topics in the search engine select popup box) --!>\r\n<?\r\n   \$headline=2;\r\n   \$evalme=1; \r\n   require \"object/show.php\"; \r\n?>\r\n\r\n<br>\r\n\r\n<!C-                         Dinamic object with a small context display demo\r\n           (uses PHP to  determine what the user is doing and changing something, in this case printing a string,  based\r\n           on what the user is doing on the site... instead of printing a string it could be something like printing a navigation\r\n           bar or hilighting something like the current section...) --!>\r\n<?\r\n   \$headline=7;\r\n   \$evalme=1; \r\n   require \"object/show.php\"; \r\n?>\r\n\r\n<br>\r\n\r\n<!C- A survey allways looks nice on a page. In this case we will be printing the latest survey created by the editorial\r\nstaff. If none exists nothing will be displayed --!>\r\n<?\r\n   \$headline=8;\r\n   \$evalme=1; \r\n   require \"object/show.php\"; \r\n?>\r\n\r\n\r\n\r\n  </td>\r\n  <td width=99% valign=top>\r\n  <? if (\$myheadline>0) { \$headline=\$myheadline; } ?>','  </td>\r\n </tr>\r\n</table>\r\n</body>\r\n</html>')", $db_link);
			}
			else
			{
				mysql_query("INSERT INTO skins VALUES (1,'Default interface','<html>\r\n<header><title>I´ve made it! Got it running</title></header>\r\n<body>\r\n','</body>\r\n</html>')", $db_link);
			}


			echo "SURVEY ";
			mysql_query("CREATE TABLE survey_options (
  			survey_id int(11) NOT NULL default '0',
  			option_id tinyint(4) NOT NULL default '0',
  			option_text char(255) NOT NULL default '',
  			color char(7) NOT NULL default '',
			image char(50) NOT NULL default '')", $db_link);

			if($defs<2)
			{
	                        mysql_query("INSERT INTO survey_options VALUES (1,1,'Yes','#FF0000','')", $db_link); 
	                        mysql_query("INSERT INTO survey_options VALUES (1,2,'Not really','#00FF00','')", $db_link); 
			}


			mysql_query("CREATE TABLE survey_votes (
  			survey_id int(11) NOT NULL default '0',
  			option_id tinyint(4) NOT NULL default '0',
  			counter bigint(20) NOT NULL default '0')", $db_link);

			if($defs<2)
			{
				mysql_query("INSERT INTO survey_votes VALUES (1,2,1)", $db_link);
				mysql_query("INSERT INTO survey_votes VALUES (1,1,2)", $db_link);
			}

			mysql_query("CREATE TABLE surveys (
  			id int(11) NOT NULL auto_increment,
  			name char(120) NOT NULL default '',
  			question char(255) NOT NULL default '',
  			PRIMARY KEY (id),
  			UNIQUE KEY id_2(id),
  			KEY id(id))", $db_link);

                        if($defs<2)
                        {
                                mysql_query("INSERT INTO surveys VALUES (1,'Demo survey','Do you Like Siteseed?')", $db_link);
			}


			echo "USERS ";
			mysql_query("CREATE TABLE user_fields (
  			id int(11) NOT NULL default '0',
  			field_name char(20) NOT NULL default '',
  			field_type char(20) NOT NULL default '',
  			field_lenght int(11) default NULL,
  			required_to_login char(1) default NULL,
  			required_to_register char(1) default NULL,
  			mandatory_to_register char(1) default NULL,
  			must_be_unique char(1) default NULL)", $db_link);

			mysql_query("INSERT INTO user_fields VALUES (1,'login','text',30,'1','1','1','1')", $db_link);
			mysql_query("INSERT INTO user_fields VALUES (2,'password','password',16,'1','1','1','')", $db_link);
			mysql_query("INSERT INTO user_fields VALUES (3,'email','text',50,'','1','','')", $db_link);
			mysql_query("INSERT INTO user_fields VALUES (4,'karma','int','','','','','')", $db_link);
			mysql_query("INSERT INTO user_fields VALUES (5,'FullName','text',100,'','1','1','')", $db_link);


			mysql_query("CREATE TABLE users (
			id bigint(20) unsigned NOT NULL auto_increment,
  			session_id char(32) default NULL,
  			PRIMARY KEY (id),
  			UNIQUE KEY id_2(id),
  			KEY id(id),
			login varchar(30),
                        password varchar(16),
                        email varchar(50),
                        karma int(11) NOT NULL default 0,
			FullName varchar(100) default NULL)", $db_link);

			if($defs<2)
			{
	                        mysql_query("INSERT INTO users VALUES (1,'','test','test','test@nowherefast.com',0,'Default test user account')", $db_link);
			}


			echo "ARTICLEforum ";
                        mysql_query("CREATE TABLE ARTICLEforum (
                        serial int(11) unsigned NOT NULL auto_increment,
                        name char(20) NOT NULL default 'untitled',
                        max_points int(11),
			min_points int(11),
			max_class int(11),
			min_class int(11),
			expiration_time bigint(20) NOT NULL,
			disappear int(11) NOT NULL,
			archive int(11) NOT NULL,
			points_post int(11) NOT NULL,
			points_post_un int(11) NOT NULL)", $db_link);


			echo "CACHE ";	
			mysql_query("CREATE TABLE CACHE
			(serial 	bigint unsigned primary key not null auto_increment,
			expire_on 	datetime, 
			cachetype	int unsigned,
			id		bigint unsigned,
			content		text,
			layout		bigint unsigned,
			box		bigint unsigned)", $db_link);		

			mysql_query("CREATE INDEX idx1 ON CACHE (id)", $db_link);
			mysql_query("CREATE INDEX idx2 ON CACHE (cachetype)", $db_link);
			mysql_query("CREATE INDEX idx3 ON CACHE (layout)", $db_link);
			mysql_query("CREATE INDEX idx4 ON CACHE (box)", $db_link);

			echo "ARTICLEbase ";
			mysql_query("CREATE TABLE ARTICLEbase
			(serial 	bigint unsigned primary key not null auto_increment,
			title 		varchar(255), 
			div		varchar(255),
			font		varchar(255),
			boxsetup	int,				 
			boxtype		int,
			class		int,
			debate		int,
			submission_on 	datetime, 
			submited_by 	varchar(80), 
			approval_on 	datetime, 
			approved_by 	varchar(80),
			aprovado	int not null, 
			lastchanged	datetime,
			restricted	text,
			forum		int,
			html	        int not null,
			unsearchable	int not null)", $db_link);		

                        mysql_query("INSERT INTO ARTICLEbase VALUES (1,'You made it!!!',NULL,NULL,1,1,0,1,'2001-11-01 18:48:35','admin','2002-03-20 21:56:33','admin',1,'2001-11-01 18:48:35','',0,0,0)",  $db_link);
			if($defs<2)
			{
	                        mysql_query("INSERT INTO ARTICLEbase VALUES (2,'This article is not approved...',NULL,NULL,1,1,0,1,'2002-03-20 16:43:11','admin','2002-03-20 22:13:05','admin',0,'2002-03-20 16:43:11','',0,0,0)",  $db_link);
	                        mysql_query("INSERT INTO ARTICLEbase VALUES (3,'Your registration was recorded',NULL,NULL,1,1,0,1,'2002-03-20 19:58:45','admin','2002-03-20 19:58:58','admin',1,'2002-03-20 19:58:45','',0,0,0)",  $db_link);
	                        mysql_query("INSERT INTO ARTICLEbase VALUES (4,'Modifications to your user file have been recorded',NULL,NULL,1,1,0,1,'2002-03-20 20:01:53','admin','2002-03-20 20:01:53','admin',1,'2002-03-20 20:01:53','',0,0,0)",  $db_link);
	                        mysql_query("INSERT INTO ARTICLEbase VALUES (5,'What do I do now?',NULL,NULL,1,1,0,1,'2002-03-20 21:07:22','admin','2002-03-21 17:36:12','admin',1,'2002-03-20 21:07:22','',0,0,0)",  $db_link);
	                        mysql_query("INSERT INTO ARTICLEbase VALUES (6,'This is a private article for user \"test\"!',NULL,NULL,1,1,0,1,'2002-03-20 22:06:48','admin','2002-03-21 18:17:49','admin',1,'2002-03-20 22:06:48','test\r\n',0,0,0)",  $db_link);
				mysql_query("INSERT INTO ARTICLEbase VALUES (7,'Lost password?',NULL,NULL,1,-1,0,1,'2002-04-23 20:28:48','admin','2002-04-23 20:37:49','admin',1,'2002-04-23 20:28:48','',0,1,1)",  $db_link);
				mysql_query("INSERT INTO ARTICLEbase VALUES (8,'Password has been sent to you',NULL,NULL,1,-1,0,1,'2002-04-23 20:30:21','admin','2002-04-23 20:30:37','admin',1,'2002-04-23 20:30:21','',0,0,1)",  $db_link);
				mysql_query("INSERT INTO ARTICLEbase VALUES (9,'No e-mail was found...',NULL,NULL,1,-1,0,0,'2002-04-23 20:33:49','admin','2002-04-23 20:38:30','admin',1,'2002-04-23 20:33:49','',0,1,1)",  $db_link);
			}

			echo "ARTICLEcontent ";
			mysql_query("CREATE TABLE ARTICLEcontent
			(serial 	bigint unsigned primary key not null auto_increment,
			artigo		bigint,
			stuff 		text,
			div		varchar(255),
			font		varchar(255),				 
			type	 	int unsigned not null)", $db_link);

                        mysql_query("INSERT INTO ARTICLEcontent VALUES (1,1,'Welcome to Siteseed!\r\n\r\nThank you for installing the software on your machine. During the instalation proccess default layouts for articles were created, as well as a sample interface setup. You will find lots of tricks in the default setup (sample forum configuration, search engine, as well user login and registration forms). Most important you can get a close look on how sites are created under Siteseed, what objects are objects (in both dinamic and static formats) are used, how they are called from the Interface program and how to make use of objects to isolate pieces of code (both PHP and HTML).<br>\r\n',NULL,NULL,1)", $db_link);
                        mysql_query("INSERT INTO ARTICLEcontent VALUES (2,1,'Siteseed is not meant to be a easy tool to setup. It is meant to be powerfull. Take your time to read the <a href=http://www.siteseed.org/manual target=_blank>manual</a>, search for <a href=http://www.siteseed.org/ssfaq target=_blank>FAQ´s</a> and more help in <a href=http://www.siteseed.org target=_blank>the Siteseed project homepage</a>.\r\n\r\nThere is a support mailling list that you should probably join. Also you can create a login in the <a href=http://www.siteseed.org/ssfaq target=_blank>FAQ´s</a> site and participate in the Forums if you find the web interface more convienient. Those are only place where some support is given by other users and the program authors. \r\n\r\n<li> <a href=http://www.siteseed.org/ssfaq target=_blank>FAQ´s site</a> (just follow the link, create an account and have fun)\r\n\r\n<li>The mailling list is called <i>siteseed@mrnet.pt</i>. You can join in by sending a message to <i>majordomo@mrnet.pt</i> with the following text on the first line of the message body: <i>subscribe siteseed@mrnet.pt your_email@here</i>.\r\n\r\nBest wishes,\r\n<i>The hackers that made this project possible</i>\r\n',NULL,NULL,2)", $db_link);
			if($defs<2)
			{
	                        mysql_query("INSERT INTO ARTICLEcontent VALUES (3,2,'As such it does not appear to users, on the search engine, etc.\r\n',NULL,NULL,1)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (4,2,'\r\n',NULL,NULL,2)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (5,3,'',NULL,NULL,1)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (6,3,'Please note that if you are on a local server without mail services (or your PHP is not configured to use a mail agent to deliver the mail) you will not receive the e-mail with your modified password. You can allways look in your backoffice \"users\" option (editor menu) to check/modify the password. \r\n\r\nThis system assures that all users have a valid e-mail that they can actually read.\r\n',NULL,NULL,2)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (7,4,'',NULL,NULL,1)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (8,4,'Please note that you cannot change the \"Login\" and \"e-mail\" fields. This information was verified when you first created the account on the system. Other fields (like \"Full Name\" and \"Password\") may be altered.\r\n',NULL,NULL,2)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (9,5,'',NULL,NULL,1)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (10,5,'<b>Does this login and search box work on the default setup?</b>\r\n\r\nYes they do. Login with user \"test\" and password \"test\" and check what happens. \r\n\r\nAfterwards search for a single letter in the search box (\'a\' will do fine).\r\n\r\nBoth the search engine facilities and the login management are quite easy to setup in Siteseed.\r\n\r\n\r\n<b>Can you get to your backoffice?</b>\r\n\r\nFirst of all check your backoffice (at http://your_server/this_site/bo). If you are prompted for a password (assuming you did setup one during the install procedure) all is going well. Otherwise you will receive a message stating that your webserver is ignoring the .htaccess file.\r\n\r\nThe .htaccess file is the <a href=http://www.apache.org target=_blank>apache</a> web server way of protecting directories. You must ensure that your web server protects the backoffice, otherwise anyone would be able to control Siteseed, and bad things would eventually happen. Read the web server documentation carefully about \"access controls\" and \"basicauth\". The same applies to any web server you may be using. Siteseed relies on the web server for the backoffice security.\r\n\r\n\r\n<b>I can see the backoffice. What should I do to explore Siteseed?</b>\r\n\r\nSiteseed is a complex system. As everything else it becomes simpler to use once you get to know it well. Let\'s start with a quick tour over the main components:\r\n\r\n<li> Get to the \"Technical Staff\" menu and click on \"Interface -> Edit\". Pick the default interface. Here goes all the Interface macro structure. The main table that splits most of the screen area is visible, along with a very small part of the HTML that forms the page. Also there a a lot of calls to \"object/show.php\". These calls remove complex objects from the interface, making it somewhat simpler to understand and change the Interface code.\r\n\r\n<li> Click on \"Menu\" (top bar of the backoffice) and go to the \"Publishers\" menu. Select \"Objects -> Edit\" to get a list of objects. Notice that some of them correspond to the ones included on the Interface model. Enter some of the objects, press \"View HTML\" to check their code. Most objects have just HTML. These are static objects. The \"Interface - search box\" object is a dinamic object (and as such has PHP code also). Now go back to the Interface model and check for the different call that is made when refering to a dynamic object (with \$evalme=1).\r\n\r\nObjects and Interface models makeup the core Siteseed programming structures. Objects can be called from various Interfaces (there are no limits to the number of simultaneous Interfaces and Objects you can have on your website) and help isolate HTML/PHP code segments. This two structures are the only ones in Siteseed were PHP is evaluated. All others are HTML and MACRO based.\r\n\r\n<li> To find a bit about macros check out the \"Technical Staff\" option \"Visual Components -> Layout\". Look at the macro table (right side column) and the Layout programs available. These macros \'\$macro_name\$\' are used to define how your article related structured are rendered on screen. HTML is used to format the output. \r\n\r\n<li> Layouts are rendered (optionally) on top of \"boxes\" (which you will find on \"Technical Staff\" -> \"Technical Staff\" -> \"Boxes\". However they can be used alone (i.e. you could draw the boxes mixed with the macros on a Layout). You will find the \"boxed\" and \"layout\" used to render this article with ease on each list.\r\n\r\nBoxes and Layouts are the core elements of the rendering engine. You can have as many of both as you like, there are no limits in Siteseed for any of them.\r\n\r\nThese are the four most important Siteseed structures. Understanding them well and how they can be mixed provides the tools for building most sites. Other structures are used to define what components make up an article, subjects under which articles can be classified and grouped, user maintenance, forms and surveys. Hit the manual, play around and have fun with Siteseed. \r\n\r\n   \r\n',NULL,NULL,2)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (11,6,'If you are not user \"test\" you can only read the title and this synopsys (in the search engine!)<br>\r\n',NULL,NULL,1)", $db_link);
                                mysql_query("INSERT INTO ARTICLEcontent VALUES (12,6,'As a reward for using the login procedures you get to read the article!\r\n\r\nSiteseed allows you to have articles that can only be read by a certain user (or a group of users). In this case this article is for user \"test\" only.\r\n\r\nThis restriction may be used to contact with some members of your user base, leave them messages on the front page of the site, etc.\r\n',NULL,NULL,2)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (13,7,'',NULL,NULL,1)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (14,7,'<center><br>To recover your login & password you need to supply your e-mail address.<br><br>\r\n\r\n<FORM action=email_password.php METHOD=POST>\r\n<input type=\"text\" name=\"email\" value=\"\">\r\n<input type=\"hidden\" name=\"success\" value=\"8\">\r\n<input type=\"hidden\" name=\"failure\" value=\"9\">\r\n<input type=\"hidden\" name=\"visual\" value=\"1\">\r\n<input type=\"submit\" name=\"Ok\" value=\"Ok\">\r\n</FORM></center>\r\n',NULL,NULL,2)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (15,8,'',NULL,NULL,1)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (16,8,'<center>Your e-mail has been found and was sent to you.</center>\r\n',NULL,NULL,2)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (17,9,'',NULL,NULL,1)", $db_link);
				mysql_query("INSERT INTO ARTICLEcontent VALUES (18,9,'<center>That e-mail was not found in our user database.<br><br>To recover your login & password you need to supply your e-mail address. Please try again (do you have more than one e-mail?)...<br><br>\r\n\r\n<FORM action=email_password.php METHOD=POST>\r\n<input type=\"text\" name=\"email\" value=\"\">\r\n<input type=\"hidden\" name=\"success\" value=\"8\">\r\n<input type=\"hidden\" name=\"failure\" value=\"9\">\r\n<input type=\"hidden\" name=\"visual\" value=\"1\">\r\n<input type=\"submit\" name=\"Ok\" value=\"Ok\">\r\n</FORM><br><br>\r\n\r\n... or use the form bellow to contact the webmaster. Maybe I can help you.<br><br></center>\r\n',NULL,NULL,2)", $db_link);
			}

			mysql_query("CREATE INDEX idx1 ON ARTICLEcontent (artigo)", $db_link);


			echo "ARTICLEtypetxt ";
			mysql_query("CREATE TABLE ARTICLEtypetxt
			(serial 	bigint unsigned primary key not null auto_increment, 
			indexable	int not null,
			legenda	 	varchar(50) not null,
			ordem		int,
			xsize		int,
			ysize		int,
			dsize		int)", $db_link);		

			mysql_query("INSERT INTO ARTICLEtypetxt VALUES (1,1,'Synopsis',0,0,0,0)", $db_link);
			mysql_query("INSERT INTO ARTICLEtypetxt VALUES (2,0,'Text',0,0,0,0)", $db_link);


			echo "ARTICLEtopic ";
			mysql_query("CREATE TABLE ARTICLEtopic
			(serial 	bigint unsigned primary key not null auto_increment, 
			article		bigint unsigned,
			topic	 	int)", $db_link);		

                        mysql_query("INSERT INTO ARTICLEtopic VALUES (1,1,1)", $db_link);
                        if($defs<2)
                        {
	                        mysql_query("INSERT INTO ARTICLEtopic VALUES (2,5,1)", $db_link);
        	                mysql_query("INSERT INTO ARTICLEtopic VALUES (3,6,1)", $db_link);
			}

			mysql_query("CREATE INDEX idx1 ON ARTICLEtopic (article)", $db_link);
			mysql_query("CREATE INDEX idx2 ON ARTICLEtopic (topic)", $db_link);


			echo "ARTICLEtopictxt ";
			mysql_query("CREATE TABLE ARTICLEtopictxt
			(serial 	bigint unsigned primary key not null auto_increment, 
			legenda	 	varchar(50) not null)", $db_link);

                        mysql_query("INSERT INTO ARTICLEtopictxt VALUES (1,'Installation')", $db_link);

			echo "ARTICLEkeywords ";
			mysql_query("CREATE TABLE ARTICLEkeywords
			(serial 	bigint unsigned primary key not null auto_increment,
			article		bigint unsigned not null, 
			palavra	 	varchar(50) not null)", $db_link);

                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (1,1,'Siteseed! Thank you for installing the')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (2,1,'to Siteseed! Thank you for installing')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (3,1,'Welcome to Siteseed! Thank you for installing')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (4,1,'it!!! Welcome to Siteseed! Thank you')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (5,1,'You made it!!! Welcome to Siteseed!')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (6,1,'made it!!! Welcome to Siteseed! Thank')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (7,1,'of code (both PHP and HTML)')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (8,1,'code (both PHP and HTML)')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (9,1,'(both PHP and HTML)')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (10,1,'PHP and HTML)')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (11,1,'and HTML)')", $db_link);
                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (12,1,'HTML)')", $db_link);
			if($defs<2)
			{
	                        mysql_query("INSERT INTO ARTICLEkeywords VALUES (13,5,'now?')", $db_link);
                                mysql_query("INSERT INTO ARTICLEkeywords VALUES (14,5,'do now?')", $db_link);
                                mysql_query("INSERT INTO ARTICLEkeywords VALUES (15,5,'I do now?')", $db_link);
                                mysql_query("INSERT INTO ARTICLEkeywords VALUES (16,5,'do I do now?')", $db_link);
                                mysql_query("INSERT INTO ARTICLEkeywords VALUES (17,5,'What do I do now?')", $db_link);
			}

			mysql_query("CREATE INDEX idx1 ON ARTICLEkeywords (palavra)", $db_link);


			echo "ARTICLEboxsetup ";
			mysql_query("CREATE TABLE ARTICLEboxsetup
			(serial 	bigint unsigned primary key not null auto_increment, 
			legenda	varchar(50) not null,
			title_area	text,
			header_area	text,
			content_area	text,
			footer_area	text)", $db_link);

                        mysql_query("INSERT INTO ARTICLEboxsetup VALUES (1,'A default layout for articles','','<center><b>$0$</b></center>','$1$<br>\r\n$2$','')", $db_link);
                        mysql_query("INSERT INTO ARTICLEboxsetup VALUES (2,'default comment layout','','<big><b>-titulo-</b><br></big><small>Por -identificacao- (-data-)</small><br><br>','-texto-','')", $db_link);
                        mysql_query("INSERT INTO ARTICLEboxsetup VALUES (3,'SEARCH results','','<b>$0$</b><br>\r\n<small>\$dc\$</small>','$1$<br><br>\r\n<div align=right><a href=index.php?article=\$id$&visual=1><small>Read</small></a></div>','')", $db_link);


			echo "ARTICLEpubcomforms ";
			mysql_query("CREATE TABLE ARTICLEpubcomforms
			(serial 	bigint unsigned primary key not null auto_increment,
			boxtype		int,
			header		text,
			form		text,
			footer		text,
			title		varchar(50),
			type		varchar(50))", $db_link);

                        mysql_query("INSERT INTO ARTICLEpubcomforms VALUES (1,NULL,NULL,'Name <input type=text name=Name size=20><br><br>\r\nEmail <input type=text name=Email size=20><br><br>\r\nSubject<br><TEXTAREA NAME=content TYPE=\"textarea\" ROWS=10 COLS=50 WRAP=PHYSICAL></TEXTAREA></font><br><br>\r\n<input name=receiver_email type=hidden value=\"youremail@mail.pt\">\r\n<input name=subject type=hidden value=\"any subject\">\r\n<input type=submit name=Send value=Send>\r\n',NULL,'email','email')", $db_link);
                        mysql_query("INSERT INTO ARTICLEpubcomforms VALUES (2,NULL,NULL,'Full name:<div align=right><input type=text name=\"$5$\" maxlenght=99 size=30 value=\"$5$\"><br>\r\nlogin:<input type=text name=\"$1$\" maxlenght=10 size=10 value=\"$1$\"><br>password:<input type=password name=\"$2$\" maxlenght=10 size=10 value=\"$2$\"><br>pass confirmation:<input type=password name=password_confirmation maxlenght=10 size=10><br>email:<input type=text name=\"$3$\" maxlenght=50 size=20 value=\"$3$\"><br><input type=hidden name=success_reg value=3><input type=hidden name=success_change value=4><input type=submit name=submit value=submit>\r\n</div>',NULL,'register','register_users')", $db_link);
                        mysql_query("INSERT INTO ARTICLEpubcomforms VALUES (3,0,'0','<br>login:<br><input type=text name=$1$ maxlenght=10 size=10><br>password:<br><input type=password name=$2$ maxlenght=10 size=10><input type=hidden name=success_log value=6><input type=hidden name=visual value=1><br><input type=submit name=submit value=submit>','','login','login_users')", $db_link);
                        mysql_query("INSERT INTO ARTICLEpubcomforms VALUES (4,0,'1','<table width=100% border=0><tr>\r\n<td width=40%>\r\nName:<br>\r\n<INPUT NAME=\"pubcom_nome\" TYPE=\"text\" VALUE=\"\" MAXLENGTH=80 SIZE=35>\r\n</td>\r\n<td width=60%>\r\nE-mail:<br>\r\n<INPUT NAME=\"pubcom_email\" TYPE=\"text\" VALUE=\"\" MAXLENGTH=80 SIZE=38>\r\n</td></tr></table>\r\n<table width=100%><tr>\r\n<td width=100%>\r\nComment:<br>\r\n<TEXTAREA NAME=\"pubcom_texto\" TYPE=\"textarea\" ROWS=10 COLS=75 WRAP=PHYSICAL></TEXTAREA>\r\n</td></tr></table>\r\n<br><INPUT NAME=\"Enviar\" TYPE=\"submit\" VALUE=\"Send\">\r\n\r\n','','comments','comments')", $db_link);


			echo "ARTICLEpubcom ";
			mysql_query("CREATE TABLE ARTICLEpubcom
			(serial 	bigint unsigned primary key not null auto_increment,
			article		bigint not null, 
			parent		bigint not null,
			total_posts	bigint not null,
			aprovado	int not null, 
			submission_on 	datetime, 
			approval_on 	datetime, 
			approved_by 	varchar(80),
			nome		varchar(80),
			email		varchar(80),
			class		int,
			title 		varchar(255), 
			texto		text)", $db_link);

			mysql_query("CREATE INDEX idx1 ON ARTICLEpubcom (article)", $db_link);


			echo "NOTES ";
			mysql_query("CREATE TABLE notes
			(id 	bigint(20) unsigned primary key not null auto_increment,
			date 		datetime, 
			author	int(11),
			recipient_type	char(1),
			recipient_id	bigint(20),				 
			received	tinyint(4) DEFAULT '0',
			subject	varchar(80) not null, 
			main_text text not null)", $db_link);		


		        echo "ARTICLEforum ";
			mysql_query("CREATE TABLE ARTICLEforum (serial bigint unsigned primary key  not null auto_increment,
			name char(20) NOT NULL default 'untitled',
			max_points int(11),min_points int(11),
			max_class int(11),min_class int(11),
			expiration_time bigint(20) NOT NULL,
			disappear int(11) NOT NULL,
			archive int(11) NOT NULL,
			points_post int(11) NOT NULL,
			points_post_un int(11) NOT NULL)", $db_link);


			echo "HISTORY ";
                        mysql_query("CREATE TABLE history (
                        serial int(11) unsigned NOT NULL auto_increment,
                        comment bigint(20) NOT NULL,
                        user int(11) NOT NULL)", $db_link);


			echo "BOXbase ";
			mysql_query("CREATE TABLE BOXbase
			(id 		bigint unsigned primary key not null auto_increment,
			title 		varchar(50), 
			color_border 	varchar(8),
			color_header 	varchar(8),
			color_content 	varchar(8),
			color_footer 	varchar(8),
			size_border 	int,
			dist_border 	int,
			image_top_left	varchar(80), 
			image_top_right	varchar(80), 
			image_top_row	varchar(80), 
			image_bot_left	varchar(80), 
			image_bot_right	varchar(80), 
			image_bot_row	varchar(80), 
			image_right	varchar(80), 
			image_left	varchar(80))", $db_link);		

			mysql_query("INSERT INTO BOXbase VALUES (1,'Articles','#000000','#DDDDDD','#FFFFFF','#EEEEEE',0,5,'','','','','','','','')", $db_link);


			echo "HEADLINESbase ";
			mysql_query("CREATE TABLE HEADLINEbase
			(id 		bigint unsigned primary key not null auto_increment,
			title 		varchar(50),
			content		text)", $db_link);

                        mysql_query("INSERT INTO HEADLINEbase VALUES (1,'Editorial - Entry page content','<center>\r\nINSERT article size=100% columns=1 box=1 layout=1 artigo=1\r\nINSERT last howmany=10 exclude=1 skip=0 columns=1 size=100% box=1 layout=1 subjects=1\r\n</center>')", $db_link);
                        if($defs<2)
                        {
	                        mysql_query("INSERT INTO HEADLINEbase VALUES (2,'Interface - Search engine box','<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=#B7C56C width=200>\r\n <tr><td>\r\n  <table border=0 cellpadding=5 cellspacing=1 width=100%><tr>\r\n   <td bgcolor=#B7C56C>\r\n    <center><b>Search</b></center>\r\n   </td></tr>\r\n   <tr><td bgcolor=#DFE5BD align=center><br>\r\n    <FORM METHOD=\"POST\" action=index.php ENCTYPE=\"application/x-www-form-urlencoded\">\r\n     <select name=\"searchtopic\">\r\n      <option value=\"\" <? if(\$searchtopic<1) { print \"SELECTED\"; } ?>>All topics</option>\r\n<?\r\n      \$local_result=mysql_query(\"select serial,legenda from ARTICLEtopictxt where serial>0 ORDER BY legenda ASC\"); \r\n      while(\$localrow=\@mysql_fetch_object(\$local_result))\r\n      { \r\n          \$myIdTopic= \$localrow->serial; \r\n          \$myNameTopic= \$localrow->legenda; \r\n	  \r\n          print \"<option value=\\\\\"\$myIdTopic\\\\\"\";\r\n          if(\$searchtopic==\$myIdTopic) { print \" SELECTED\"; } \r\n          print \">\$myNameTopic</option>\\n\";\r\n      }\r\n?>\r\n     </select><br>\r\n     <input type=\"text\" name=\"search\" value=\"<? if(strlen(\$search)>0) { print \"\$search\"; }?>\" SIZE=15 MAXLEN=15>	\r\n     <input type=\"hidden\" name=\"id\" value=\"1\">\r\n     <INPUT type=submit value=\"Go\">\r\n    </FORM>\r\n   </td></tr>\r\n  </table>\r\n </td></tr>\r\n</table>')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (3,'Login handler - registration','INSERT form id=2\r\n')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (4,'Login handler - Login box','<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=#B7C56C width=200>\r\n <tr><td>\r\n  <table border=0 cellpadding=5 cellspacing=1 width=100%><tr>\r\n   <td bgcolor=#B7C56C>\r\n    <center><b>Login to site</b></center>\r\n   </td></tr>\r\n   <tr><td bgcolor=#DFE5BD><center><br>\r\nNot a member?<br>\r\nCreate your account <a href=index.php?headline=3&visual=1>now</a>!\r\n<br>  \r\nINSERT form id=3\r\n<small><a href=index.php?article=7&visual=1>[Lost your password?]</small></a><br><br>\r\n </center></td></tr>\r\n  </table>\r\n </td></tr>\r\n</table>\r\n')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (5,'Interface - Top menu bar','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"98\" bgcolor=\"#FFFFFF\">\r\n <tr>\r\n  <td width=\"1%\" valign=top>\r\n   <img src=images/default/siteseed.gif>\r\n  </td>\r\n  <td width=\"99%\">\r\n   <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"98\">\r\n    <tr>\r\n     <td height=\"1%\" valign=\"top\" align=\"left\">\r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n       <tr>\r\n        <td background=\"images/default/top_back.gif\" align=\"left\" valign=\"top\"> \r\n          <a href=http://www.siteseed.org/ target=_blank><img src=images/default/site.gif border=\"0\"></a>\r\n          <a href=http://www.siteseed.org/manual target=_blank><img src=images/default/manual.gif border=\"0\"></a>\r\n          <a href=http://www.siteseed.org/ssfaq target=_blank><img src=images/default/faq.gif border=\"0\"></a>\r\n          <a href=http://www.siteseed.org/id1.html target=_blank><img src=images/default/errata.gif border=\"0\"></a>\r\n         </td>\r\n        </tr>\r\n       </table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n     <td valign=\"top\" align=\"left\">\r\n      <img src=images/default/copyright.gif border=\"0\">\r\n     </td>\r\n    </tr>\r\n   </table>\r\n  </td>\r\n </tr>\r\n</table>\r\n')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (6,'Interface - HTML HEADER (title & meta)','<title>Siteseed default page</title>\r\n<meta name=\"POWEREDBY\" content=\"Siteseed - see www.siteseed.org\">\r\n<meta name=\"DESCRIPTION\" content=\"Siteseed default page\">\r\n<meta name=\"KEYWORDS\" content=\"Siteseed, CMS, WYSIWYG\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (7,'Interface - get the page context','<?\r\nif( \$article>0 ) \r\n{ \r\n     // get this article topic \r\n     \$local_result=mysql_query(\"select topic from ARTICLEtopic where article=\$article LIMIT 0,1\"); \r\n     if(\$localrow=\@mysql_fetch_object(\$local_result))\r\n     { \r\n          \$mytopic= \$localrow->topic; \r\n\r\n          // want to get the \"subject\" name also? \r\n          \$another_result=mysql_query(\"select legenda from ARTICLEtopictxt where serial=\$mytopic LIMIT 0,1\");\r\n\r\n          if(\$localrow=\@mysql_fetch_object(\$another_result))\r\n          { \r\n             \$topicname=\$localrow->legenda; \r\n          } \r\n     }\r\n\r\n     // The user is viewing an article classified as...\r\n     \$mycontext=\"User is reading a article \";\r\n     if(strlen(\$topicname)>0)  { \$mycontext.= \"related to \\\\\"\$topicname\\\\\" \"; } \r\n     if(\$mytopic>0)  { \$mycontext.= \"(\$mytopic)\"; } \r\n}\r\nelseif(\$myheadline>0)\r\n{\r\n      \$mycontext=\"User main content area is using object \$myheadline\";\r\n}\r\nelseif(\$vote==1)\r\n{\r\n      \$mycontext=\"User is voting on a survey\";\r\n}\r\nelseif(\$vote==2)\r\n{\r\n      \$mycontext=\"User is viewing survey results\";\r\n}\r\nelseif(strlen(\$search)>0)\r\n{\r\n     \$mycontext=\"User is searching for \\\\\"\$search\\\\\" \";\r\n\r\n     if(\$searchtopic>0)\r\n     {\r\n          // want to get the \"subject\" name also? \r\n          \$another_result=mysql_query(\"select legenda from ARTICLEtopictxt where serial=\$searchtopic LIMIT 0,1\");\r\n\r\n          if(\$localrow=\@mysql_fetch_object(\$another_result))\r\n          { \r\n               \$topicname=\$localrow->legenda; \r\n               \$mycontext.=\"on articles related to \\\\\"\$topicname\\\\\"\";\r\n          }\r\n     } \r\n}\r\nelse\r\n{\r\n      \$mycontext=\"User is on the homepage\";\r\n} \r\n?> \r\n<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=#B7C56C width=200>\r\n <tr><td>\r\n  <table border=0 cellpadding=5 cellspacing=1 width=100%><tr>\r\n   <td bgcolor=#B7C56C>\r\n    <center><b>Interfaces & user actions?</b></center>\r\n   </td></tr>\r\n   <tr><td bgcolor=#DFE5BD align=center><br>\r\nOne question that keeps being asked on the mailing list \r\nis how to change certain aspects of the site depending \r\non what the user is doing. This can range from printing \r\n\"navigation bars\" to have \"menus with the current section\r\nhighlighted\". This box contains a small demo on \r\nprocedures that allow the webmaster to get information on\r\nwhat the user is doing...<br><br>\r\n\r\n<? print \"<b>\$mycontext</b><br><br>\"; ?>\r\n\r\n\r\n   </td></tr>\r\n  </table>\r\n </td></tr>\r\n</table>')", $db_link);
                                mysql_query("INSERT INTO HEADLINEbase VALUES (8,'Interface - latest survey','<?\r\n     require \"include/surveys.php\";\r\n\r\n    # lets find out the latest survey created...\r\n     \$local_result=mysql_query(\"select id from surveys where id>0 ORDER BY id DESC LIMIT 0,1\"); \r\n     if(\$localrow=\@mysql_fetch_object(\$local_result))\r\n     { \r\n          \$mysurvey= \$localrow->id; \r\n?>\r\n<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=#B7C56C width=200>\r\n <tr><td>\r\n  <table border=0 cellpadding=5 cellspacing=1 width=100%><tr>\r\n   <td bgcolor=#B7C56C>\r\n    <center><b>Latest survey</b></center>\r\n   </td></tr>\r\n   <tr><td bgcolor=#DFE5BD align=left><br>\r\n<?\r\n          if(\$vote>0)\r\n         {\r\n                print survey_results (\$mysurvey, \" - \" , \" votes\"); \r\n                print \"<br>\";\r\n         }\r\n         else\r\n         {\r\n	 print survey (\$mysurvey, \"index.php?vote=1\", \"Vote!\", \"<br><small>[View results]</small>\", \"index.php?vote=2\");\r\n         print\"<br>\"; \r\n         }\r\n?>\r\n   </td></tr>\r\n  </table>\r\n </td></tr>\r\n</table>\r\n<?\r\n     }\r\n?>')", $db_link);
			}

			echo "STAFFbase ";
			mysql_query("CREATE TABLE STAFFbase
			(id 		bigint unsigned primary key not null auto_increment,
			login 		varchar(10),
			name		varchar(50),
			email		varchar(80),
			status		int,
			area		bigint)", $db_link);		

			mysql_query("INSERT INTO STAFFbase VALUES (1,'admin','webmaster supreme',NULL,3,NULL)", $db_link);


			echo "STAFFdetails ";
			mysql_query("CREATE TABLE STAFFdetails
			(id 		bigint unsigned primary key not null auto_increment,
			login 		varchar(10),
			inibe		bigint,
			area		bigint)", $db_link);
		}		
	}
}













# ------------------------------------------------------------------------------------------------
#                           Upgrades to tables on existing instalations
# ------------------------------------------------------------------------------------------------


if( !@mysql_list_fields($projecto, "css", $db_link) )
{
        echo "Updating <b>CSS</b> table to v1.4.6+ structures...<br>";


                        mysql_query("CREATE TABLE css (
                        id int(11) NOT NULL auto_increment,
                        name varchar(255) NOT NULL default '',
                        file varchar(255) NOT NULL default '',
                        instance varchar(255) NOT NULL default '',
			weight  varchar(255) NOT NULL default '',
                        size  int(11) NOT NULL default '0',
                        size_units  varchar(255) NOT NULL default '',
                        text_trans  varchar(255) NOT NULL default '',
                        color  varchar(255) NOT NULL default '',
                        style  varchar(255) NOT NULL default '',
                        family  varchar(255) NOT NULL default '',
                        background  varchar(255) NOT NULL default '',
                        decoration  varchar(255) NOT NULL default '',
                        height  int(11) NOT NULL default '0',
                        height_units  varchar(255) NOT NULL default '',
			text varchar(255) NOT NULL default '',
                        PRIMARY KEY (id),
                        UNIQUE KEY id(id),
                        KEY id_2(id))", $db_link);

}

if( !@mysql_list_fields($projecto, "css_files", $db_link) )
{


	echo "Updating <b>CSS_files</b> table to v1.4.6+ structures...<br>";
                        mysql_query("CREATE TABLE css_files (
                        id int(11) NOT NULL auto_increment,
                        name varchar(255) NOT NULL default '',
                        PRIMARY KEY (id),
                        UNIQUE KEY id(id),
                        KEY id_2(id))", $db_link);


}

if( $table_info=@mysql_list_fields($projecto, "CACHE", $db_link) )
{
	$columns = mysql_num_fields($table_info);
	
	if($columns==5)
	{
		echo "Updating <b>CACHE</b> table to v1.4+ structures...<br>";
		
		mysql_query("ALTER TABLE CACHE add column 
		(layout		bigint unsigned,
		box		bigint unsigned)", $db_link);		
	}
}


if( $table_info=@mysql_list_fields($projecto, "ARTICLEbase", $db_link) )
{
	$columns = mysql_num_fields($table_info);
	
	for ($i = 0; $i < $columns; $i++)
	{
		if( mysql_field_name($table_info, $i)=='debate_class' )
		{
			echo "Updating <b>ARTICLEbase</b> table to v1.4+ structures...<br>";
			mysql_query("ALTER TABLE ARTICLEbase drop column debate_class", $db_link);
		}
		
		if( mysql_field_name($table_info, $i)=='restricted' )
		{
			$restricted_ok=1;
		}
		
		if( mysql_field_name($table_info, $i)=='forum' )
                {
                        $forum_ok=1;
                }

		if( mysql_field_name($table_info, $i)=='html' )
                {
                        $html_ok=1;
                }
		
		if( mysql_field_name($table_info, $i)=='unsearchable' )
                {
                        $unsearchable_ok=1;
                }

	}
	
	if(!$restricted_ok)
	{
		echo "Updating <b>ARTICLEbase</b> table to v1.4+ structures...<br>";
		mysql_query("ALTER TABLE ARTICLEbase add column restricted text", $db_link);
	}	

	
	if(!$forum_ok)
        {
		echo "Updating <b>ARTICLEbase</b> table to v1.4+ structures...<br>";
                mysql_query("ALTER TABLE ARTICLEbase add column forum int(11)", $db_link);
        }

	if(!$html_ok)
        {
		echo "Updating <b>ARTICLEbase</b> table to v1.4+ structures...<br>";
                mysql_query("ALTER TABLE ARTICLEbase add column html int(11) not null", $db_link);
        }

	if(!$unsearchable_ok)
        {
                echo "Updating <b>ARTICLEbase</b> table to v1.4.5+ structures...<br>";
                mysql_query("ALTER TABLE ARTICLEbase add column unsearchable int(11) not null", $db_link);
        }

}


if( $table_info=@mysql_list_fields($projecto, "ARTICLEtypetxt", $db_link) )
{
	$columns = mysql_num_fields($table_info);
	
	if($columns==3)
	{
		echo "Updating <b>ARTICLEtypetxt</b> table to 1.4+ structures...";
		
		mysql_query("ALTER TABLE ARTICLEtypetxt add column 
		(ordem		int,
		xsize		int,
		ysize		int,
		dsize		int)", $db_link);		
	}
}


if( $table_info=@mysql_list_fields($projecto, "ARTICLEboxsetup", $db_link)  )
{
	$def_layout=mysql_query("SELECT * from ARTICLEpubcomforms where serial=4 AND title is NULL",$db_link);
	if($row=mysql_fetch_object($def_layout))
	{
		echo "Updating <b>ARTICLEboxsetup</b> table to v1.4+ structures...<br>";
		
		$header=$row->header;
		$form=$row->form;
		$footer=$row->footer;
		mysql_query("INSERT into ARTICLEboxsetup SET legenda='default comment layout', title_area='',header_area='$header', content_area='$form', footer_area='$footer'", $db_link);
		mysql_query("DELETE from ARTICLEpubcomforms where serial=4", $db_link);
	}	
}


if( $table_info=@mysql_list_fields($projecto, "ARTICLEpubcomforms", $db_link) )
{
	$columns = mysql_num_fields($table_info);
	
	if($columns==5)
	{
		echo "Updating <b>ARTICLEpubcomforms</b> table to v1.4+ structures...<br>";
		
		mysql_query("ALTER TABLE ARTICLEpubcomforms add column 
		(title varchar(50),
		type  varchar(50))", $db_link);
		
		mysql_query("UPDATE ARTICLEpubcomforms SET title='default comment 1', type='old comments' where serial=1", $db_link);
		mysql_query("UPDATE ARTICLEpubcomforms SET title='default comment 2', type='old comments' where serial=2", $db_link);
		mysql_query("UPDATE ARTICLEpubcomforms SET title='default comment 3', type='old comments' where serial=3", $db_link);
	}
}		


if( $table_info=@mysql_list_fields($projecto, "ARTICLEpubcom", $db_link) )
{
        $columns = mysql_num_fields($table_info);

        if($columns==11)
        {
                echo "Updating <b>ARTICLEpubcom</b> table to v1.4+ structures...<br>";

                mysql_query("ALTER TABLE ARTICLEpubcom add column parent bigint(20)", $db_link);
		mysql_query("ALTER TABLE ARTICLEpubcom add column total_posts bigint(20) not null", $db_link);
        }
}
?>
