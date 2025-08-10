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
  #AOLer--Just when you thought the internet couldn't get any worse
  #Translated by Todd
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "All timez R";
$str[power] = "Powered by";
$str[exectime] = "Execution Time";
$str[numqueries] = "MySQL Queriez Used";
$str[adminops] = "Admin Optionz";
$str[mainpage] = "Main Page!!!!111";
$str[addcat] = "Add Category";
$str[editcat] = "Edit Category";
$str[delcat] = "Delete Category";
$str[ordercat] = "Reorder Categoriez";
$str[category] = "Category";
$str[files] = "Filez";
$str[jump] = "Category Jump";
$str[logged] = "Logged N as";
$str[admincenter] = "Admin Center";
$str[logout] = "Logout";
$str[file] = "File";
$str[date] = "Date Added";
$str[rating] = "Rating";
$str[dls] = "Dlz";
$str[email] = "E-mail File 2 a Buddy!!!!!!!!!!!!!!!1111111111111";
$str[emailinfo] = "If u would like ur pal 2 know about this file, u can fill out and submit this form and an e-mail containing the file'z info will b e-mailed 2 ur friend!!!!!111 Cool, huh???????????????????????????????////////////";
$str[yname] = "Ur Name";
$str[yemail] = "Ur E-mail Addy";
$str[fname] = "Friend'z Name";
$str[femail] = "Friend'z E-mail Addy";
$str[esub] = "E-mail Subject";
$str[etext] = "E-mail Text";
$str[defaultmail] = "I thought u might b interested in dling the file located at";
$str[semail] = "Send E-mail!!!11";
$str[msg] .= "Hello $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "This e-mail was sent through the \"{dbname}\" file database. The webmasters of the \"{dbname}\" file database take no responsibility 4 the e-mails sent through the database.";
$str[econf] = "Thank u!!!!!!11 Ur e-mail has been sent 2 $friend[name]'s e-mail addy.";
$str[editfile] = "Edit File";
$str[deletefile] = "Delete File";
$str[desc] = "Description";
$str[creator] = "Creator";
$str[version] = "Version";
$str[scrsht] = "Screenshot";
$str[docs] = "Documentation";
$str[lastdl] = "Last Dl";
$str[never] = "Never";
$str[votes] = "votez";
$str[download] = "Dl File";
$str[rate] = "Rate File";
$str[license] = "License Agreement";
$str[licensewarn] = "U must agree 2 this license agreement 2 dl";
$str[iagree] = "Yeah!!!11";
$str[dontagree] = "Nah!!!!!!!11";
$str[rerror] = "Sorry, u have already rated this file.";
$str[rateinfo] = "U r about 2 rate the file <i>{filename}</i>. Please select a rating below. 1 is the worst, 10 is the best.";
$str[rconf] = "U have given <i>{filename}</i> a rating of {rate}. This makes the file'z new rating $nrating {newrating}/10.";
$str[stats] = "Statz";
$str[statstext] .= "There r  $num[files] files in $num[cats] categoriez<br>";
$str[statstext] .= "The oldest file is <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "The newest file is <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "The least popular file based on ratings is <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> with a rating of $least/10<br>";
$str[statstext] .= "The most popular file based on ratings is <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> with a rating of  $most/10<br>";
$str[statstext] .= "The least popular file based on dls is <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> with  $leastdl[file_dls] dls<br>";
$str[statstext] .= "The most popular file based on dls is <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> with  $mostdl[file_dls] dls<br>";
$str[statstext] .= "There have been  $totaldls[0] total dls<br>";
$str[statstext] .= "The average file rating is  $avg/10<br>";
$str[statstext] .= "The average amount of dls each file has is  $avgdls<br>";
$str[search] = "Search";
$str[results] = "Resultz for";
$str[nomatches] = "Sorry, no matchez were found 4";
$str[matches] = "matchez were found 4";
$str[sfor] = "wat do u want 2 look 4?";
$str[viewall] = "View All Filez";
$str[vainfo] = "View all of the filez in the database";
$str[next] = "Next";
$str[prev] = "Previous";
$str[pagenums] = "Pagez";
//U have reached Line 100. If u're not tired now, u will b soon.
$str[acinfo] = "Welcome 2 ur paFileDB 3 Admin Center. U can use the Admin Center 2 manage ur file database and change the paFileDB settings. U can select a link above 2 manage ur database.!!!!!!!111111111";
$str[cmanage] = "Category Management";
$str[fmanage] = "File Management";
$str[cumanage] = "Custom Fieldz Management";
$str[lmanage]= "License Management";
$str[amanage] = "Admin Accountz Management";
$str[csettings] = "Change Settingz";
$str[asettings] = "Ur Account Settingz";
$str[utils] = "Utiliz";
$str[aminfo] = "U can use this section of the admin center 2 add, edit, or delete additional administrator accountz.";
$str[aadmin] = "Add Admin";
$str[eadmin] = "Edit Admin";
$str[dadmin] = "Delete Admin";
$str[un] = "Username";
$str[uninfo] = "Enter the username 4 the new account here";
$str[aemail] = "Admin E-mail Addy";
$str[aemailinfo] = "Enter the admin'z e-mail addy here";
$str[apass] = "Password";
$str[apassinfo] = "Enter the password 4 the new admin account here. This can b changed at any time";
$str[aeditperm] = "Edit Adminz Permissionz";
$str[aeditperminfo] = "Select if u want the new admin 2 b able 2 add, edit, and delete other adminz.";
$str[yes] = "Yes";
$str[no] = "No";
$str[aadderror] = "There is already an admin with the username $form[username]";
$str[adminadded] = "The admin <i>$form[username]</i> has been added!";
$str[changepass] = "Change Password";
$str[newpass] = "New Password";
$str[editerror] = "U did not select an admin 2 edit!";
$str[infochanged] = "The admin'z info has been changed!";
$str[passchanged] = "The admin'z password has been changed!";
$str[delerror] = "U didn't select any adminz 2 delete!";
$str[deleted] = "The adminz u selected have been deleted.";
$str[cmaninfo] = "U can use the Category Management section of ur Admin Center 2 add, edit, delete and reorder categoriez. In order 2 add files 2 ur database, u must have at least one category created. U can select a link below 2 manage ur categories.";
$str[acat] = "Add Category";
$str[ecat] = "Edit Category";
$str[dcat] = "Delete Category";
$str[rcat] = "Reorder Categoriez";
$str[catadded] = "Ur new category, <i>$form[name]</i> has been added!";
$str[catname] = "Category Name";
$str[catnameinfo] = "This will become the name of the category.";
$str[catdesc] = "Category Description";
$str[catdescinfo] = "This is a description of the filez in the category";
$str[catparent] = "Parent Category";
$str[catparentinfo] = "If u want this category 2 b a sub-category, select the category u want it 2 b a sub-category of.";
$str[none] = "None";
$str[catedited] = "Ur category, <i>$form[name]</i> has been edited!";
$str[delfiles] = "Delete files in category?";
$str[catsdeleted] = "The categoriez u selected have been deleted.";
$str[cdelerror] = "U didn't select any categoriez 2 delete!";
$str[rcatinfo] = "U can reorder categoriez 2 change the position they r displayed in on the main page. 2 reorder the categories, change the numbers 2 the order u want them shown in. 1 will b showed first, 2 will b shown second, ect. This does not affect sub-categories.";
$str[rcatdone] = "The categoriez were re-ordered!";
$str[custominfo] = "U can use the custom fieldz management section of the paFileDB admin center 2 add, edit, and delete custom fieldz. U can use custom fieldz 2 add more information about a file. 4 example, if u want an information field 2 put the file'z size in, u can create the custom field and then u can add the file size on the Add/Edit file page.";
$str[afield] = "Add Field";
$str[efield] = "Edit Field";
$str[dfield] = "Delete Field";
$str[fieldname] = "Field Name";
$str[fieldnameinfo] = "This is the name of the field, 4 example 'File Size'";
$str[fielddesc] = "Field Description";
$str[fielddescinfo] = "This is a description of the field, 4 example 'File Size in Megabytez'";
$str[fieldadded] = "Ur new custom field, <i>$form[name]</i> has been added!";
$str[fieldedited] = "Ur custom field, <i>$form[name]</i> has been edited!";
$str[dfielderror] = "U didn't select any fieldz 2 delete!";
$str[fieldsdel] = "Ur custom fieldz have been deleted!";
$str[fmanageinfo] = "U can use the file management section of the paFileDB admin center 2 add, edit, and delete filez.<br><b>Tip:</b> 2 easily edit or delete a file, make sure u r logged in as an admin and browse 2 a file like anyone normally would 2 dl the file. Once on the file information page, u will have links 2 the file'z edit and delete pages.";
$str[afile] = "Add File";
$str[efile] = "Edit File";
$str[dfile] = "Delete File";
$str[upload] = "Upload File";
$str[uploadinfo] = "Upload this file";
$str[uploaderror] = "The file $userfile_name already exists!!!!111 Please rename the file and try again.";
$str[uploaddone] = "The file $userfile_name has been uploaded!!!!1111111 The URL 2 the file is";
$str[uploaddone2] = "Click Here 2 place this URL in the dl URL field.";
$str[filename] = "File Name";
$str[filenameinfo] = "This is the name of the file u r adding, such as 'paFileDB 3' or 'My Picture.'";
$str[filesd] = "Short Description";
$str[filesdinfo] = "dis is a short description of the file. dis will go on the page dat lists all the files in a category, so this description should b short";
$str[fileld] = "Long Description";
$str[fileldinfo] = "This is a longer description of the file. This will go on the file's information page so this description can b longer";
$str[filecreator] = "Creator/Author";
$str[filecreatorinfo] = "This is the name of whoever created the file.";
$str[fileversion] = "File Version";
$str[fileversioninfo] = "This is the version of the file, such as 3.0 or 1.3 Beta";
$str[filess] = "Screenshot URL";
$str[filessinfo] = "This is a URL 2 a screenshot of the file. 4 example, if u r adding a Winamp skin, this would b a URL 2 a screenshot of Winamp with this skin";
$str[filedocs] = "Documentation/Manual URL";
$str[filedocsinfo] = "This is a URL 2 the documentation or a manual 4 the file";
$str[fileurl] = "Dl URL";
$str[fileurlinfo] = "This is a URL 2 the file dat will b dled. U can either type it in manually or <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">Upload a file 2 the server</a>";
$str[filepi] = "Post Icon";
$str[filepiinfo] = "U can choose a post icon 4 the file. The post icon will b shown next 2 the file in the list of files.";
$str[filecat] = "Category";
$str[filecatinfo] = "This is the category the file belongs in.";
$str[filelicense] = "License";
$str[filelicenseinfo] = "This is the license agreement the user must agree 2 b4 dling the file.";
$str[filepin] = "Pin File";
$str[filepininfo] = "Choose if u want the file pinned or not. Pinned files will alwayz b shown at the top of the file list.";
$str[fileadded] = "Ur new file, <i>$form[name]</i> has been added!";
$str[fileedited] = "Ur file, <i>$form[name]</i> has been edited!";
$str[fderror] = "U didn't select any filez 2 delete!";
//U have reached Line 200. PHP Arena is not responsible 4 deaths related 2 sitting in front of ur computer 4 a long time while translating this file.
$str[filesdeleted] = "The filez u selected have been deleted!";
$str[lmanageinfo] = "U can use the license management section of the paFileDB admin center 2 add, edit, and delete license agreementz. U can select a license 4 a file on the file add or edit page. If a file has a license agreement, a user will have 2 agree 2 it b4 dling the file.";
$str[alicense] = "Add License";
$str[elicense] = "Edit License";
$str[dlicense] = "Delete License";
$str[lname] = "License Name";
$str[ltext] = "License Text";
$str[licenseadded] = "Ur new license agreement, <i>$form[name]</i> has been added!";
$str[licenseedited] = "Ur license, <i>$form[name]</i> has been edited!";
$str[lderror] = "U didn't select any licensezs 2 delete!";
$str[ldeleted] = "The licensez u selected have been deleted.";
$str[login] = "Log In";
$str[username] = "Username";
$str[password] = "Password";
$str[loggedin] = "U have been logged in!!!!!!111111111 <a href=\"pafiledb.php?action=admin&ad=main\">Click Here</a> 2 access ur admin center.";
$str[loginerror] = "U have entered a wrong username or password!!!!!!!!!!!!!111";
$str[loggedout] = "U have been logged out.";
$str[changeemail] = "Change E-mail Addy";
$str[emailad] = "E-mail Addy";
$str[confpass] = "Confirm Password";
$str[nopermission] = "Sorry, u do not have permissionz 2 use this section of the admin center.";
$str[emailchanged] = "Ur e-mail addy has been changed!!!!111";
$str[changepasserror] = "Ur password and confirmation password do not match. Please go back and try again";
$str[yourpasschanged] = "Ur password has been changed!!!!1";
$str[dbname] = "Database Name";
$str[dbnameinfo] = "This is the name of the database, such as 'Windowz Registry Hackz'";
$str[dbdesc] = "Database Description";
$str[dbdescinfo] = "This is a description of the filez in the database, such as 'Registry hackz that make Windowz useful";
$str[dburl] = "Database URL";
$str[dburlinfo] = "This is the URL 2 the directory where paFileDB is installed";
$str[topnum] = "Top Number";
$str[topnuminfo] = "This is how many filez will b displayed on the Top X dled filez list";
$str[hpurl] = "Homepage URL";
$str[hpurlinfo] = "This is the URL 2 ur homepage";
$str[nfdays] = "New File Dayz";
$str[nfdaysinfo] = "How many dayz new a file has 2 b 2 b listed with a 'New File' icon. If this is set 2 5, then all files added within the past 5 dayz will have the 'New File' icon";
$str[timeoffset] = "Time Offset";
$str[timeoffsetinfo] = "This is the time offset. 4 example, if the server is located in the Eastern time zone but u want the times 2 b shown in Central Time, u would set this 2 -1";
$str[tz] = "Time Zone";
$str[tzinfo] = "This is the time zone the times will b shown in";
$str[header] = "Header";
$str[headerinfo] = "The header file is shown b4 any of the paFileDB output is shown";
$str[footer] = "Footer";
$str[footerinfo] = "The footer file is shwon after the paFileDB output is shown.";
$str[styleset] = "Style Set";
$str[stylesetinfo] = "Select the style set u wish 2 use";
$str[stats2] = "Show Statz";
$str[statsinfo] = "Choose if u would like 2 show the script execution statz (Total number of MySQL queriez and how long it took 4 the script 2 execute)";
$str[settingschanged] = "Ur paFileDB settingz have been changed!!!1111111111";
$str[lang] = "Language File";
$str[langinfo] = "Select the language 4 paFileDB 2 use.";

//Start Beta 2.1 Language File
$str[settings] = "Settingz";
$str[pafdbsettings] = "paFileDB Settingz";

//Start Beta 3 Language File
$str[sortby] = "Sort By";
$str[sort] = "Sort";
$str[name] = "Name";
$str[bdb] = "Backup Database";
$str[rdb] = "Restore Database";
$str[rdbinfo] = "U can restore a paFileDB database backup u made earlier. <b>NOTE:</b> This will delete anything already in ur database including admin info!<p>Choose a file 2 restore:";
$str[rdbdone] = "Ur database has been restored! If admin info in ur old database and the database u just restored is different, u might have 2 login again.";
$str[home] = "Homepage";
?>