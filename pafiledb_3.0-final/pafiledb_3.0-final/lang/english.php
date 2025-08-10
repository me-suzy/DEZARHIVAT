<?php
/*
  paFileDB 3.0
  ©2001 PHP Arena
  Written by Todd
  todd@phparena.uni.cc
  http://www.phparena.uni.cc
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.

  ##########
  #paFileDB 3.0 Language File
  #English
  #Translated by Todd
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "All times are";
$str[power] = "Powered by";
$str[exectime] = "Execution Time";
$str[numqueries] = "MySQL Queries Used";
$str[adminops] = "Admin Options";
$str[mainpage] = "Main Page";
$str[addcat] = "Add Category";
$str[editcat] = "Edit Category";
$str[delcat] = "Delete Category";
$str[ordercat] = "Reorder Categories";
$str[category] = "Category";
$str[files] = "Files";
$str[jump] = "Category Jump";
$str[logged] = "Logged in as";
$str[admincenter] = "Admin Center";
$str[logout] = "Logout";
$str[file] = "File";
$str[date] = "Date Added";
$str[rating] = "Rating";
$str[dls] = "Downloads";
$str[email] = "E-mail File to a Friend";
$str[emailinfo] = "If you would like a friend to know about this file, you can fill out and submit this form and an e-mail containing the file's information will be e-mailed to your friend!";
$str[yname] = "Your Name";
$str[yemail] = "Your E-mail Address";
$str[fname] = "Friend's Name";
$str[femail] = "Friend's E-mail Address";
$str[esub] = "E-mail Subject";
$str[etext] = "E-mail Text";
$str[defaultmail] = "I thought you might be interested in downloading the file located at";
$str[semail] = "Send E-mail";
$str[msg] .= "Hello $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "This e-mail was sent through the \"{dbname}\" file database. The webmasters of the \"{dbname}\" file database take no responsibility for the e-mails sent through the database.";
$str[econf] = "Thank you! Your e-mail has been sent to $friend[name]'s e-mail address.";
$str[editfile] = "Edit File";
$str[deletefile] = "Delete File";
$str[desc] = "Description";
$str[creator] = "Creator";
$str[version] = "Version";
$str[scrsht] = "Screenshot";
$str[docs] = "Documentation";
$str[lastdl] = "Last Download";
$str[never] = "Never";
$str[votes] = "votes";
$str[download] = "Download File";
$str[rate] = "Rate File";
$str[license] = "License Agreement";
$str[licensewarn] = "You must agree to this license agreement to download";
$str[iagree] = "I Agree";
$str[dontagree] = "I Don't Agree";
$str[rerror] = "Sorry, you have already rated this file.";
$str[rateinfo] = "You are about to rate the file <i>{filename}</i>. Please select a rating below. 1 is the worst, 10 is the best.";
$str[rconf] = "You have given <i>{filename}</i> a rating of {rate}. This makes the file's new rating $nrating {newrating}/10.";
$str[stats] = "Stats";
$str[statstext] .= "There are  $num[files] files in  $num[cats] categories<br>";
$str[statstext] .= "The oldest file is <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "The newest file is <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "The least popular file based on ratings is <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> with a rating of $least/10<br>";
$str[statstext] .= "The most popular file based on ratings is <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> with a rating of  $most/10<br>";
$str[statstext] .= "The least popular file based on downloads is <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> with  $leastdl[file_dls] downloads<br>";
$str[statstext] .= "The most popular file based on downloads is <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> with  $mostdl[file_dls] downloads<br>";
$str[statstext] .= "There have been  $totaldls[0] total downloads<br>";
$str[statstext] .= "The average file rating is  $avg/10<br>";
$str[statstext] .= "The average amount of downloads each file has is  $avgdls<br>";
$str[search] = "Search";
$str[results] = "Results for";
$str[nomatches] = "Sorry, no matches were found for";
$str[matches] = "matches were found for";
$str[sfor] = "Search For";
$str[viewall] = "View All Files";
$str[vainfo] = "View all of the files in the database";
$str[next] = "Next";
$str[prev] = "Previous";
$str[pagenums] = "Pages";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Welcome to your paFileDB 3 Admin Center. You can use the Admin Center to manage your file database and change the paFileDB settings. You can select a link above to manage your database.";
$str[cmanage] = "Category Management";
$str[fmanage] = "File Management";
$str[cumanage] = "Custom Fields Management";
$str[lmanage]= "License Management";
$str[amanage] = "Admin Accounts Management";
$str[csettings] = "Change Settings";
$str[asettings] = "Your Account Settings";
$str[utils] = "Utilities";
$str[aminfo] = "You can use this section of the admin center to add, edit, or delete additional administrator accounts.";
$str[aadmin] = "Add Admin";
$str[eadmin] = "Edit Admin";
$str[dadmin] = "Delete Admin";
$str[un] = "Username";
$str[uninfo] = "Enter the username for the new account here";
$str[aemail] = "Admin E-mail Address";
$str[aemailinfo] = "Enter the admin's e-mail address here";
$str[apass] = "Password";
$str[apassinfo] = "Enter the password for the new admin account here. This can be changed at any time";
$str[aeditperm] = "Edit Admins Permissions";
$str[aeditperminfo] = "Select if you want the new admin to be able to add, edit, and delete other admins.";
$str[yes] = "Yes";
$str[no] = "No";
$str[aadderror] = "There is already an admin with the username $form[username]";
$str[adminadded] = "The admin <i>$form[username]</i> has been added!";
$str[changepass] = "Change Password";
$str[newpass] = "New Password";
$str[editerror] = "You did not select an admin to edit!";
$str[infochanged] = "The admin's info has been changed!";
$str[passchanged] = "The admin's password has been changed!";
$str[delerror] = "You didn't select any admins to delete!";
$str[deleted] = "The admins you selected have been deleted.";
$str[cmaninfo] = "You can use the Category Management section of your Admin Center to add, edit, delete and reorder categories. In order to add files to your database, you must have at least one category created. You can select a link below to manage your categories.";
$str[acat] = "Add Category";
$str[ecat] = "Edit Category";
$str[dcat] = "Delete Category";
$str[rcat] = "Reorder Categories";
$str[catadded] = "Your new category, <i>$form[name]</i> has been added!";
$str[catname] = "Category Name";
$str[catnameinfo] = "This will become the name of the category.";
$str[catdesc] = "Category Description";
$str[catdescinfo] = "This is a description of the files in the category";
$str[catparent] = "Parent Category";
$str[catparentinfo] = "If you want this category to be a sub-category, select the category you want it to be a sub-category of.";
$str[none] = "None";
$str[catedited] = "Your category, <i>$form[name]</i> has been edited!";
$str[delfiles] = "Delete files in category?";
$str[catsdeleted] = "The categories you selected have been deleted.";
$str[cdelerror] = "You didn't select any categories to delete!";
$str[rcatinfo] = "You can reorder categories to change the position they are displayed in on the main page.To reorder the categories, change the numbers to the order you want them shown in. 1 will be showed first, 2 will be shown second, ect. This does not affect sub-categories.";
$str[rcatdone] = "The categories were re-ordered!";
$str[custominfo] = "You can use the custom fields management section of the paFileDB admin center to add, edit, and delete custom fields. You can use custom fields to add more information about a file. For example, if you want an information field to put the file's size in, you can create the custom field and then you can add the file size on the Add/Edit file page.";
$str[afield] = "Add Field";
$str[efield] = "Edit Field";
$str[dfield] = "Delete Field";
$str[fieldname] = "Field Name";
$str[fieldnameinfo] = "This is the name of the field, for example 'File Size'";
$str[fielddesc] = "Field Description";
$str[fielddescinfo] = "This is a description of the field, for example 'File Size in Megabytes'";
$str[fieldadded] = "Your new custom field, <i>$form[name]</i> has been added!";
$str[fieldedited] = "Your custom field, <i>$form[name]</i> has been edited!";
$str[dfielderror] = "You didn't select any fields to delete!";
$str[fieldsdel] = "Your custom fields have been deleted!";
$str[fmanageinfo] = "You can use the file management section of the paFileDB admin center to add, edit, and delete files.<br><b>Tip:</b> To easily edit or delete a file, make sure you are logged in as an admin and browse to a file like anyone normally would to download the file. Once on the file information page, you will have links to the file's edit and delete pages.";
$str[afile] = "Add File";
$str[efile] = "Edit File";
$str[dfile] = "Delete File";
$str[upload] = "Upload File";
$str[uploadinfo] = "Upload this file";
$str[uploaderror] = "The file $userfile_name already exists! Please rename the file and try again.";
$str[uploaddone] = "The file $userfile_name has been uploaded! The URL to the file is";
$str[uploaddone2] = "Click Here to place this URL in the Download URL field.";
$str[filename] = "File Name";
$str[filenameinfo] = "This is the name of the file you are adding, such as 'paFileDB 3' or 'My Picture.'";
$str[filesd] = "Short Description";
$str[filesdinfo] = "This is a short description of the file. This will go on the page that lists all the files in a category, so this description should be short";
$str[fileld] = "Long Description";
$str[fileldinfo] = "This is a longer description of the file. This will go on the file's information page so this description can be longer";
$str[filecreator] = "Creator/Author";
$str[filecreatorinfo] = "This is the name of whoever created the file.";
$str[fileversion] = "File Version";
$str[fileversioninfo] = "This is the version of the file, such as 3.0 or 1.3 Beta";
$str[filess] = "Screenshot URL";
$str[filessinfo] = "This is a URL to a screenshot of the file. For example, if you are adding a Winamp skin, this would be a URL to a screenshot of Winamp with this skin";
$str[filedocs] = "Documentation/Manual URL";
$str[filedocsinfo] = "This is a URL to the documentation or a manual for the file";
$str[fileurl] = "Download URL";
$str[fileurlinfo] = "This is a URL to the file that will be downloaded. You can either type it in manually or <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">Upload a file to the server</a>";
$str[filepi] = "Post Icon";
$str[filepiinfo] = "You can choose a post icon for the file. The post icon will be shown next to the file in the list of files.";
$str[filecat] = "Category";
$str[filecatinfo] = "This is the category the file belongs in.";
$str[filelicense] = "License";
$str[filelicenseinfo] = "This is the license agreement the user must agree to before downloading the file.";
$str[filepin] = "Pin File";
$str[filepininfo] = "Choose if you want the file pinned or not. Pinned files will always be shown at the top of the file list.";
$str[fileadded] = "Your new file, <i>$form[name]</i> has been added!";
$str[fileedited] = "Your file, <i>$form[name]</i> has been edited!";
$str[fderror] = "You didn't select any files to delete!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "The files you selected have been deleted!";
$str[lmanageinfo] = "You can use the license management section of the paFileDB admin center to add, edit, and delete license agreements. You can select a license for a file on the file add or edit page. If a file has a license agreement, a user will have to agree to it before downloading the file.";
$str[alicense] = "Add License";
$str[elicense] = "Edit License";
$str[dlicense] = "Delete License";
$str[lname] = "License Name";
$str[ltext] = "License Text";
$str[licenseadded] = "Your new license agreement, <i>$form[name]</i> has been added!";
$str[licenseedited] = "Your license, <i>$form[name]</i> has been edited!";
$str[lderror] = "You didn't select any licenses to delete!";
$str[ldeleted] = "The licenses you selected have been deleted.";
$str[login] = "Log In";
$str[username] = "Username";
$str[password] = "Password";
$str[loggedin] = "You have been logged in. <a href=\"pafiledb.php?action=admin&ad=main\">Click Here</a> to access your admin center.";
$str[loginerror] = "You have entered a wrong username or password!";
$str[loggedout] = "You have been logged out.";
$str[changeemail] = "Change E-mail Address";
$str[emailad] = "E-mail Address";
$str[confpass] = "Confirm Password";
$str[nopermission] = "Sorry, you do not have permissions to use this section of the admin center.";
$str[emailchanged] = "Your e-mail address has been changed!";
$str[changepasserror] = "Your password and confirmation password do not match. Please go back and try again";
$str[yourpasschanged] = "Your password has been changed!";
$str[dbname] = "Database Name";
$str[dbnameinfo] = "This is the name of the database, such as 'Windows Registry Hacks'";
$str[dbdesc] = "Database Description";
$str[dbdescinfo] = "This is a description of the files in the database, such as 'Registry hacks that make Windows useful";
$str[dburl] = "Database URL";
$str[dburlinfo] = "This is the URL to the directory where paFileDB is installed";
$str[topnum] = "Top Number";
$str[topnuminfo] = "This is how many files will be displayed on the Top X Downloaded files list";
$str[hpurl] = "Homepage URL";
$str[hpurlinfo] = "This is the URL to your homepage";
$str[nfdays] = "New File Days";
$str[nfdaysinfo] = "How many days new a file has to be to be listed with a 'New File' icon. If this is set to 5, then all files added within the past 5 days will have the 'New File' icon";
$str[timeoffset] = "Time Offset";
$str[timeoffsetinfo] = "This is the time offset. For example, if the server is located in the Eastern time zone but you want the times to be shown in Central Time, you would set this to -1";
$str[tz] = "Time Zone";
$str[tzinfo] = "This is the time zone the times will be shown in";
$str[header] = "Header";
$str[headerinfo] = "The header file is shown before any of the paFileDB output is shown";
$str[footer] = "Footer";
$str[footerinfo] = "The footer file is shwon after the paFileDB output is shown.";
$str[styleset] = "Style Set";
$str[stylesetinfo] = "Select the style set you wish to use";
$str[stats2] = "Show Stats";
$str[statsinfo] = "Choose if you would like to show the script execution stats (Total number of MySQL queries and how long it took for the script to execute)";
$str[settingschanged] = "Your paFileDB settings have been changed!";
$str[lang] = "Language File";
$str[langinfo] = "Select the language for paFileDB to use.";

//Start Beta 2.1 Language File
$str[settings] = "Settings";
$str[pafdbsettings] = "paFileDB Settings";

//Start Beta 3 Language File
$str[sortby] = "Sort By";
$str[sort] = "Sort";
$str[name] = "Name";
$str[bdb] = "Backup Database";
$str[rdb] = "Restore Database";
$str[rdbinfo] = "You can restore a paFileDB database backup you made earlier. <b>NOTE:</b> This will delete anything already in your database including admin info!<p>Choose a file to restore:";
$str[rdbdone] = "Your database has been restored! If admin info in your old database and the database you just restored is different, you might have to login again.";
$str[home] = "Homepage";
?>