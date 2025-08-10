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
  #Dutch
  #Translated by Bekkel
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "De tijd is in";
$str[power] = "Powered by";
$str[exectime] = "Verwerkings Tijd";
$str[numqueries] = "MySQL Queries Used";
$str[adminops] = "Admin Opties";
$str[mainpage] = "Main Page";
$str[addcat] = "Category toevoegen";
$str[editcat] = "Category bewerken";
$str[delcat] = "Category verwijderen";
$str[ordercat] = "Categories her-rangschikken";
$str[category] = "Category";
$str[files] = "Files";
$str[jump] = "Verander Category";
$str[logged] = "Logged in als";
$str[admincenter] = "Admin Center";
$str[logout] = "Logout";
$str[file] = "File";
$str[date] = "Datum Toegevoegd";
$str[rating] = "Waardering";
$str[dls] = "Downloads";
$str[email] = "E-mail File naar een vriend";
$str[emailinfo] = "Als je een vriend wilt laten weten over deze file, kun je een formulier invullen en de beschrijving van de file naar een vriend sturen!";
$str[yname] = "Uw Naam";
$str[yemail] = "Uw E-mail Adres";
$str[fname] = "Naam Van Vriend";
$str[femail] = "E-mail Adres Van Vriend";
$str[esub] = "E-mail Onderwerp";
$str[etext] = "E-mail Tekst";
$str[defaultmail] = "Ik dacht dat u dit wel intressant zou vinden. Deze file is hier te downloaden";
$str[semail] = "Verstuur E-mail";
$str[msg] .= "Hallo $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "Deze E-mail was gestuurd door de \"{dbname}\" file database. De webmasters van de \"{dbname}\" file database is niet verantwoordelijk voor de verstuurde e-mails.";
$str[econf] = "Bedankt! Uw e-mail is verstuurd naar $friend[name]'s e-mail adres.";
$str[editfile] = "Bewerk File";
$str[deletefile] = "Verwijder File";
$str[desc] = "Beschrijving";
$str[creator] = "Ontwerper";
$str[version] = "Versie";
$str[scrsht] = "Screenshot";
$str[docs] = "Documentatie";
$str[lastdl] = "Laaste Download";
$str[never] = "Nooit";
$str[votes] = "Stemmen";
$str[download] = "Download File";
$str[rate] = "Beoordeel File";
$str[license] = "Licentie Overeenkomst";
$str[licensewarn] = "U moet accord gaan met deze licentie om de file te kunnen downloaden";
$str[iagree] = "Ik ga accoord";
$str[dontagree] = "Ik ga niet accoord";
$str[rerror] = "Sorry, U heeft deze file a beoordeeld.";
$str[rateinfo] = "U kunt nu de file <i>{filename}</i> beoordelen. Selecteer een oordeel. 1 is het slechts, 10 is het best.";
$str[rconf] = "U heeft de file <i>{filename}</i> een beoordeling gegeven van {rate}. Dit maakt het nieuwe oordeel van de file: $nrating {newrating}/10.";
$str[stats] = "Statsitieken";
$str[statstext] .= "Er zijn  $num[files] files in  $num[cats] categorieen<br>";
$str[statstext] .= "De oudste file is <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "De nieuwste file is <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "De minst populairste file volgens de beoordelingen is <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> with a rating of $least/10<br>";
$str[statstext] .= "De meest populairste file volgens de beoordelingen is  <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> with a rating of  $most/10<br>";
$str[statstext] .= "De minst populairste file volgens de downloads statistieken is  <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> with  $leastdl[file_dls] downloads<br>";
$str[statstext] .= "De meest populairste file volgens de downloads statistieken is <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> with  $mostdl[file_dls] downloads<br>";
$str[statstext] .= "Er zijn in totaal $totaldls[0] files gedownload<br>";
$str[statstext] .= "Het gemiddelde cijfer van de files is $avg/10<br>";
$str[statstext] .= "Het gemiddelde aantal downloads per file is $avgdls<br>";
$str[search] = "Zoeken";
$str[results] = "Resultaten voor";
$str[nomatches] = "Sorry, er zijn geen gegevens gevonden die aan de zoekopdracht voldeden";
$str[matches] = "Gegevens zijn gevonden voor";
$str[sfor] = "Zoek naarr";
$str[viewall] = "Bekijk alle files";
$str[vainfo] = "Bekijk alle files van de database";
$str[next] = "Volgende";
$str[prev] = "Vorige";
$str[pagenums] = "Pagina's";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Welcome. Dit is paFileDB 3 Admin Center. U kunt deze admincenter gebruiken om files en settings aan te passen. U kunt een link hierboven aanklikken om iets te veranderen.";
$str[cmanage] = "Categorie Management";
$str[fmanage] = "File Management";
$str[cumanage] = "Gebruikersveld Management";
$str[lmanage]= "Licentie Management";
$str[amanage] = "Admin Accounts Management";
$str[csettings] = "Verander Settings";
$str[asettings] = "Uw Account Settings";
$str[utils] = "Mogelijkheden";
$str[aminfo] = "YU kunt dit deel van het admincenter gebruiken om accounts toetevoegen, te bewerken, of te deleten.";
$str[aadmin] = "Voeg een Admin toe";
$str[eadmin] = "Bewerk een Admin";
$str[dadmin] = "Delete een Admin";
$str[un] = "Gebruikersnaam";
$str[uninfo] = "Gebruikersnaam";
$str[aemail] = "Admin E-mail Adres";
$str[aemailinfo] = "Tik hier de admin's e-mail adres";
$str[apass] = "Password";
$str[apassinfo] = "tik het password voor de nieuwe admin hier in. Deze kan altijd veranderd worden";
$str[aeditperm] = "Bewerk Admins Toegang";
$str[aeditperminfo] = "Selecteer of deze admin mag andere admins mag toevoegen, bewerken en-of verwijderen.";
$str[yes] = "Ja";
$str[no] = "Nee";
$str[aadderror] = "Er bestaat al een admin met deze gebruikersnaam $form[username]";
$str[adminadded] = "De admin <i>$form[username]</i> is toegevoegd!";
$str[changepass] = "Verander Password";
$str[newpass] = "Nieuw Password";
$str[editerror] = "U heeft geen admin geselecteerd om te bewerken!";
$str[infochanged] = "De admin's info is veranderd!";
$str[passchanged] = "De admin's password is veranderd!";
$str[delerror] = "U heeft geen admin geselecteerd om te verwijderen!";
$str[deleted] = "De geselecteerde admin is verwijderd.";
$str[cmaninfo] = "U kunt in de Categorie Management sectie van uw Admin Center categorieen toevoegen, bewerken, verwijderen en herschikken. Als u files wilt toevoegen aan uw database moet u eerst een categorie aangemaakt hebben. U kunt een link selecteren om uw categorieen te bewerken.";
$str[acat] = "Voeg een Categorie toe";
$str[ecat] = "Bewerk een Categorie";
$str[dcat] = "Verwijder een Categorie";
$str[rcat] = "Herschik de Categorieen";
$str[catadded] = "De nieuwe categorie, <i>$form[name]</i> is toegevoegd!";
$str[catname] = "Categorie Naam";
$str[catnameinfo] = "Dit is de naam van de categorie.";
$str[catdesc] = "Categorie Beschrijving";
$str[catdescinfo] = "Dit is de beschrijving van de files in deze categorie";
$str[catparent] = "Parent Category";
$str[catparentinfo] = "Als u wilt dat deze categorie een sub-categorie moet zijn, selecteerd dan de categorie waar die onder moet vallen 'parent'.";
$str[none] = "Niet";
$str[catedited] = "De categorie, <i>$form[name]</i> is aangepast!";
$str[delfiles] = "Verwijder files in deze categorie?";
$str[catsdeleted] = "De geselecteerde categorieen zijn verwijderd.";
$str[cdelerror] = "er zijn geen categorieen geselecteerd om te verwijderen!";
$str[rcatinfo] = "U kunt uw categorieen herschikken door de positie te veranderen zoals ze te zien zijn op de hoofdpagina. Dit doet u door de nummer te veranderen in de volgorde die u wilt. 1 zal als eerst te zien zijn, 2 als tweede, ect. Dit heeft geen invloed op de sub-categorieen.";
$str[rcatdone] = "De categorieen zijn geherschikt!";
$str[custominfo] = "U kunt in de custom fields management sectie van paFileDB admin center eigen velden toevoegen, bewerken en verwijderen. U kunt deze velden gebruiken om meer informatie over een file te geven. FBijvoorbeeld, Als u wil dat er informatie komt te staan over de bestandsgroote dan maakt u een veld ---bestandsgrootte aan.";
$str[afield] = "Veld toevoegen";
$str[efield] = "Veld bewerken";
$str[dfield] = "Veld verwijderen";
$str[fieldname] = "Veld naam";
$str[fieldnameinfo] = "Dit is de naam van het Veld, bijvoorbeeld 'Bestands grootte'";
$str[fielddesc] = "Beschrijving Veld";
$str[fielddescinfo] = "Dit is de beschrijving van het veld, bijvoorbeeld 'Bestandsgrootte in Megabytes'";
$str[fieldadded] = "Een nieuwe veld, <i>$form[name]</i> is toegevoegd!";
$str[fieldedited] = "Het veld, <i>$form[name]</i> is bewerkt!";
$str[dfielderror] = "Er is geen veld geselecteerd om te deleten!";
$str[fieldsdel] = "Het geselecteerde veld is verwijderd!";
$str[fmanageinfo] = "U kunt de file management section van paFileDB admin center gebruiken om files toe tevoegen, te bewerken en te deleten.<br><b>Tip:</b> Om snel een file te verwijderen, zorg er voor dat u ingelogd bent als admin en browse naar de file toe zoals iedereen dat doet die de file wil downloaden. Op deze pagina staat voor de admin een link om de file te verwijderen of te bewerken.";
$str[afile] = "File toevoegen";
$str[efile] = "File bewerken";
$str[dfile] = "File verwijderen";
$str[upload] = "File uploaden";
$str[uploadinfo] = "Upload deze file";
$str[uploaderror] = "De file $userfile_name bestaat al! Geef de file een andere naam en probeer het opnieuw.";
$str[uploaddone] = "De file $userfile_name is geupload! De URL van de file is";
$str[uploaddone2] = "klik hier om deze url in het download veld te plaatsen.(bestand is nu te downloaden)";
$str[filename] = "File Naam";
$str[filenameinfo] = "Dit is de naam van de File die u toevoegd, bijvoorbeeld 'paFileDB 3' of 'My Picture.'";
$str[filesd] = "Korte beschrijving";
$str[filesdinfo] = "Dit is een korte beschrijving van de File. Dit zal te zien zijn op de pagina waar alle files van een categorie te zien zijn, Dus houd deze kort";
$str[fileld] = "Lange beschrijving";
$str[fileldinfo] = "Dit is een uitgebreide beschrijving van de File. Deze is enkel te zien in het informatie veld van de file zelf";
$str[filecreator] = "Autheur";
$str[filecreatorinfo] = "Dit is de naam van de autheur van de file.";
$str[fileversion] = "File Versie";
$str[fileversioninfo] = "Dit is de versie van de file, Bijvoorbeeld 3.0 of 1.3 Beta";
$str[filess] = "Screenshot URL";
$str[filessinfo] = "Dit is de URL van een screenshot van de file. Bijvoorbeeld, als u een winamp-skin toevoegd, zal dit de url zijn naar een plaatje van dei skin";
$str[filedocs] = "Documentatie/Handleiding URL";
$str[filedocsinfo] = "Dit is de URL naar de documentatie of een handleiding van de file";
$str[fileurl] = "Download URL";
$str[fileurlinfo] = "Dit is de URL naar de file dat gedownload kan worden. U kunt deze zelf intikken of <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">De file uploaden naar de server </a>(2de optie is beter)";
$str[filepi] = "Post Icoon";
$str[filepiinfo] = "U kunt een post icoon voor een File kiezen. Dit post icoon zal naast de file worden weergegeven in de filelijst.";
$str[filecat] = "Categorie";
$str[filecatinfo] = "Dit is de categorie waar de file is hoort";
$str[filelicense] = "Licentie";
$str[filelicenseinfo] = "Dit is de licentie overeenkomst waar de bezoeker mee accoord moet gaan voor deze de file mag downloaden.";
$str[filepin] = "Pin File";
$str[filepininfo] = "Bepaal of de file gepinned moet worden of niet. Pinned files zullen altijd als eerst worden weergegeven.";
$str[fileadded] = "De file, <i>$form[name]</i> is toegevoegd!";
$str[fileedited] = "De file, <i>$form[name]</i> is bewerkt!";
$str[fderror] = "U heeft geen file geselecteerd om te verwijderen!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "De geselecteerde file is gedelete!";
$str[lmanageinfo] = "U kunt de licentie overeenkomst beheerdersgedeelte gebuiken om files toe te voegen, te bewerken, en te verwijderen. U kunt een licentie van een file veranderen in de toevoeg- of bewerkpagina. Als een file een licentie heeft, moet de bezoeker eerst accoord gaan met deze licentie.";
$str[alicense] = "Licentie toevoegen";
$str[elicense] = "Licentie bewerken";
$str[dlicense] = "Licentie verwijderen";
$str[lname] = "Licentie Naam";
$str[ltext] = "Licentie Tekst";
$str[licenseadded] = "De nieuwe licentie overeenkomst, <i>$form[name]</i> is toegevoegd!";
$str[licenseedited] = "De licentie, <i>$form[name]</i> is bewerkt!";
$str[lderror] = "Er is geen licentie geslecteerd om te verwijderen!";
$str[ldeleted] = "De geselecteerde licentie is verwijderd.";
$str[login] = "Log In";
$str[username] = "Username";
$str[password] = "Password";
$str[loggedin] = "U bent uitgelogd. <a href=\"pafiledb.php?action=admin&ad=main\">klik Hier</a> om het beheerders gedeelte te betreden.";
$str[loginerror] = "U heeft een foute username of password ingetikt!";
$str[loggedout] = "U bent uitgelogd.";
$str[changeemail] = "Verander E-mail Adres";
$str[emailad] = "E-mail Adres";
$str[confpass] = "Bevestig Password";
$str[nopermission] = "Sorry, u heeft geen recht om het beheerdersgedeelte te gebruiken.";
$str[emailchanged] = "Uw e-mail adres is veranderd!";
$str[changepasserror] = "Uw heeft twee verschillende passwords ingetikt, ga terug en probeer het opnieuw";
$str[yourpasschanged] = "Uw password is veranderd!";
$str[dbname] = "Database Naam";
$str[dbnameinfo] = "Dit is de naam van de database'";
$str[dbdesc] = "Database Beschrijving";
$str[dbdescinfo] = "dit is de beschrijving van de files in de database";
$str[dburl] = "Database URL";
$str[dburlinfo] = "dit is de URL naar de directory waar dit script --paFileDB-- is geinstalleerd";
$str[topnum] = "Hoogst gewaardeerde";
$str[topnuminfo] = "Dit geeft aan hoeveel files er te zien zijn in de meest gedownloade files lijst";
$str[hpurl] = "Homepage URL";
$str[hpurlinfo] = "Dit is de url naar uw homepage";
$str[nfdays] = "Nieuwe Files, hoe lang";
$str[nfdaysinfo] = "Hoe veel dagen nieuwe files als nieuwe files te zien zullen zijn. Als deze op 5 wordt gezet, Dan zullen alle nieuwe files voor 5 dagen het 'New File' icoon krijgen";
$str[timeoffset] = "Tijd verschil";
$str[timeoffsetinfo] = "dit is het tijdsverschil. Bijvoorbeeld, als de server in een Eastern time zone staat maar u wilt dat de tijd in Central Time moet staan, dan zet u de tijd naar -1";
$str[tz] = "Tijd Zone";
$str[tzinfo] = "Dit is de tijdzone die te zien is";
$str[header] = "Header";
$str[headerinfo] = "de header file is te zien voordat er iets uit de database wordt weergeven 'boven aan de pagina'";
$str[footer] = "Footer";
$str[footerinfo] = "De footer file wordt onderaan de pagina weergegeven na alle informatie uit de database.";
$str[styleset] = "Style Set";
$str[stylesetinfo] = "Selecteer de style set die u wilt gebruiken";
$str[stats2] = "Laat de statistieken zien";
$str[statsinfo] = "Kies of u de statistieken wilt laten zien of niet (Total number of MySQL queries and how long it took for the script to execute)";
$str[settingschanged] = "Uw database gegevens zijn veranderd!";
$str[lang] = "Taal File";
$str[langinfo] = "Selecteer de taal om voor de database te gebruiken.";

//Start Beta 2.1 Language File
$str[settings] = "Settings"; 
$str[pafdbsettings] = "Settings paFileDB";

//Start Beta 3 Language File 
$str[sortby] = "Sorteer op"; 
$str[sort] = "Sorteer"; 
$str[name] = "Naam"; 
$str[bdb] = "Backup Database"; 
$str[rdb] = "Restore Database"; 
$str[rdbinfo] = "U kunt de database restoren met een backup die u eerder gemaakt heeft. <b>NOTE:</b> Dit zal alle informatie die later is toegevoegd verwijdern!<p>Kies een file om te restoren:"; 
$str[rdbdone] = "De database is gerestored! Als er Admin info is verandered kan het zijn dat u opnieuw moet inloggen."; 
$str[home] = "Homepage";
?>